<?php

namespace App\Classes;

class Status
{
    const BAN_THAO = 'Bản thảo';
    const DA_CONG_BO = 'Đã công bố';
    const CHO_CONG_BO = 'Chờ công bố';

    public static function color($text)
    {
        return match ($text) {
            Status::DA_CONG_BO => 'primary',
            Status::CHO_CONG_BO => 'danger',
            Status::BAN_THAO => 'info',
            default => 'secondary'
        };
    }
}
