<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\WelcomeSmsNotification;
use App\Notifications\GeneralNotificationMail;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function sendSms(Request $request)
    {
        try {
            $phone = $request->country_code . $request->phone;
            $message = $request->message;

            // Send SMS Notification
            Notification::route('twilio', $phone)->notify(new WelcomeSmsNotification($message));

            return back()->with('success', 'SMS sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send SMS: ' . $e->getMessage());
        }
    }

    public function sendEmail(Request $request)
    {
        try {
            $email = $request->email;
            $message = $request->message;

            // Send Email Notification
            Notification::route('mail', $email)->notify(new GeneralNotificationMail([
                'subject' => 'Notification Email',
                'title' => 'Hello!',
                'message' => $message,
                'action_url' => url('/'),
                'action_text' => 'Visit Us',
            ]));

            return back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }
}