<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdlblogComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'post_id',
        'user_id',
        'author_name',
        'author_email',
        'comment',
        'approval_status',
        'created_at',
        'updated_at'
    ];
    public function replies(){
        return $this->hasMany(SdlblogReplyComment::class);
    }
}
