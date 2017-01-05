<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string $queueName
 * @property integer $maxMsgHeapNum
 * @property integer $pollingWaitSeconds
 * @property integer $visibilityTimeout
 * @property integer $maxMsgSize
 * @property integer $msgRetentionSeconds
 *
 * @see https://www.qcloud.com/document/product/406/5832
 *
 * Class QueueRequest
 * @package Tiger\CMQ\CMQAttr
 */
class CreateQueueAttr extends BaseAttr
{
    /**
     * @var string 队列名
     */
    protected $queueName;

    /**
     * @var integer 最大堆积消息数
     */
    protected $maxMsgHeapNum;

    /**
     * @var integer 消息接收长轮询等待时间
     */
    protected $pollingWaitSeconds;

    /**
     * @var integer 消息可见性超时
     */
    protected $visibilityTimeout;

    /**
     * @var integer 消息最大长度
     */
    protected $maxMsgSize;

    /**
     * @var integer 消息保留周期
     */
    protected $msgRetentionSeconds;

}