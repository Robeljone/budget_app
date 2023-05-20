<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SocialMedia;
class SocialMediaProperty extends Model
{
    protected $fillable = [
        'social_media_account_id',
        'property_name',
        'status',
        'cuid'
    ];
    public function social_media()
    {
        return $this->belongsTo(SocialMedia::class,'social_media_account_id');
    }
    use HasFactory;
}
