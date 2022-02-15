<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdlblogPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'slug',
        'short_description',
        'post_body',
        'image',
        'is_published',
        'comment_status',
        'view_status',
        'language_id',
        'catagory_id',
        'user_id',
        'posted_at',
        'created_at',
        'updated_at'
    ];

    public function language(){
        return $this->belongsTo(SdlblogLanguage::class);
    }

    public function catagory(){
        return $this->belongsTo(SdlblogCatagory::class);
    }

    public function tags(){
        return $this->hasMany(SdlblogPostTag::class, 'post_id');
    }
    
    public function comments(){
        return $this->hasMany(SdlblogComment::class);
    }

}
