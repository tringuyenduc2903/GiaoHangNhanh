<?php

namespace TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh;

use Exception;
use Illuminate\Http\Client\ConnectionException;

trait Address
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getProvince(
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($api_url, $token)
            ->post('shiip/public-api/master-data/province');

        if ($response->failed()) {
            throw new Exception(
                $response->json('message'),
                $response->json('code')
            );
        }

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getDistrict(
        int $province_id,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($api_url, $token)
            ->post('shiip/public-api/master-data/district', [
                'province_id' => $province_id,
            ]);

        if ($response->failed()) {
            throw new Exception(
                $response->json('message'),
                $response->json('code')
            );
        }

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getWard(
        int $district_id,
        ?string $api_url = null,
        ?string $token = null
    ): ?array {
        $response = $this
            ->getRequest($api_url, $token)
            ->post('shiip/public-api/master-data/ward', [
                'district_id' => $district_id,
            ]);

        if ($response->failed()) {
            throw new Exception(
                $response->json('message'),
                $response->json('code')
            );
        }

        return $response->json('data');
    }
}
