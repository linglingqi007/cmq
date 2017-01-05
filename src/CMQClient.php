<?php

namespace Tiger\CMQ;

class CMQClient
{
    /**
     * cmq 配置数组
     * @var array
     */
    private $config;

    /**
     * @var \Tiger\CMQ\HttpClient
     */
    private $http;

    /**
     * @var array GuzzleHttp options
     */
    private $options;

    public function __construct(array $config, array $options = [])
    {
        if (empty($config) || ! isset($config['queueEndPoint'], $config['topicEndPoint'], $config['secretKey'], $config['secretId'], $config['requestClient'])) {
            throw new Exception\CMQConfigException('Config invalid');
        }

        if (empty($options)) {

            $this->options = [
                'debug' => false,
                'timeout' => 10,
            ];
        } else {
            $this->options = $options;
        }

        $this->config = $config;
        $this->http   = new \Tiger\CMQ\HttpClient($this->config);
    }

    ///////////////////////////////////////////// Queue //////////////////////////////////////
    /**
     * 创建队列
     *
     * @param CMQAttr\CreateQueueAttr $queueRequest
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function createQueue(CMQAttr\CreateQueueAttr $queueRequest, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;
        return $this->http->send($queueRequest, $this->config['queueEndPoint'], $options, $method);
    }

    /**
     * 获取队列列表
     *
     * @param CMQAttr\ListQueueAttr $listQueueAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function listQueue(CMQAttr\ListQueueAttr $listQueueAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;
        return $this->http->send($listQueueAttr, $this->config['queueEndPoint'], $options, $method);
    }

    /**
     * 获取队列属性
     *
     * @param CMQAttr\GetQueueAttr $getQueueAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function getQueueAttributes(CMQAttr\GetQueueAttr $getQueueAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;
        return $this->http->send($getQueueAttr, $this->config['queueEndPoint'], $options, $method);
    }

    /**
     * 设置队列属性
     *
     * @param CMQAttr\SetQueueAttr $setQueueAttributes
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function setQueueAttributes(CMQAttr\SetQueueAttr $setQueueAttributes, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;

        return $this->http->send($setQueueAttributes, $this->config['queueEndPoint'], $options, $method);
    }

    /**
     * 删除队列
     *
     * @param CMQAttr\DeleteQueueAttr $deleteQueueAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function deleteQueue(CMQAttr\DeleteQueueAttr $deleteQueueAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;
        return $this->http->send($deleteQueueAttr, $this->config['queueEndPoint'], $options, $method);
    }

    /**
     * 发送队列信息
     *
     * @param CMQAttr\SendMessageAttr $sendMessageAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function sendMessage(CMQAttr\SendMessageAttr $sendMessageAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;
        return $this->http->send($sendMessageAttr, $this->config['queueEndPoint'], $options, $method);
    }

    /**
     * 批量发送队列信息
     *
     * @param CMQAttr\BatchSendMessageAttr $batchSendMessage
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function batchSendMessage(CMQAttr\BatchSendMessageAttr $batchSendMessage, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;
        return $this->http->send($batchSendMessage, $this->config['queueEndPoint'], $options, $method);
    }

    /**
     * 消费信息
     *
     * @param CMQAttr\ReceiveMessageAttr $receiveMessageAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function receiveMessage(CMQAttr\ReceiveMessageAttr $receiveMessageAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;

        return $this->http->send($receiveMessageAttr, $this->config['queueEndPoint'], $options, $method);
    }

    /**
     *
     * 批量消费信息
     *
     * @param CMQAttr\BatchReceiveMessageAttr $batchReceiveMessageAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function batchReceiveMessage(CMQAttr\BatchReceiveMessageAttr $batchReceiveMessageAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;

        return $this->http->send($batchReceiveMessageAttr, $this->config['queueEndPoint'], $options, $method);
    }

    /**
     *
     * @param CMQAttr\DeleteMessageAttr $deleteMessageAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function deleteMessage(CMQAttr\DeleteMessageAttr $deleteMessageAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;

        return $this->http->send($deleteMessageAttr, $this->config['queueEndPoint'], $options, $method);
    }

    /**
     *
     * 批量删除信息
     *
     * @param CMQAttr\BatchDeleteMessageAttr $batchDeleteMessageAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function batchDeleteMessage(CMQAttr\BatchDeleteMessageAttr $batchDeleteMessageAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;

        return $this->http->send($batchDeleteMessageAttr, $this->config['queueEndPoint'], $options, $method);
    }

    //////////////////////////////////////// Topic ////////////////////////////////////

    /**
     * 创建 Topic
     *
     * @param CMQAttr\CreateTopicAttr $createTopicAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function createTopic(CMQAttr\CreateTopicAttr $createTopicAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;

        return $this->http->send($createTopicAttr, $this->config['topicEndPoint'], $options, $method);
    }

    /**
     * 修改属性
     *
     * @param CMQAttr\SetTopicAttr $setTopicAttr
     * @param string $method
     *
     * @return CMQResponse
     */
    public function setTopicAttributes(CMQAttr\SetTopicAttr $setTopicAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;

        return $this->http->send($setTopicAttr, $this->config['topicEndPoint'], $options, $method);
    }

