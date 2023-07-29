<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinacialYears extends Model
{
    use HasFactory;

    protected $fillable = [
        'financial_year',
        'start_date',
        'end_date',
        'status',
        'cuid',
        'uuid'
    ];
}
