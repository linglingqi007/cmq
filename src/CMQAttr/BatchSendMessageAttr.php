<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string $queueName
 * @property array $msgBody
 *
 * @see https://www.qcloud.com/document/product/406/5838
 *
 * Class BatchSendMessage
 * @package Tiger\CMQ\CMQAttr
 */
class BatchSendMessageAttr extends BaseAttr
{
    /**
     * @var string 队列名
     */
    protected $queueName;

    /**
     * @var array
     *
     * 批量信息
     * 为方便用户使用，n从0开始或者从1开始都可以，但必须连续，
     * 例如发送两条消息，可以是(msgBody.0, msgBody.1)，或者(msgBody.1, msgBody.2)
     *
     */
    protected $msgBody;
}