<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdlblogPostTag extends Model
{
    use HasFactory;
    public function tag(){
        return $this->belongsTo(SdlblogTag::class);
    }
}
