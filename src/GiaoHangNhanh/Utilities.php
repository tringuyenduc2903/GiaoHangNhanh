<?php

namespace TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh;

trait Utilities
{
    public function getTrackingUrl(
        string $order_code,
        ?string $tracking_url = null
    ): string {
        if (is_null($tracking_url)) {
            $tracking_url = config('giaohangnhanh.tracking_url');
        }

        return "$tracking_url?order_code=$order_code";
    }
}
