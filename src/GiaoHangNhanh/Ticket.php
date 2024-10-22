<?php

namespace TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh;

use Exception;
use Illuminate\Http\Client\ConnectionException;
use TriNguyenDuc\GiaoHangNhanh\Validates\TicketData;

trait Ticket
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function createTicket(
        array $data,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($api_url, $token)
            ->asForm()
            ->post(
                'shiip/public-api/ticket/create',
                TicketData::createTicket($data)
            );

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function createFeedbackTicket(
        array $data,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($api_url, $token)
            ->asForm()
            ->post(
                'shiip/public-api/ticket/reply',
                TicketData::createFeedbackTicket($data)
            );

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getTicketList(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): ?array {
        $response = $this
            ->getRequest($api_url, $token, $shop_id)
            ->post(
                'shiip/public-api/ticket/index',
                TicketData::getTickets($data)
            );

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getTicket(
        int $ticket_id,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($api_url, $token)
            ->post('shiip/public-api/ticket/detail', [
                'ticket_id' => $ticket_id,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }
}
