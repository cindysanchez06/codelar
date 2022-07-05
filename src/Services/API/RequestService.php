<?php

namespace App\Services\API;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class RequestService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     */
    public function requests(string $method, string $url, array $headers = [], array $body = []): array
    {
        $response = $this->client->request(
            $method,
            $url,
            [
                'headers' => $headers,
                'body' => $body
            ]
        );
        return $response->toArray();
    }
}