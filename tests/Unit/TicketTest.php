<?php

use TriNguyenDuc\GiaoHangNhanh\Enums\TicketCategory;
use TriNguyenDuc\GiaoHangNhanh\Facades\GiaoHangNhanh;

test('create ticket must be array', function (
    string $order_code,
    string $category,
) {
    expect(
        GiaoHangNhanh::createTicket([
            'order_code' => $order_code,
            'category' => $category,
            'description' => "Run Test (Don't reply this ticket)",
            'c_email' => vnfaker()->email(['gmail.com']),
        ])
    )->toBeArray()->dump();
})->with('order code', TicketCategory::keys());

test('createFeedbackTicket must be array', function (int $ticket_id) {
    expect(
        GiaoHangNhanh::createFeedbackTicket([
            'ticket_id' => $ticket_id,
            'description' => "Run Test (Don't reply this ticket)",
        ])
    )->toBeArray()->dump();
})->with('ticket id');

test('getTicketList must be null or array', function () {
    dump($result = GiaoHangNhanh::getTicketList([
        'offset' => 1,
    ]));

    expect(is_null($result) || is_array($result))->toBeTrue();
});

test('getTicket must be array', function (int $ticket_id) {
    expect(
        GiaoHangNhanh::getTicket($ticket_id)
    )->toBeArray()->dump();
})->with('ticket id');
