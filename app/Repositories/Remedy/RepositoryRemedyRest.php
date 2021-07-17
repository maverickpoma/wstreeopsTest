<?php


namespace App\Repositories\Remedy;


use App\Contracts\ExternalServiceRepository;
use App\Traits\ExternalWebServicesTrait;

/**
 * Class RepositoryRemedyRest
 * @package App\Repositories
 * @author Roger Rojas <rrojas@indracompany.com>
 */

class RepositoryRemedyRest implements ExternalServiceRepository
{
    use ExternalWebServicesTrait;

    /**
     * @var string
     */
    protected $baseUri;

    /**
     * RepositoryRemedyRest constructor.
     */
    public function __construct()
    {
        $this->baseUri = env('REMEDY_BASE_URI');
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
