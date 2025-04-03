<?php

use App\Models\User;
use App\Notifications\ThankYouMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\NotificationController;


Route::get('/', function () {
    return view('welcome');
});


// Route::get('/send-mail', function () {

//     $user = User::findOrFail(1);
//     $data = [
//         'name' => 'John Doe',
//         'action_url' => url('/'),
//         'action_text' => 'Visit Our Website',
//         'message' => 'We appreciate your support and thank you for being a valued part of our community.',
//     ];

//     // $user->notify(new ThankYouMail($data));
//     // return (new ThankYouMail($data))->toMail($user);
//     Notification::send($user, new ThankYouMail($data));
//     return response()->json(['message' => 'Thank you email sent successfully']);
// });



Route::get('/checking', function () {
    return view('notifications.send-notifications');
});
Route::post('/send-sms', [NotificationController::class, 'sendSms'])->name('send.sms');
Route::post('/send-email', [NotificationController::class, 'sendEmail'])->name('send.email');