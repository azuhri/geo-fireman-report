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

    public function notifViewNew()
    {
        Notification::where("user_id", Auth::user()->id)->update(["was_readed" => true]);
        $notifications = Notification::getNotif();
        $data[] = "notifications";
        return view("new_app.dashboard.notification-view", compact($data));
    }

    public function getNotif()
    {
        $user = Auth::user();
        $getNewNotif = Notification::where("user_id", $user->id)->where("was_readed", false)->get();
        $response["data"] = $getNewNotif;
        return \response()->json($response);
    }
}
