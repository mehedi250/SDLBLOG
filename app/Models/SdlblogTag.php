<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdlblogTag extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'keyword',
        'count',
        'created_at',
        'updated_at'
    ];
}
