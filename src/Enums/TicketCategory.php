<?php

namespace TriNguyenDuc\GiaoHangNhanh\Enums;

enum TicketCategory: string
{
    case TU_VAN = 'Tư vấn';

    case HOI_GIAO = 'Hối Giao/Lấy/Trả hàng';

    case THAY_DOI_THONG_TIN = 'Thay đổi thông tin';

    case KHIEU_NAI = 'Khiếu nại';

    public static function keys(): array
    {
        return [
            self::TU_VAN->value,
            self::HOI_GIAO->value,
            self::THAY_DOI_THONG_TIN->value,
            self::KHIEU_NAI->value,
        ];
    }
}
