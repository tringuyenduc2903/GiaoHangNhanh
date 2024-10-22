<?php

namespace TriNguyenDuc\GiaoHangNhanh\Validates;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use TriNguyenDuc\GiaoHangNhanh\Enums\TicketCategory;

class TicketData
{
    public static function createTicket(array $data): array
    {
        return Validator::validate($data, [
            'order_code' => ['required', 'string', 'max:50'],
            'category' => ['required', 'string', Rule::in(TicketCategory::keys())],
            'attachments' => ['sometimes', 'array', 'max:10'],
            'attachments.*' => ['required', 'file', 'max:2048'],
            'description' => ['required', 'string', 'max:2000'],
            'c_email' => ['required', 'email:rfc,dns', 'max:50'],
        ]);
    }

    public static function createFeedbackTicket(array $data): array
    {
        return Validator::validate($data, [
            'ticket_id' => ['required', 'integer'],
            'attachments' => ['sometimes', 'array', 'max:10'],
            'attachments.*' => ['required', 'file', 'max:2048'],
            'description' => ['required', 'string', 'max:2000'],
        ]);
    }

    public static function getTickets(array $data): array
    {
        return Validator::validate($data, [
            'offset' => ['required_without:limit', 'integer', 'min:0'],
            'limit' => ['required_without:offset', 'integer', 'between:1,200'],
        ]);
    }
}
