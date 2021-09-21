<?php


namespace App\Traits;


use GuzzleHttp\Client;

/**
 * Trait ExternalWebServicesTrait
 * @package App\Traits
 * @author Roger Rojas <rrojas@indracompany.com>
 */
trait ExternalWebServicesTrait
{

    /**
     * @param string $method
     * @param string $uri
     * @param array $query
     * @param array $body
     * @param array $headers
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function makeRequest(
        string $method,
        string $uri,
        array $headers = [],
        array $body = [],
        array $query = []
    ) {
        $httpClient = new Client([
            'base_uri' => $this->baseUri
        ]);

        $response = $httpClient->request(
            $method,
            $uri,
            [
                'query' => $query,
                'form_params' => $body,
                'headers' => $headers
            ]
        );
        $response = $response->getBody()->getContents();

        if (method_exists($this, 'decodeResponse')) {
            $response = $this->decodeResponse($response);
        }

        if (method_exists($this, 'checkIfErrorResponse')) {
            $this->checkIfErrorResponse($response);
        }

        return $response;
    }
}
