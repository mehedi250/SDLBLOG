<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdlblogPostTag extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'post_id',
        'keyword',
        'created_at',
        'updated_at'
    ];

    public function tag_posts(){
        return $this->belongsToMany(SdlblogPost::class);
    }
}
