<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable = [
        'account_name',
        'status',
        'cuid',
    ];

    use HasFactory;
}
