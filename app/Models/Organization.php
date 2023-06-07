<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'organization_name',
        'woreda',
        'status',
        'cuid',
        'uuid'
    ];
    use HasFactory;
}
