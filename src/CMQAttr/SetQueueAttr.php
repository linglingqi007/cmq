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
 * @see https://www.qcloud.com/document/product/406/5835
 *
 * Class SetQueueAttr
 * @package Tiger\CMQ\CMQAttr
 */
class SetQueueAttr extends BaseAttr
{

    /**
     * @var string 队列名
     */
    protected $queueName;

    /**
     * @var integer
     * 最大堆积消息数。
     * 取值范围在公测期间为 1,000,000 - 10,000,000，正式上线后范围可达到 1000,000-1000,000,000。
     * 默认取值在公测期间为 10,000,000，正式上线后为 1000,000,000
     */
    protected $maxMsgHeapNum;

    /**
     * @var integer 消息接收长轮询等待时间。取值范围 0-30 秒，默认值 0
     */
    protected $pollingWaitSeconds;

    /**
     * @var integer 消息可见性超时。取值范围 1-43200 秒（即12小时内），默认值 30
     */
    protected $visibilityTimeout;

    /**
     * @var integer 消息最大长度。取值范围 1024-65536 Byte（即1-64K），默认值 65536
     */
    protected $maxMsgSize;

    /**
     * @var integer 消息保留周期。取值范围 60-1296000 秒（1min-15天），默认值 345600 (4 天)
     */
    protected $msgRetentionSeconds;
}