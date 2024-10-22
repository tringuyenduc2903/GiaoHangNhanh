<?php

namespace TriNguyenDuc\GiaoHangNhanh\Enums;

enum ServiceTypeId: int
{
    case HANG_NHE = 2;

    case HANG_NANG = 5;

    public static function keys(): array
    {
        return [
            self::HANG_NHE->value,
            self::HANG_NANG->value,
        ];
    }
}
