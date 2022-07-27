<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'primary_text',
        'background_text',
        'background_image',
        'primary_image',
        'slider_id',
        'order',
        'status',
    ];
}
