<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretario extends Model
{
    use HasFactory;
    // all() e find() já são de Model

    // public static function all() {
    //     return ;
    // }

    // public static function find($id) {
    //     $listings = self::all();

    //     foreach($listings as $listing) {
    //         if ($listing['id'] == $id) {
    //             return $listing;
    //         }
    //     }
    // }
}
