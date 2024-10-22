<?php

use TriNguyenDuc\GiaoHangNhanh\Facades\GiaoHangNhanh;

test('createStore must be numeric', function (
    string $ward_code,
    int $district_id,
) {
    expect(
        GiaoHangNhanh::createStore([
            'ward_code' => $ward_code,
            'district_id' => $district_id,
            'name' => vnfaker()->fullname(),
            'phone' => vnfaker()->mobilephone(),
            'address' => fake()->address,
        ])
    )->toBeNumeric()->dump();
})->with('store');

test('getStore must be array', function () {
    expect(
        GiaoHangNhanh::getStore([
            'offset' => 1,
        ])
    )->toBeArray()->dump();
});
