<?php

namespace TriNguyenDuc\GiaoHangNhanh;

use Exception;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\Address;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\CalculateFee;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\Order;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\Store;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\Ticket;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\Utilities;

class GiaoHangNhanh
{
    use Address;
    use CalculateFee;
    use Order;
    use Store;
    use Ticket;
    use Utilities;

    protected function getRequest(
        ?string $api_url = null,
        ?string $token = null,
        null|int|bool $shop_id = false
    ): PendingRequest {
        if (is_null($api_url)) {
            $api_url = config('giaohangnhanh.api_url');
        }

        if (is_null($token)) {
            $token = config('giaohangnhanh.token');
        }

        if (is_null($shop_id)) {
            $shop_id = config('giaohangnhanh.shop_id');
        }

        $request = Http::baseUrl($api_url)
            ->withHeader('token', $token)
            ->accept('application/json');

        if (is_int($shop_id)) {
            $request->withHeader('shop_id', $shop_id);
        }

        return $request;
    }

    /**
     * @throws Exception
     */
    protected function handleFailedResponse(Response $response): void
    {
        if ($response->successful()) {
            return;
        }

        Log::debug(
            'GiaoHangNhanh API Error',
            $response->json()
        );

        throw new Exception(
            $response->json('message'),
            $response->json('code')
        );
    }
}
