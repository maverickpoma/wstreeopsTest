<?php


namespace App\Repositories\Gampe;

use App\Contracts\Gampe\NotifyTicketRepository;

/**
 * @author Roger Rojas <rrojas@indracompany.com>
 */
final class NotifyTicketChangeEventRepository extends NotifyTicketRepositoryRest implements NotifyTicketRepository
{
    public function notifyTicketAttributeValueChangeEvent(array $body)
    {
        $headers = [
            'Content-type' => 'application/json; charset=UTF-8'
        ];
        return $this->makeRequest(
            'POST',
            '/posts', // '/ticketAttributeValueChangeEvent',
            $headers,
            $body
        );
    }
}
