<?php

namespace TriNguyenDuc\GiaoHangNhanh\Enums;

enum OrderReason: string
{
    case GHN_PFA1A0 = 'GHN-PFA1A0';

    case GHN_PFA2A2 = 'GHN-PFA2A2';

    case GHN_PFA2A1 = 'GHN-PFA2A1';

    case GHN_PFA2A3 = 'GHN-PFA2A3';

    case GHN_PFA1A1 = 'GHN-PFA1A1';

    case GHN_PCB0B2 = 'GHN-PCB0B2';

    case GHN_PFA4A1 = 'GHN-PFA4A1';

    case GHN_PCB0B1 = 'GHN-PCB0B1';

    case GHN_PFA4A2 = 'GHN-PFA4A2';

    case GHN_PFA3A2 = 'GHN-PFA3A2';

    case GHN_DFC1A0 = 'GHN-DFC1A0';

    case GHN_DFC1A2 = 'GHN-DFC1A2';

    case GHN_DFC1A4 = 'GHN-DFC1A4';

    case GHN_DCD0A1 = 'GHN-DCD0A1';

    case GHN_DFC1A1 = 'GHN-DFC1A1';

    case GHN_DFC1A7 = 'GHN-DFC1A7';

    case GHN_DCD0A6 = 'GHN-DCD0A6';

    case GHN_DCD0A7 = 'GHN-DCD0A7';

    case GHN_DCD0A5 = 'GHN-DCD0A5';

    case GHN_DCD1A5 = 'GHN-DCD1A5';

    case GHN_DCD0A8 = 'GHN-DCD0A8';

    case GHN_DCD1A1 = 'GHN-DCD1A1';

    case GHN_DFC1A6 = 'GHN-DFC1A6';

    case GHN_DCD1A3 = 'GHN-DCD1A3';

    case GHN_RFE0A0 = 'GHN-RFE0A0';

    case GHN_RFE0A1 = 'GHN-RFE0A1';

    case GHN_RFE0A6 = 'GHN-RFE0A6';

    case GHN_RFE0A3 = 'GHN-RFE0A3';

    case GHN_RFE0A4 = 'GHN-RFE0A4';

    case GHN_RFE0A5 = 'GHN-RFE0A5';

    public static function values(): array
    {
        return [
            // Lấy thất bại
            self::GHN_PFA1A0->value => trans('Lấy không thành công: Người gửi hẹn lại ngày lấy hàng'),
            self::GHN_PFA2A2->value => trans('Lấy không thành công: Thông tin lấy hàng sai (địa chỉ / SĐT)'),
            self::GHN_PFA2A1->value => trans('Lấy không thành công: Thuê bao không liên lạc được / Máy bận'),
            self::GHN_PFA2A3->value => trans('Lấy không thành công: Người gửi không nghe máy'),
            self::GHN_PFA1A1->value => trans('Lấy không thành công: Người gửi muốn gửi hàng tại bưu cục'),
            self::GHN_PCB0B2->value => trans('Lấy không thành công: Hàng vi phạm quy định khối lượng, kích thước'),
            self::GHN_PFA4A1->value => trans('Lấy không thành công: Hàng vi phạm quy cách đóng gói'),
            self::GHN_PCB0B1->value => trans('Lấy không thành công: Người gửi không muốn gửi hàng nữa'),
            self::GHN_PFA4A2->value => trans('Lấy không thành công: Hàng hóa GHN không vận chuyển'),
            self::GHN_PFA3A2->value => trans('Lấy không thành công: Nhân viên gặp sự cố'),
            // Giao thất bại
            self::GHN_DFC1A0->value => trans('Giao không thành công: Người nhận hẹn lại ngày giao'),
            self::GHN_DFC1A2->value => trans('Giao không thành công: Không liên lạc được người nhận / Chặn số'),
            self::GHN_DFC1A4->value => trans('Giao không thành công: Người nhận không nghe máy'),
            self::GHN_DCD0A1->value => trans('Giao không thành công: Sai thông tin người nhận (địa chỉ / SĐT)'),
            self::GHN_DFC1A1->value => trans('Giao không thành công: Người nhận đổi địa chỉ giao hàng'),
            self::GHN_DFC1A7->value => trans('Giao không thành công: Người nhận từ chối nhận do không cho xem / thử hàng'),
            self::GHN_DCD0A6->value => trans('Giao không thành công: Người nhận từ chối nhận do sai sản phẩm'),
            self::GHN_DCD0A7->value => trans('Giao không thành công: Người nhận từ chối nhận do sai COD'),
            self::GHN_DCD0A5->value => trans('Giao không thành công: Người nhận từ chối nhận do hàng hư hỏng'),
            self::GHN_DCD1A5->value => trans('Giao không thành công: Người nhận từ chối nhận do không có tiền'),
            self::GHN_DCD0A8->value => trans('Giao không thành công: Người nhận đổi ý không mua nữa'),
            self::GHN_DCD1A1->value => trans('Giao không thành công: Người nhận báo không đặt hàng'),
            self::GHN_DFC1A6->value => trans('Giao không thành công: Nhân viên gặp sự cố'),
            self::GHN_DCD1A3->value => trans('Giao không thành công: Hàng suy suyển, bể vỡ trong quá trình vận chuyển'),
            // Trả thất bại
            self::GHN_RFE0A0->value => trans('Trả không thành công: Người gửi hẹn lại ngày trả hàng'),
            self::GHN_RFE0A1->value => trans('Trả không thành công: Người gửi đổi địa chỉ trả hàng'),
            self::GHN_RFE0A6->value => trans('Trả không thành công: Người gửi không nghe máy'),
            self::GHN_RFE0A3->value => trans('Trả không thành công: Người gửi từ chối nhận do sai sản phẩm'),
            self::GHN_RFE0A4->value => trans('Trả không thành công: Người gửi từ chối nhận do hàng hư hỏng.'),
            self::GHN_RFE0A5->value => trans('Trả không thành công: Nhân viên gặp sự cố'),
        ];
    }
}
