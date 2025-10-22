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
        $this->client = new Client(['base_uri' => $this->apiUrl]);
    }

    public function sendError(string $content, string $severity = 'error', array $metadata = [])
    {
        return $this->send('error', $content, $severity, $metadata);
    }

    public function sendSystemMessage(string $content, array $metadata = [])
    {
        return $this->send('system_message', $content, 'info', $metadata);
    }

    protected function send(string $type, string $content, string $severity, array $metadata = [])
    {
        try {
            $response = $this->client->post('/api/ingest', [
                'json' => [
                    'type' => $type,
                    'content' => $content,
                    'severity' => $severity,
                    'metadata' => $metadata,
                ],
                'headers' => [
                    'X-API-Key' => $this->apiKey,
                    'Accept' => 'application/json',
                ],
            ]);

            return $response->getStatusCode() === 201;
        } catch (\Throwable $e) {
            // Optionally log locally if remote fails
            \Log::error('Setharo send failed: ' . $e->getMessage());
            return false;
        }
    }
}
