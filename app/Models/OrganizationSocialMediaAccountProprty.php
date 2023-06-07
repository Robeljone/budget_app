<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationSocialMediaAccountProprty extends Model
{
    protected $fillable = [
        'organization_social_media_account_id',
        'parameter',
        'value',
        'status'
    ];
    use HasFactory;
}
