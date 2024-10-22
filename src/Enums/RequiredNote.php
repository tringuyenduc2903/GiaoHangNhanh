<?php

namespace TriNguyenDuc\GiaoHangNhanh\Enums;

enum RequiredNote: string
{
    case CHO_THU_HANG = 'CHOTHUHANG';

    case CHO_XEM_HANG_KHONG_THU = 'CHOXEMHANGKHONGTHU';

    case KHONG_CHO_XEM_HANG = 'KHONGCHOXEMHANG';

    public static function keys(): array
    {
        return [
            self::CHO_THU_HANG->value,
            self::CHO_XEM_HANG_KHONG_THU->value,
            self::KHONG_CHO_XEM_HANG->value,
        ];
    }
}
