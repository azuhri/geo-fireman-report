<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function notifView()
    {
        Notification::where("user_id", Auth::user()->id)->update(["was_readed" => true]);
        $notifications = Notification::getNotif();
        $data[] = "notifications";
        return view("app.dashboard.notification-view", compact($data));
    }
}
