<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_address extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "address_1",
        "address_2",
        "address_3"
    ];
}
