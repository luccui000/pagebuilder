<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidebar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'link',
        'order',
        'status',
        'wrapsidebar_id',
    ];
}
