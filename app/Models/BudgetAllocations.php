<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetAllocations extends Model
{
    use HasFactory;
    protected $fillable =[
        'financial_year',
        'organization_id',
        'budget_amount',
        'status',
        'cuid',
        'uuid'
    ];

    public function financial()
    {
        return $this->hasOne(FinacialYears::class,'id','financial_year');
    }
    public function organization()
    {
        return $this->hasOne(Organizations::class,'id','organization_id');
    }
}
