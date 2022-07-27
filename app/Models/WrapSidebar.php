<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WrapSidebar extends Model
{
    use HasFactory;

    protected  $table = 'wrapsidebars';
    protected $fillable = ['id'];
}
