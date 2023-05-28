<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{
    use HasFactory;

    public static function newNotif($userId, $pesan, $url = null)
    {
        $createNotif = new Notification();
        $createNotif->user_id = $userId;
        $createNotif->pesan = $pesan;
        $createNotif->url = $url;
        $createNotif->save();

        return $createNotif;
    }

    public static function getNotif()
    {
        return Notification::where("user_id", Auth::user()->id)
                            ->orderBy("id","DESC")
                            ->get();
    }
}
