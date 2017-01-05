<?php

namespace Tiger\CMQ;

use GuzzleHttp\Client;
use Tiger\CMQ\Exception\CMQRequestException;

class HttpClient
{
    private $client;

    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->client = new client();
    }

    /**
     * @param CMQAttr\BaseAttr $baseAttr
     * @param string $endPoint
     * @param string $method
     * @param array $options
     *
     * @return CMQResponse
     */
    public function send(CMQAttr\BaseAttr $baseAttr, $endPoint, array $options = [], $method = 'POST')
    {
        $method = strtoupper($method);
        $baseAttr->sign($this->config, $endPoint, $method);
        $attr = $baseAttr->getAttr();

        if ($method == 'POST') {
            $options['body'] = http_build_query($attr);
        } else {
            $options['query'] = http_build_query($attr);
        }

        $promise = $this->client->requestAsync($method, $endPoint, $options);

        return $promise->then(function (\Psr\Http\Message\ResponseInterface $response) {

            return (new CMQResponse($response));
        }, function (\GuzzleHttp\Exception\RequestException $requestException) {

            throw new CMQRequestException($requestException->getMessage(), 0, $requestException);
        })->wait();
    }
}