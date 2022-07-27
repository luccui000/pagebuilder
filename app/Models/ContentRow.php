<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentRow extends Model
{
    use HasFactory;

    protected $table = 'contentrows';

    protected $fillable = [
        'id',
        'content_id',
        'col_num',
        'order',
    ];

    public function rowitems()
    {
        return $this->hasMany(RowItem::class, 'contentrow_id', 'id');
    }
}
