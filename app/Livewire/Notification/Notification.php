<?php

namespace App\Livewire\Notification;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Notification extends Component
{
    public $notifications;
    public $notificationCount;
    public function mount()
    {
        $this->fetchNotifications();
    }

    public function fetchNotifications()
    {
        $this->notificationCount = 0;
        if (auth()->check()) {
            $user = auth()->user();
            $this->notificationCount = $user->unreadNotifications->count();
    
            if ($user->notifications->count() > 0) {
                $this->notifications = $user->notifications->map(function ($notification) {
                    $notification->time_ago = $notification->created_at->diffForHumans();
                    return $notification;
                });
            } 
        }
    }
    
    public function markAsRead(){
        if (auth()->check()) {
            $user = auth()->user();
            $user->unreadNotifications->markAsRead(); 
            $this->notificationCount = 0;           
            $this->fetchNotifications();
        }
    }
    public function render()
    {
        return view('livewire.notification.notification');
    }
}
