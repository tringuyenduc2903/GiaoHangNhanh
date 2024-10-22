<?php

namespace TriNguyenDuc\GiaoHangNhanh\Enums;

enum OrderStatus: string
{
    case READY_TO_PICK = 'ready_to_pick';

    case PICKING = 'picking';

    case MONEY_COLLECT_PICKING = 'money_collect_picking';

    case PICKED = 'picked';

    case STORING = 'storing';

    case TRANSPORTING = 'transporting';

    case SORTING = 'sorting';

    case DELIVERING = 'delivering';

    case DELIVERED = 'delivered';

    case MONEY_COLLECT_DELIVERING = 'money_collect_delivering';

    case DELIVERY_FAIL = 'delivery_fail';

    case WAITING_TO_RETURN = 'waiting_to_return';

    case RETURN = 'return';

    case RETURN_TRANSPORTING = 'return_transporting';

    case RETURN_SORTING = 'return_sorting';

    case RETURNING = 'returning';

    case RETURN_FAIL = 'return_fail';

    case RETURNED = 'returned';

    case CANCEL = 'cancel';

    case EXCEPTION = 'exception';

    case LOST = 'lost';

    case DAMAGE = 'damage';

    public static function values(): array
    {
        return [
            self::READY_TO_PICK->value => trans('Chờ lấy hàng'),
            self::PICKING->value => trans('Đang lấy hàng'),
            self::MONEY_COLLECT_PICKING->value => trans('Đang tương tác với người gửi'),
            self::PICKED->value => trans('Lấy hàng thành công'),
            self::STORING->value => trans('Nhập kho'),
            self::TRANSPORTING->value => trans('Đang trung chuyển'),
            self::SORTING->value => trans('Đang phân loại'),
            self::DELIVERING->value => trans('Đang giao hàng'),
            self::DELIVERED->value => trans('Giao hàng thành công'),
            self::MONEY_COLLECT_DELIVERING->value => trans('Đang tương tác với người nhận'),
            self::DELIVERY_FAIL->value => trans('Giao hàng không thành công'),
            self::WAITING_TO_RETURN->value => trans('Chờ xác nhận giao lại'),
            self::RETURN->value => trans('Chuyển hoàn'),
            self::RETURN_TRANSPORTING->value => trans('Đang trung chuyển hàng hoàn'),
            self::RETURN_SORTING->value => trans('Đang phân loại hàng hoàn'),
            self::RETURNING->value => trans('Đang hoàn hàng'),
            self::RETURN_FAIL->value => trans('Hoàn hàng không thành công'),
            self::RETURNED->value => trans('Hoàn hàng thành công'),
            self::CANCEL->value => trans('Đơn huỷ'),
            self::EXCEPTION->value => trans('Hàng ngoại lệ'),
            self::LOST->value => trans('Hàng thất lạc'),
            self::DAMAGE->value => trans('Hàng hư hỏng'),
        ];
    }
}
