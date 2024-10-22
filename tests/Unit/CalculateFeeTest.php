<?php

use TriNguyenDuc\GiaoHangNhanh\Facades\GiaoHangNhanh;

test('calculateFee must be array', function (
    int $service_type_id,
    string $to_name,
    string $to_phone,
    string $to_address,
    string $to_ward_code,
    int $to_district_id,
    string $client_order_code,
    int $weight,
    int $insurance_value,
    int $payment_type_id,
    string $required_note,
    array $items,
) {
    expect(
        GiaoHangNhanh::calculateFee([
            'service_type_id' => $service_type_id,
            'to_ward_code' => $to_ward_code,
            'to_district_id' => $to_district_id,
            'weight' => $weight,
            'insurance_value' => $insurance_value,
            'items' => $items,
        ])
    )->toBeArray()->dump();
})->with('order');

test('feeOrderInfo must be array', function (string $order_code) {
    expect(
        GiaoHangNhanh::feeOrderInfo($order_code)
    )->toBeArray()->dump();
})->with('order code');

test('getService must be null or array', function (int $to_district) {
    dump($result = GiaoHangNhanh::getService([
        'from_district' => config('giaohangnhanh.shop_district_id'),
        'to_district' => $to_district,
    ]));

    expect(is_null($result) || is_array($result))->toBeTrue();
})->with('district id');
