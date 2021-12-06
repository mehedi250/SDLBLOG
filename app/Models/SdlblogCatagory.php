<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdlblogCatagory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'slug',
        'description',
        'count',
        'language_id',
        'created_at',
        'updated_at'
    ];
    public function posts(){
        return $this->hasMany(SdlblogPost::class);
    }
    public function language(){
        return $this->belongsTo(SdlblogLanguage::class);
    }

}
