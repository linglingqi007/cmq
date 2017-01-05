<?php

namespace Tiger\CMQ\CMQAttr;

use \Tiger\CMQ\Exception;

/**
 * @property integer $Nonce
 * @property integer $Timestamp
 * @property string $SecretId
 * @property string $RequestClient
 * @property string $Signature
 * @property string $Action
 *
 * @see https://www.qcloud.com/document/product/406/5883
 *
 * Class Request
 * @package Tiger\CMQ\CMQAttr
 */
abstract class BaseAttr
{
    /**
     * @var string api请求名
     */
    protected $Action;

    /**
     * @var integer 随机数
     */
    protected $Nonce;

    /**
     * @var integer 时间戳
     */
    protected $Timestamp;

    /**
     * @var string 秘钥ID
     */
    protected $SecretId;

    /**
     * @var string $RequestClient
     */
    protected $RequestClient;

    /**
     * @var string
     */
    protected $Signature;


    /**
     * 构造签名及公共参数
     *
     * @param array $config
     * @param string $endPoint
     * @param string $method
     */
    public function sign(array $config, $endPoint, $method = 'POST')
    {
        $this->Nonce = mt_rand(10000, 9999999);
        $this->Timestamp = time();
        $this->SecretId = $config['secretId'];
        $this->RequestClient = $config['requestClient'];
        $this->Signature = $this->makeSign($config, $endPoint, $method);
    }

    /**
     * 获取对象属性
     *
     * @return array
     */
    public function getAttr()
    {
        $attr = [];
        foreach ($this as $key => $val) {

            if (isset($val)) {

                // 批量信息
                // 为方便用户使用，n从0开始或者从1开始都可以，但必须连续，
                // 例如发送两条消息，可以是(msgBody.0, msgBody.1)，或者(msgBody.1, msgBody.2)
                if (is_array($val)) {

                    foreach ($val as $i => $v) {
                        $attr[$key . '.' . $i] = $v;
                    }

                } else {
                    $attr[$key] = $val;
                }
            }
        }

        return $attr;
    }

    /**
     * @param string $name
     *
     * @return mixed
     * @throws Exception\CMQParameterException
     */
    public function __get($name)
    {
        if (property_exists($this, $name)) {

            return $this->$name;
        }

        $message = sprintf('%s not invalid', $name);
        throw new Exception\CMQParameterException($message);
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @throws Exception\CMQParameterException
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
            return;
        }

        $message = sprintf('%s not invalid', $name);
        throw new Exception\CMQParameterException($message);
    }

    /**
     * 生成签名
     *
     * @param array $config
     * @param string $endPoint
     * @param string $method
     *
     * @return string
     * @throws Exception\CMQConfigException
     */
    private function makeSign(array $config, $endPoint, $method = 'POST')
    {
        $attr = $this->getAttr();
        ksort($attr);

        $queryString = '';
        foreach ($attr as $key => $value) {

            $key = str_replace('_', '.', $key);

            // 过滤文件上传
            if (strtoupper($method) === 'POST' && '@' === substr($value, 0, 1)) {
                continue;
            }

            $queryString .= $key . '=' . $value . '&';
        }

        $queryString = rtrim($queryString, '&');

        $parseUrl = parse_url($endPoint);
        $srcString = $method . $parseUrl['host'] . $parseUrl['path'] . '?' . $queryString;

        return base64_encode(hash_hmac('sha1', $srcString, $config['secretKey'], true));
    }
}