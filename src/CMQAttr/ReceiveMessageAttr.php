<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string $queueName
 * @property string $pollingWaitSeconds
 *
 * @see https://www.qcloud.com/document/product/406/5839
 *
 * Class ReceiveMessageAttr
 * @package Tiger\CMQ\CMQAttr
 */
class ReceiveMessageAttr extends BaseAttr
{

    /**
     * @var string 队列名
     */
    protected $queueName;

    /**
     * @var string 本次请求的长轮询等待时间。取值范围 0-30 秒，默认值 0
     */
    protected $pollingWaitSeconds;
}