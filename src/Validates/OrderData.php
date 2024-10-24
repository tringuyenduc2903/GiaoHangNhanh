<?php

namespace TriNguyenDuc\GiaoHangNhanh\Validates;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use TriNguyenDuc\GiaoHangNhanh\Enums\PaymentTypeId;
use TriNguyenDuc\GiaoHangNhanh\Enums\RequiredNote;
use TriNguyenDuc\GiaoHangNhanh\Enums\ServiceTypeId;

class OrderData
{
    public static function createOrder(array $data): array
    {
        $required = isset($data['return_phone']) || isset($data['return_address']);

        return Validator::validate($data, [
            'from_name' => ['sometimes', 'string', 'max:1024'],
            'from_phone' => ['sometimes', 'string'],
            'from_address' => ['sometimes', 'string', 'max:1024'],
            'from_ward_name' => ['sometimes', 'string'],
            'from_district_name' => ['sometimes', 'string'],
            'from_province_name' => ['sometimes', 'string'],
            'from_ward_code' => ['sometimes', 'string'],
            'from_district_id' => ['sometimes', 'integer'],
            'from_province_id' => ['sometimes', 'integer'],
            'to_name' => ['required', 'string', 'max:1024'],
            'to_phone' => ['required', 'string'],
            'to_address' => ['required', 'string', 'max:1024'],
            'to_ward_name' => ['nullable', 'string'],
            'to_district_name' => ['required_without:to_district_id', 'string'],
            'to_ward_code' => ['nullable', 'string'],
            'to_district_id' => ['required_without:to_district_name', 'integer'],
            'return_phone' => ['sometimes', 'string'],
            'return_address' => ['sometimes', 'string', 'max:1024'],
            'return_ward_name' => Rule::when(
                $required, [
                    'required_without:return_ward_code', 'string',
                ]),
            'return_district_name' => Rule::when(
                $required, [
                    'required_without:return_district_id', 'string',
                ]),
            'return_ward_code' => Rule::when(
                $required, [
                    'required_without:return_ward_name', 'integer',
                ]),
            'return_district_id' => Rule::when(
                $required, [
                    'required_without:return_district_name', 'integer',
                ]),
            'client_order_code' => ['sometimes', 'string', 'max:50'],
            'cod_amount' => ['sometimes', 'integer', 'between:0,50000000'],
            'content' => ['sometimes', 'string', 'max:2000'],
            'weight' => ['required', 'integer', 'between:0,50000'],
            'length' => ['sometimes', 'integer', 'between:0,200'],
            'width' => ['sometimes', 'integer', 'between:0,200'],
            'height' => ['sometimes', 'integer', 'between:0,200'],
            'pick_station_id' => ['sometimes', 'integer', 'min:0'],
            'insurance_value' => ['sometimes', 'integer', 'between:0,5000000'],
            'coupon' => ['sometimes', 'string'],
            'service_type_id' => ['required', 'integer', Rule::in(ServiceTypeId::keys())],
            'payment_type_id' => ['required', 'integer', Rule::in(PaymentTypeId::keys())],
            'note' => ['sometimes', 'string', 'max:5000'],
            'required_note' => ['required', 'string', 'max:500', Rule::in(RequiredNote::keys())],
            'pick_shift' => ['array'],
            'pick_shift.*' => ['required', 'integer'],
            'pickup_time' => ['sometimes', 'integer'],
            'items' => ['required', 'array'],
            'items.*.name' => ['required', 'string'],
            'items.*.code' => ['sometimes', 'string'],
            'items.*.quantity' => ['required', 'integer'],
            'items.*.price' => ['sometimes', 'integer'],
            'items.*.weight' => ['sometimes', 'integer', 'between:0,50000'],
            'items.*.length' => ['sometimes', 'integer', 'between:0,200'],
            'items.*.width' => ['sometimes', 'integer', 'between:0,200'],
            'items.*.height' => ['sometimes', 'integer', 'between:0,200'],
            'items.*.category' => ['sometimes', 'array'],
            'items.*.category.level1' => ['sometimes', 'string'],
            'items.*.category.level2' => ['sometimes', 'string'],
            'items.*.category.level3' => ['sometimes', 'string'],
            'cod_failed_amount' => ['sometimes', 'integer', 'min:0'],
        ]);
    }

