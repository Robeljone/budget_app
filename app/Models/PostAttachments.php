<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostAttachments extends Model
{
    protected $fillable = [
        'post_id',
        'path',
        'cuid',
        'uuid',
    ];
    use HasFactory;
}
