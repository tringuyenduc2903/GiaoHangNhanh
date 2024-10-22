<?php

namespace TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh;

use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use TriNguyenDuc\GiaoHangNhanh\Validates\OrderData;

trait Order
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function previewOrder(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($api_url, $token, $shop_id)
            ->post(
                'shiip/public-api/v2/shipping-order/preview',
                OrderData::createOrder($data)
            );

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function createOrder(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($api_url, $token, $shop_id)
            ->post(
                'shiip/public-api/v2/shipping-order/create',
                OrderData::createOrder($data)
            );

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function updateOrder(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): null {
        $response = $this
            ->getRequest($api_url, $token, $shop_id)
            ->post(
                'shiip/public-api/v2/shipping-order/update',
                OrderData::updateOrder($data)
            );

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function updateCodOrder(
        array $data,
        ?string $api_url = null,
        ?string $token = null
    ): null {
        $response = $this
            ->getRequest($api_url, $token)
            ->post(
                'shiip/public-api/v2/shipping-order/updateCOD',
                OrderData::updateCodOrder($data)
            );

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function orderInfo(
        string $order_code,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($api_url, $token)
            ->post('shiip/public-api/v2/shipping-order/detail', [
                'order_code' => $order_code,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function orderInfoByClientOrderCode(
        string $client_order_code,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($api_url, $token)
            ->post('shiip/public-api/v2/shipping-order/detail-by-client-code', [
                'client_order_code' => $client_order_code,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function returnOrder(
        array $order_codes,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($api_url, $token, $shop_id)
            ->post('shiip/public-api/v2/switch-status/return', [
                'order_codes' => $order_codes,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function deliveryAgain(
        array $order_codes,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($api_url, $token, $shop_id)
            ->post('shiip/public-api/v2/switch-status/storing', [
                'order_codes' => $order_codes,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function printOrder(
        array $order_codes,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        if (is_null($api_url)) {
            $api_url = config('giaohangnhanh.api_url');
        }

        if (is_null($token)) {
            $token = config('giaohangnhanh.token');
        }

        $response = Http::baseUrl($api_url)
            ->withHeader('token', $token)
            ->accept('application/json')
            ->post('shiip/public-api/v2/a5/gen-token', [
                'order_codes' => $order_codes,
            ]);

        $this->handleFailedResponse($response);

        $print_token = $response->json('data.token');

        return [
            'A5' => "$api_url/a5/public-api/printA5?token=$print_token",
            '80x80' => "$api_url/a5/public-api/print80x80?token=$print_token",
            '52x70' => "$api_url/a5/public-api/print52x70?token=$print_token",
        ];
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function cancelOrder(
        array $order_codes,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ) {
        $response = $this
            ->getRequest($api_url, $token, $shop_id)
            ->post('shiip/public-api/v2/switch-status/cancel', [
                'order_codes' => $order_codes,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getStation(
        array $data,
        string $captcha,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($api_url, $token)
            ->withHeader('captcha', $captcha)
            ->post(
                'shiip/public-api/v2/station/get',
                OrderData::getStation($data)
            );

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function calculateExpectedDeliveryTime(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($api_url, $token, $shop_id)
            ->post(
                'shiip/public-api/v2/shipping-order/leadtime',
                OrderData::calculateExpectedDeliveryTime($data)
            );

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function pickShift(
        ?string $api_url = null,
        ?string $token = null
    ) {
        $response = $this
            ->getRequest($api_url, $token)
            ->post('shiip/public-api/v2/shift/date');

        $this->handleFailedResponse($response);

        return $response->json('data');
    }
}
