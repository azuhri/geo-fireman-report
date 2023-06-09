<?php

use App\Models\Notification;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;

function faker() {
    return Faker::create('id_ID');
}

function test() {
    return "test";
}

function getNotifNotReaded() {
    $data = Notification::where("user_id", Auth::user()->id)->where("was_readed", false)->get();
    return $data;
}

function getNotifNotBelled() {
    $data = Notification::where("user_id", Auth::user()->id)->where("was_belled", false);
    $res = $data->get();
    $data->update(["was_belled" => true]);
    return $res;
}

function statusColor($status) {
    switch ($status) {
        case 'pending':
            $result = 'yellow';            
            break;
        case 'ditolak':
        case 'dibatalkan':
            $result = 'red';            
            break;
        case 'diproses':
            $result = 'blue';            
            break;
        case 'selesai':
            $result = 'green';            
            break;
        default:
            $result = 'gray';            
            break;
    }
    return $result;
}
