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
        $httpClient = new \GuzzleHttp\Client([
            'base_uri' => $this->baseUri

        ]);
        #var_dump($headers);
        #var_dump($body);
        #exit;
        #dd($httpClient);
        $response = $httpClient->request(
            $method,
            $uri,
            [
                'query' => $query,
                'body' => json_encode($body),
                'headers' => $headers,
               # 'debug' => true
               ]
        );
        #return $response->getStatusCode();

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
