<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string $queueName
 * @property integer $numOfMsg
 * @property integer $pollingWaitSeconds
 *
 * @see https://www.qcloud.com/document/product/406/5924
 *
 * Class BatchReceiveMessageAttr
 * @package Tiger\CMQ\CMQAttr
 */
class BatchReceiveMessageAttr extends BaseAttr
{
    /**
     * @var string 队列名
     */
    protected $queueName;

    /**
     * @var integer 本次消费的消息数量。取值范围 1-16
     */
    protected $numOfMsg;

    /**
     * @var integer 本次消费的消息数量。取值范围 1-16
     */
    protected $pollingWaitSeconds;

}