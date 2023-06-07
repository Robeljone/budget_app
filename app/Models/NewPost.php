<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewPost extends Model
{
    protected $fillable = [
        'account_id',
        'title',
        'content',
        'post_link',
        'posted_by',
        'status'
    ];
    public function account()
    {
        return $this->belongsTo(OrganizationSocialMediaAccount::class,'account_id');
    }
    public function  postedby()
    {
   return $this->belongsTo(User::class,'posted_by');
    }
    use HasFactory;
}
