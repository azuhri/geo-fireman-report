<?php

use Faker\Factory as Faker;

function faker() {
    return Faker::create('id_ID');
}

function test() {
    return "test";
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
