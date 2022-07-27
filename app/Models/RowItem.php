<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RowItem extends Model
{
    use HasFactory;
    protected $table = 'rowitems';

    protected $fillable = [
        'id',
        'contentrow_id',
        'rowitems_type',
        'order',
        'rowitems_id'
    ];
}
