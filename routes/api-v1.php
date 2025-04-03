<?php

use App\Models\User;
use App\Notifications\GeneralNotificationMail;
use Illuminate\Http\Request;
use App\Notifications\ThankYouMail;
use Illuminate\Support\Facades\Route;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\WelcomeSmsNotification;


/**
 *  Sending notification to multiple users using Notification facade.
 */

Route::get('/send-notification', function () {
    $users = User::all();

    Notification::send($users, new TestNotification('Custom Title', 'This is a custom message.'));
    return response()->json(['message' => 'Notification sent successfully']);
});


/**
 * Send email using Laravel Notification:
 * Uncomment the line below to preview the email in the browser:
 * return (new ThankYouMail($data))->toMail($user);
 */

Route::get('/send-mail', function () {

    $user = User::findOrFail(1);
    $data = [
        'name' => 'John Doe',
        'action_url' => url('/'),
        'action_text' => 'Visit Our Website',
        'message' => 'We appreciate your support and thank you for being a valued part of our community.',
    ];
    Notification::send($user, new ThankYouMail($data));
    return response()->json(['message' => 'Thank you email sent successfully']);
});


/**
 * Sending SMS using Twilio
 */
Route::get('/send-welcome-sms', function () {
    $users = User::find(1); // Replace with actual user IDs
    $message = 'HEY BUDDY!GOOD MORNING!';
    Notification::send($users, new WelcomeSmsNotification($message));
    return response()->json(['message' => 'Welcome SMS sent successfully']);
});



Route::get('/send-general-notification', function () {
    $user = User::findOrFail(1); // Replace with a valid user ID
    $data = [
        'subject' => 'Important Update from Our Platform',
        'title' => 'Hello, User!',
        'message' => 'We wanted to let you know about some important updates to our platform.',
        'action_url' => url('/'),
        'action_text' => 'Learn More',
    ];
    Notification::send($user, new WelcomeSmsNotification($data));
    return response()->json(['message' => 'General notification email sent successfully']);
});