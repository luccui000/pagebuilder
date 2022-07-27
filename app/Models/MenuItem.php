<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;
    protected $table = 'menuitems';

    protected $fillable = [
        'id',
        'name',
        'link',
        'status',
        'menu_id'
    ];
    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id', 'id');
    }
}
