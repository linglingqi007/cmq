<?php

namespace Tiger\CMQ;

use Tiger\CMQ\Exception\CMQResponseException;

/**
 * @property string $message
 * @property integer $code
 *
 * CMQResponse 可用属性为文档返回属性
 *
 * @see https://www.qcloud.com/document/product/406/5851
 * Class CMQResponse
 * @package Tiger\CMQ
 */
class CMQResponse
{
    private $response;

    private $body;

    /**
     * CMQResponse constructor.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(\Psr\Http\Message\ResponseInterface $response)
    {
        $this->response = $response;
        $this->body = $this->response->getBody()->getContents();
    }

    /**
     * 返回响应 body
     * @return string
     */
    public function getBody()
    {
        return (string) $this->body;
    }

    /**
     * 判断请求是否正常执行
     * @return bool
     * @throws CMQResponseException
     */
    public function isOk()
    {
        $body = \GuzzleHttp\json_decode($this->body);

        if (! property_exists($body, 'code') || ! property_exists($body, 'message')) {
            throw new CMQResponseException('Property code or message invalid');
        }

        if ($body->code == 0) {
            return true;
        }

        return false;
    }

    public function __get($name)
    {
        $body = \GuzzleHttp\json_decode($this->body, true);

        if (! array_key_exists($name, $body)) {
            throw new CMQResponseException(sprintf('Property %s invalid', $name));
        }

        return $body[$name];
    }
}