<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'site_name',
        'logo',
        'facebook_link',
        'twitter_link',
        'created_at',
        'updated_at'
    ];
}
