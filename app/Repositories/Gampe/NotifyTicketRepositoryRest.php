<?php


namespace App\Repositories\Gampe;


use App\Contracts\ExternalServiceRepository;
use App\Traits\ExternalWebServicesTrait;


/**
 * Notify Ticket Repository for REST Web Service
 *
 * @author Roger Rojas <rrojas@indracompany.com>
 */
class NotifyTicketRepositoryRest implements ExternalServiceRepository
{
    use ExternalWebServicesTrait;

    /**
     * BaseUri of Service
     *
     * @var string
     */
    protected $baseUri;

    /**
     * NotifyTicketRepositoryRest Construct
     */
    public function __construct()
    {
        $this->baseUri = env('GAMPE_URI');
    }

    /**
     * Decode to JSON response
     *
     * @param string $response
     * @return mixed|void
     */
    public function decodeResponse(string $response)
    {

        $decodeResponse = json_decode($response);
        return $decodeResponse->data ?? $decodeResponse;
    }
}
