<?php

namespace App\Contracts\Gampe;

/**
 * Inteface NotifyTicketRepository
 * @package App\Contracts\Gampe
 * @author Roge Rojas <rrojas@indracompany.com>
 */
interface NotifyTicketRepository
{
    public function notifyTicketAttributeValueChangeEvent(array $body);
}
