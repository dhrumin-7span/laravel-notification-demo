<?php

namespace App\Broadcasting;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Http;
use Illuminate\Notifications\Notification;

class OneSignalChannel
{
    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toOneSignal($notifiable);
        if (empty($data['include_player_ids']) || count($data['include_player_ids']) === 0) {
            throw new CustomException('No player IDs found for the notification.');
        }

        $apiKey = env('ADMIN_ONESIGNAL_API_KEY');
        $oneSignalApiUrl = "https://api.onesignal.com/notifications";

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $apiKey,
            'Content-Type'  => 'application/json',
        ])->withOptions(['verify' => false])->post($oneSignalApiUrl, $data);


        if ($response->failed()) {
            $errorMessage = $response->json('errors') ?? 'Unknown error occurred while sending the notification.';
            throw new CustomException('OneSignal API Error: ' . json_encode($errorMessage));
        }

        return $response->json();
    }
}
