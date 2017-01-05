<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string $topicName
 * @property string $subscriptionName
 * @property string $protocol
 * @property string $endpoint
 * @property string $notifyStrategy
 * @property string $notifyContentFormat
 * @property array $filterTag
 *
 * @see https://www.qcloud.com/document/product/406/7414
 *
 * Class SubscribeAttr
 * @package Tiger\CMQ\CMQAttr
 */
class SetSubscriptionAttr extends BaseAttr
{
    /**
     * @var string
     */
    protected $topicName;

    /**
     * @var string 订阅名字
     */
    protected $subscriptionName;

    /**
     * @var string
     * 订阅的协议，目前支持两种协议：http、queue。
     * 使用http协议，用户需自己搭建接受消息的web server。
     * 使用queue，消息会自动推送到CMQ queue，用户可以并发地拉取消息。
     */
    protected $protocol;

    /**
     * @var string 接收通知的endpoint，根据协议protocol区分：
     * 对于http，endpoint必须以“http://”开头，host可以是域名或IP；对于queue，则填queueName。
     */
    protected $endpoint;

    /**
     * @var string
     * 向endpoint推送消息出现错误时，CMQ推送服务器的重试策略。
     * 取值有：
     * 1）BACKOFF_RETRY，退避重试。每隔一定时间重试一次，重试够一定次数后，就把该消息丢弃，继续推送下一条消息；
     * 2）EXPONENTIAL_DECAY_RETRY，指数衰退重试。每次重试的间隔是指数递增的，例如开始1s，后面是2s，4s，8s...
     * 由于Topic消息的周期是一天，所以最多重试一天就把消息丢弃。默认值是EXPONENTIAL_DECAY_RETRY
     */
    protected $notifyStrategy;

    /**
     * @var string
     * 推送内容的格式。
     * 取值：
     * 1）JSON；
     * 2）SIMPLIFIED，即raw格式。
     * 如果protocol是queue，则取值必须为SIMPLIFIED。
     * 如果protocol是http，两个值均可以，默认值是JSON
     */
    protected $notifyContentFormat;

    /**
     * @var array 消息标签
     */
    protected $filterTag;
}