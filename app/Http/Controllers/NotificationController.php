<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function markAsRead(Request $request, $id)
    {
        try {
            $notification = auth()->user()->notifications()->findOrFail($id);
            $notification->markAsRead();
            return redirect()->back()->with('success', 'Notification marquée comme lue.');
        } catch (\Exception $e) {
            \Log::error('Failed to mark notification as read: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors du marquage de la notification.');
        }
    }
}
