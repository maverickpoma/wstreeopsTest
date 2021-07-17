<?php


namespace App\Contracts;

/**
 * Interface ExternalServiceRepository
 * @package App\Contracts
 * @author Roger Rojas <rrojas@indracompany.com>
 */

interface ExternalServiceRepository
{

    /**
     * Decode response to required format
     *
     * @param string $response
     * @return mixed
     */
    public function decodeResponse(string $response);
}
