<?php

namespace TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh;

use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use TriNguyenDuc\GiaoHangNhanh\Validates\CalculateFeeData;

trait CalculateFee
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function calculateFee(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($api_url, $token, $shop_id)
            ->post(
                'shiip/public-api/v2/shipping-order/fee',
                CalculateFeeData::calculateFee($data)
            );

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function feeOrderInfo(
        string $order_code,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($api_url, $token, $shop_id)
            ->post('shiip/public-api/v2/shipping-order/soc', [
                'order_code' => $order_code,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getService(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        if (is_null($api_url)) {
            $api_url = config('giaohangnhanh.api_url');
        }

        if (is_null($token)) {
            $token = config('giaohangnhanh.token');
        }

        if (is_null($shop_id)) {
            $shop_id = config('giaohangnhanh.shop_id');
        }

        $validate = CalculateFeeData::getService($data);

        $validate['shop_id'] = (int) $shop_id;

        $response = Http::baseUrl($api_url)
            ->withHeader('token', $token)
            ->accept('application/json')
            ->post(
                'shiip/public-api/v2/shipping-order/available-services',
                $validate
            );

        $this->handleFailedResponse($response);

        return $response->json('data');
    }
}
