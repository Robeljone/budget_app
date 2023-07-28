<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSections extends Model
{
    use HasFactory;

    protected $fillable = [
        "organization_id",
        "allocated_budget",
        "budget_code",
        "job_section_name",
        "cuid",
        'uuid',
        "status"
    ];
}
