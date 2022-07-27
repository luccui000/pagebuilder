<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'status',
    ];

    public function carousels()
    {
        return $this->hasMany(Carousel::class);
    }
}
