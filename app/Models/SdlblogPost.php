<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdlblogPost extends Model
{
    use HasFactory;

    public function language(){
        return $this->belongsTo(SdlblogLanguage::class);
    }

    public function catagory(){
        return $this->belongsTo(SdlblogCatagory::class);
    }

    public function tages(){
        return $this->hasMany(SdlblogPostTag::class);
    }
    
    public function comments(){
        return $this->hasMany(SdlblogComment::class);
    }

}
