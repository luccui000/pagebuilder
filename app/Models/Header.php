<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    const BAN_THAO = 'Bản thảo';
    const DA_CONG_BO = 'Đã công bố';
    const CHO_CONG_BO = 'Chờ công bố';

    protected $fillable = [
        'id',
        'name',
        'status',
    ];
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
    public function menuitems()
    {
        return $this->hasManyThrough(MenuItem::class, Menu::class);
    }
    public function styles()
    {
        return $this->morphOne(Style::class, 'styleable');
    }
}
