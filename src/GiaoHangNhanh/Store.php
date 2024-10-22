<?php

namespace TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh;

use Exception;
use Illuminate\Http\Client\ConnectionException;
use TriNguyenDuc\GiaoHangNhanh\Validates\StoreData;

trait Store
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function createStore(
        array $data,
        ?string $api_url = null,
        ?string $token = null
    ): int {
        $response = $this
            ->getRequest($api_url, $token)
            ->post(
                'shiip/public-api/v2/shop/register',
                StoreData::createStore($data)
            );

        $this->handleFailedResponse($response);

        return $response->json('data.shop_id');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getStore(
        array $data,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($api_url, $token)
            ->post(
                'shiip/public-api/v2/shop/all',
                StoreData::getStore($data)
            );

        $this->handleFailedResponse($response);

        return $response->json('data');
    }
}
