<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdlblogLanguage extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'slug',
        'status',
        'created_at',
        'updated_at'
    ];
    public function catagories(){
        return $this->hasMany(SdlblogCatagory::class);
    }
    public function posts(){
        return $this->hasMany(SdlblogPost::class);
    }

}