    /**
     * topic 列表
     *
     * @param CMQAttr\ListTopicAttr $listTopicAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function listTopic(CMQAttr\ListTopicAttr $listTopicAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;

        return $this->http->send($listTopicAttr, $this->config['topicEndPoint'], $options, $method);
    }

    /**
     * 获取 topic 属性
     *
     * @param CMQAttr\GetTopicAttr $getTopicAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function getTopicAttributes(CMQAttr\GetTopicAttr $getTopicAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;

        return $this->http->send($getTopicAttr, $this->config['topicEndPoint'], $options, $method);
    }

    /**
     * 删除 topic
     *
     * @param CMQAttr\DeleteTopicAttr $deleteTopic
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function deleteTopic(CMQAttr\DeleteTopicAttr $deleteTopic, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;
        return $this->http->send($deleteTopic, $this->config['topicEndPoint'], $options, $method);
    }

    /**
     * 发布消息
     *
     * @param CMQAttr\PublishMessageAttr $publishMessageAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function publishMessage(CMQAttr\PublishMessageAttr $publishMessageAttr, array $options = [], $method = 'post')
    {
        $options = $options ? : $this->options;

        return $this->http->send($publishMessageAttr, $this->config['topicEndPoint'], $options, $method);
    }

    /**
     * 批量发布消息
     *
     * @param CMQAttr\BatchPublishMessageAttr $batchPublishMessage
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function batchPublishMessage(CMQAttr\BatchPublishMessageAttr $batchPublishMessage, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;

        return $this->http->send($batchPublishMessage, $this->config['topicEndPoint'], $options, $method);
    }

    ////////////////////////////////////////// 订阅

    /**
     * 订阅
     *
     * @param CMQAttr\SubscribeAttr $subscribeAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function subscribe(CMQAttr\SubscribeAttr $subscribeAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;
        return $this->http->send($subscribeAttr, $this->config['topicEndPoint'], $options, $method);
    }

    /**
     * 获取订阅列表
     *
     * @param CMQAttr\ListSubscriptionByTopicAttr $listSubscriptionByTopicAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function listSubscriptionByTopic(CMQAttr\ListSubscriptionByTopicAttr $listSubscriptionByTopicAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;

        return $this->http->send($listSubscriptionByTopicAttr, $this->config['topicEndPoint'], $options, $method);
    }

    /**
     * 设置订阅属性
     *
*@param CMQAttr\SetSubscriptionAttr $setSubscriptionAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function setSubscriptionAttributes(CMQAttr\SetSubscriptionAttr $setSubscriptionAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;

        return $this->http->send($setSubscriptionAttr, $this->config['topicEndPoint'], $options, $method);
    }

    /**
     * 取消订阅
     *
     * @param CMQAttr\UnsubscribeAttr $unSubscribeAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function unsubscribe(CMQAttr\UnsubscribeAttr $unSubscribeAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;

        return $this->http->send($unSubscribeAttr, $this->config['topicEndPoint'], $options, $method);
    }

    /**
     * 获取订阅属性
     *
     * @param CMQAttr\GetSubscriptionAttr $getSubscriptionAttr
     * @param array $options
     * @param string $method
     *
     * @return CMQResponse
     */
    public function getSubscriptionAttributes(CMQAttr\GetSubscriptionAttr $getSubscriptionAttr, array $options = [], $method = 'POST')
    {
        $options = $options ? : $this->options;

        return $this->http->send($getSubscriptionAttr, $this->config['topicEndPoint'], $options, $method);
    }
}