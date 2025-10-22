<?php

namespace Setharo;

use GuzzleHttp\Client;

class Setharo
{
    protected string $apiUrl;
    protected string $apiKey;
    protected Client $client;

    public function __construct(string $apiUrl, string $apiKey)
    {
        $this->apiUrl = rtrim($apiUrl, '/');
        $this->apiKey = $apiKey;
        $this->client = new Client();
    }

    public function sendError(string $content, array $metadata = [], string $severity = 'error')
    {
        return $this->send('error', $content, $severity, $metadata);
    }

    public function sendSystemMessage(string $content, array $metadata = [])
    {
        return $this->send('system_message', $content, 'info', $metadata);
    }

    protected function send(string $type, string $content, string $severity, array $metadata)
    {
        $response = $this->client->post("{$this->apiUrl}/api/ingest", [
            'json' => [
                'type' => $type,
                'content' => $content,
                'severity' => $severity,
                'metadata' => $metadata,
            ],
            'headers' => [
                'X-API-Key' => $this->apiKey,
                'Content-Type' => 'application/json',
            ],
        ]);

        return $response->getStatusCode() === 201;
    }
}
