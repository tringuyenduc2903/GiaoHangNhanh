<?php

use Random\RandomException;
use TriNguyenDuc\GiaoHangNhanh\Enums\PaymentTypeId;
use TriNguyenDuc\GiaoHangNhanh\Enums\RequiredNote;
use TriNguyenDuc\GiaoHangNhanh\Enums\ServiceTypeId;

dataset(
    'order',
    /**
     * @throws RandomException
     */
    fn (): array => [[
        ServiceTypeId::HANG_NHE->value,
        vnfaker()->fullname(),
        vnfaker()->mobilephone(),
        fake()->address,
        '470610',
        3196,
        'SHOP-1',
        random_int(1, 19999),
        random_int(0, 5000000),
        fake()->randomElement(PaymentTypeId::keys()),
        fake()->randomElement(RequiredNote::keys()),
        [[
            'name' => vnfaker()->fullname(),
            'quantity' => 1,
        ]],
    ], [
        ServiceTypeId::HANG_NANG->value,
        vnfaker()->fullname(),
        vnfaker()->mobilephone(),
        fake()->address,
        '190814',
        1969,
        'SHOP-2',
        random_int(1, 19999),
        random_int(0, 5000000),
        fake()->randomElement(PaymentTypeId::keys()),
        fake()->randomElement(RequiredNote::keys()),
        [[
            'name' => vnfaker()->fullname(),
            'quantity' => 1,
            'weight' => 10000,
            'length' => 50,
            'width' => 12,
            'height' => 23,
        ], [
            'name' => vnfaker()->fullname(),
            'quantity' => 1,
            'weight' => 11000,
            'length' => 64,
            'width' => 100,
            'height' => 36,
        ]],
    ]]
);

dataset('order code', [
]);

dataset('client order code', [
    'SHOP-1',
    'SHOP-2',
]);

dataset('captcha', [
]);

dataset('calculate expected delivery time', [
    ['470610', 3196],
    ['190814', 1969],
]);
