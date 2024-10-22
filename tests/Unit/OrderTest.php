<?php

use Random\RandomException;
use TriNguyenDuc\GiaoHangNhanh\Enums\PaymentTypeId;
use TriNguyenDuc\GiaoHangNhanh\Enums\RequiredNote;
use TriNguyenDuc\GiaoHangNhanh\Facades\GiaoHangNhanh;

test('previewOrder must be array', function (
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
    array $items
) {
    expect(
        GiaoHangNhanh::previewOrder([
            'service_type_id' => $service_type_id,
            'to_name' => $to_name,
            'to_phone' => $to_phone,
            'to_address' => $to_address,
            'to_ward_code' => $to_ward_code,
            'to_district_id' => $to_district_id,
            'client_order_code' => $client_order_code,
            'weight' => $weight,
            'insurance_value' => $insurance_value,
            'payment_type_id' => $payment_type_id,
            'required_note' => $required_note,
            'items' => $items,
        ])
    )->toBeArray()->dump();
})->with('order');

test('createOrder must be array', function (
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
    array $items
) {
    expect(
        GiaoHangNhanh::createOrder([
            'service_type_id' => $service_type_id,
            'to_name' => $to_name,
            'to_phone' => $to_phone,
            'to_address' => $to_address,
            'to_ward_code' => $to_ward_code,
            'to_district_id' => $to_district_id,
            'client_order_code' => $client_order_code,
            'weight' => $weight,
            'insurance_value' => $insurance_value,
            'payment_type_id' => $payment_type_id,
            'required_note' => $required_note,
            'items' => $items,
        ])
    )->toBeArray()->dump();
})->with('order');

test('updateOrder must be null',
    /**
     * @throws RandomException
     */
    function (string $order_code) {
        expect(
            GiaoHangNhanh::updateOrder([
                'order_code' => $order_code,
                'to_name' => vnfaker()->fullname(),
                'to_phone' => vnfaker()->mobilephone(),
                'to_address' => fake()->address,
                'to_ward_code' => '470610',
                'to_district_id' => 3196,
                'weight' => random_int(1, 19999),
                'insurance_value' => random_int(0, 5000000),
                'payment_type_id' => fake()->randomElement(PaymentTypeId::keys()),
                'required_note' => fake()->randomElement(RequiredNote::keys()),
                'items' => [[
                    'name' => vnfaker()->fullname(),
                    'quantity' => 1,
                    'weight' => random_int(1, 19999),
                ]],
            ])
        )->toBeNull()->dump();
    }
)->with('order code');

test('updateCodOrder must be null',
    /**
     * @throws RandomException
     */
    function (string $order_code) {
        expect(
            GiaoHangNhanh::updateCodOrder([
                'order_code' => $order_code,
                'cod_amount' => random_int(0, 5000000),
            ])
        )->toBeNull()->dump();
    }
)->with('order code');

test('orderInfo must be array', function (string $order_code) {
    expect(
        GiaoHangNhanh::orderInfo($order_code)
    )->toBeArray()->dump();
})->with('order code');

test('orderInfoByClientOrderCode must be array', function (string $order_code) {
    expect(
        GiaoHangNhanh::orderInfoByClientOrderCode($order_code)
    )->toBeArray()->dump();
})->with('client order code');

test('returnOrder must be array', function (string $order_code) {
    expect(
        GiaoHangNhanh::returnOrder([$order_code])
    )->toBeArray()->dump();
})->with('order code');

test('deliveryAgain must be array', function (string $order_code) {
    expect(
        GiaoHangNhanh::deliveryAgain([$order_code])
    )->toBeArray()->dump();
})->with('order code');

test('printOrder must be array', function (string $order_code) {
    expect(
        GiaoHangNhanh::printOrder([$order_code])
    )->toBeArray()->dump();
})->with('order code');

test('cancelOrder must be array', function (string $order_code) {
    expect(
        GiaoHangNhanh::cancelOrder([$order_code])
    )->toBeArray()->dump();
})->with('order code');

test('getStation must be array', function (string $captcha) {
    expect(
        GiaoHangNhanh::getStation([
            'district_id' => (string) config('giaohangnhanh.shop_district_id'),
        ],
            $captcha
        )
    )->toBeArray()->dump();
})->with('captcha');

test('calculateExpectedDeliveryTime must be array', function (
    string $to_ward_code,
    int $to_district_id,
) {
    $services = GiaoHangNhanh::getService([
        'from_district' => config('giaohangnhanh.shop_district_id'),
        'to_district' => $to_district_id,
    ]);

    foreach ($services as $service) {
        expect(
            GiaoHangNhanh::calculateExpectedDeliveryTime([
                'to_ward_code' => $to_ward_code,
                'to_district_id' => $to_district_id,
                'service_id' => $service['service_id'],
            ])
        )->toBeArray()->dump();
    }
})->with('calculate expected delivery time');

test('pickShift must be array', function () {
    expect(
        GiaoHangNhanh::pickShift()
    )->toBeArray()->dump();
});
