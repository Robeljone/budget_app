<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationSocialMediaAccount extends Model
{
     protected  $fillable = [
         "social_media_type",
         "organization",
         "social_media_manager",
         "social_media_account_name",
         "status"
     ];
    public function orga_name()
    {
        return $this->belongsTo(Organization::class,'organization');
    }
    public function soc_media_type()
    {
        return $this->belongsTo(SocialMedia::class,'social_media_type');
    }
    public  function soc_media_manager()
    {
        return $this->belongsTo(User::class,'social_media_manager');
    }
    use HasFactory;
}
