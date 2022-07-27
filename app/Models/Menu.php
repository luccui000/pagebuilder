<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';

    const BAN_THAO = 'Bản thảo';
    const DA_CONG_BO = 'Đã công bố';
    const CHO_CONG_BO = 'Chờ công bố';

    const VERTICAL = 'VERTICAL';
    const HORIZONTAL = 'HORIZONTAL';

    protected $fillable = [
        'id',
        'name',
        'header_id',
        'direction',
        'status'
    ];
    public function menuitems()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function header()
    {
        return $this->belongsTo(Header::class);
    }
}
