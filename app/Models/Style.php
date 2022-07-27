<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'style',
        'styleable_id',
        'styleable_id',
    ];
    public function styleable()
    {
        return $this->morphTo();
    }
}
