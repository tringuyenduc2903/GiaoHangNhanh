<?php

namespace TriNguyenDuc\GiaoHangNhanh\Validates;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use TriNguyenDuc\GiaoHangNhanh\Enums\ServiceTypeId;

class CalculateFeeData
{
    public static function calculateFee(array $data): array
    {
        $required = isset($data['service_type_id']) && $data['service_type_id'] === ServiceTypeId::HANG_NANG->value;

        return Validator::validate($data, [
            'service_id' => ['required_without:service_type_id', 'integer'],
            'service_type_id' => ['required_without:service_id', 'integer', Rule::in(ServiceTypeId::keys())],
            'insurance_value' => ['sometimes', 'integer', 'between:0,5000000'],
            'coupon' => ['sometimes', 'string'],
            'cod_failed_amount' => ['sometimes', 'integer', 'min:0'],
            'from_ward_code' => ['sometimes', 'string'],
            'from_district_id' => ['sometimes', 'integer'],
            'to_ward_code' => ['nullable', 'string'],
            'to_district_id' => ['required_without:to_ward_code', 'integer'],
            'weight' => ['required', 'integer', 'between:0,50000'],
            'length' => ['sometimes', 'integer', 'between:0,200'],
            'width' => ['sometimes', 'integer', 'between:0,200'],
            'height' => ['sometimes', 'integer', 'between:0,200'],
            'cod_value' => ['sometimes', 'integer', 'between:0,10000000'],
            'items' => ['required', 'array'],
            'items.*.name' => ['required', 'string'],
            'items.*.code' => ['sometimes', 'string'],
            'items.*.quantity' => ['required', 'integer'],
            'items.*.weight' => [Rule::requiredIf($required), 'integer', 'between:0,50000'],
            'items.*.length' => [Rule::requiredIf($required), 'integer', 'between:0,200'],
            'items.*.width' => [Rule::requiredIf($required), 'integer', 'between:0,200'],
            'items.*.height' => [Rule::requiredIf($required), 'integer', 'between:0,200'],
        ]);
    }

    public static function getService(array $data): array
    {
        return Validator::validate($data, [
            'from_district' => ['required', 'integer'],
            'to_district' => ['required', 'integer'],
        ]);
    }
}
