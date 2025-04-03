<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Channels\OneSignalChannel;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $url;
    protected $title;
    protected $message;

    /**
     * Create a new notification instance.
     *
     * @param string $title
     * @param string $message
     * @param string|null $url
     */
    public function __construct($title, $message, $url = null)
    {
        $this->url = $url;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via($notifiable)
    {
        return [OneSignalChannel::class, 'database']; // Add 'database' channel
    }

    /**
     * Get the OneSignal data representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toOneSignal($notifiable)
    {
        return [
            'app_id' => env('ADMIN_ONESIGNAL_APP_ID'),
            'include_player_ids' => [$notifiable->one_signal_player_id],
            'headings' => ['en' => $this->title],
            'contents' => ['en' => $this->message],
            'chrome_web_image' => 'https://nammabda-staging.b-cdn.net/property_documents/246KB-ZjuhcRctTG.png', // Optional image
            'url' => "https://nammabda-admin.preview.im", // Optional URL
        ];
    }

    /**
     * Get the array representation of the notification for storage in the database.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'title'   => $this->title,
            'message' => $this->message,
            'url'     => $this->url,
            'notification_type' => 'TEST_NOTIFICATION', // Add notification type
        ];
    }
}