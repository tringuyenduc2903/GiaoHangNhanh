<?php

namespace TriNguyenDuc\GiaoHangNhanh\Validates;

use Illuminate\Support\Facades\Validator;

class StoreData
{
    public static function createStore(array $data): array
    {
        return Validator::validate($data, [
            'ward_code' => ['nullable', 'string'],
            'district_id' => ['required_without:ward_code', 'integer'],
            'name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);
    }

    public static function getStore(array $data): array
    {
        return Validator::validate($data, [
            'clientphone' => ['sometimes', 'string'],
            'offset' => ['required_without:limit', 'integer', 'min:0'],
            'limit' => ['required_without:offset', 'integer', 'between:1,200'],
        ]);
    }
}
