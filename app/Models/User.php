<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        "fullName",
        "email",
        "password",
        "userCat",
        "userRoll",
        "district",
        "img",
        "stat"
    ];
    use HasFactory;
}
