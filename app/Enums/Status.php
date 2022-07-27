<?php

namespace App\Enums;

enum Status {
    const BAN_THAO = 'Bản thảo';
    const DA_CONG_BO = 'Đã công bố';
    const CHO_CONG_BO = 'Chờ công bố';

    /**
     * @throws \Exception
     */
    public function status(): string
    {
        return match ($this) {
            self::BAN_THAO => 'Bản thảo',
            self::DA_CONG_BO => 'Đã công bố',
            self::CHO_CONG_BO => 'Chờ công bố',
            default => throw new \Exception('Unexpected match value'),
        };
    }
}