    public static function updateOrder(array $data): array
    {
        $required = isset($data['return_phone']) || isset($data['return_address']);

        return Validator::validate($data, [
            'order_code' => ['required', 'string', 'max:50'],
            'from_name' => ['sometimes', 'string', 'max:1024'],
            'from_phone' => ['sometimes', 'string'],
            'from_address' => ['sometimes', 'string', 'max:1024'],
            'from_ward_name' => ['sometimes', 'string'],
            'from_district_name' => ['sometimes', 'string'],
            'from_province_name' => ['sometimes', 'string'],
            'from_ward_code' => ['sometimes', 'string'],
            'from_district_id' => ['sometimes', 'integer'],
            'from_province_id' => ['sometimes', 'integer'],
            'to_name' => ['required', 'string', 'max:1024'],
            'to_phone' => ['required', 'string'],
            'to_address' => ['required', 'string', 'max:1024'],
            'to_ward_name' => ['nullable', 'string'],
            'to_district_name' => ['required_without:to_district_id', 'string'],
            'to_ward_code' => ['nullable', 'string'],
            'to_district_id' => ['required_without:to_district_name', 'integer'],
            'return_phone' => ['sometimes', 'string'],
            'return_address' => ['sometimes', 'string', 'max:1024'],
            'return_ward_name' => Rule::when(
                $required, [
                    'required_without:return_ward_code', 'string',
                ]),
            'return_district_name' => Rule::when(
                $required, [
                    'required_without:return_district_id', 'string',
                ]),
            'return_ward_code' => Rule::when(
                $required, [
                    'required_without:return_ward_name', 'integer',
                ]),
            'return_district_id' => Rule::when(
                $required, [
                    'required_without:return_district_name', 'integer',
                ]),
            'client_order_code' => ['sometimes', 'string', 'max:50'],
            'content' => ['sometimes', 'string', 'max:2000'],
            'weight' => ['required', 'integer', 'between:0,50000'],
            'length' => ['sometimes', 'integer', 'between:0,200'],
            'width' => ['sometimes', 'integer', 'between:0,200'],
            'height' => ['sometimes', 'integer', 'between:0,200'],
            'pick_station_id' => ['sometimes', 'integer', 'min:0'],
            'insurance_value' => ['sometimes', 'integer', 'between:0,5000000'],
            'coupon' => ['sometimes', 'string'],
            'payment_type_id' => ['required', 'integer', Rule::in(PaymentTypeId::keys())],
            'note' => ['sometimes', 'string', 'max:5000'],
            'required_note' => ['required', 'string', 'max:500', Rule::in(RequiredNote::keys())],
            'pick_shift' => ['array'],
            'pick_shift.*' => ['required', 'integer'],
            'pickup_time' => ['sometimes', 'integer'],
            'items' => ['required', 'array'],
            'items.*.name' => ['required', 'string'],
            'items.*.code' => ['sometimes', 'string'],
            'items.*.quantity' => ['required', 'integer'],
            'items.*.price' => ['sometimes', 'integer'],
            'items.*.weight' => ['sometimes', 'integer', 'between:0,50000'],
            'items.*.length' => ['sometimes', 'integer', 'between:0,200'],
            'items.*.width' => ['sometimes', 'integer', 'between:0,200'],
            'items.*.height' => ['sometimes', 'integer', 'between:0,200'],
            'items.*.category' => ['sometimes', 'array'],
            'items.*.category.level1' => ['sometimes', 'string'],
            'items.*.category.level2' => ['sometimes', 'string'],
            'items.*.category.level3' => ['sometimes', 'string'],
        ]);
    }

    public static function updateCodOrder(array $data): array
    {
        return Validator::validate($data, [
            'order_code' => ['required', 'string', 'max:50'],
            'cod_amount' => ['required', 'integer', 'between:0,50000000'],
        ]);
    }

    public static function getStation(array $data): array
    {
        return Validator::validate($data, [
            'ward_code' => ['sometimes', 'integer'],
            'district_id' => ['required', 'integer'],
            'offset' => ['sometimes', 'integer', 'min:0'],
            'limit' => ['sometimes', 'integer', 'between:1,1000'],
        ]);
    }

    public static function calculateExpectedDeliveryTime(array $data): array
    {
        return Validator::validate($data, [
            'from_ward_code' => ['sometimes', 'string'],
            'from_district_id' => ['sometimes', 'integer'],
            'to_ward_code' => ['nullable', 'string'],
            'to_district_id' => ['required_without:to_ward_code', 'integer'],
            'service_id' => ['required', 'integer'],
        ]);
    }
}
