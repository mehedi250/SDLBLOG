<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdlblogConfigaration extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'language_id',
        'initial_setup',
        'created_at',
        'updated_at'
    ];
}
