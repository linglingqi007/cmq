<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string queueName
 * @property array $receiptHandle
 *
 *
 * Class BatchDeleteMessageAttr
 * @package Tiger\CMQ\CMQAttr
 */
class BatchDeleteMessageAttr extends BaseAttr
{

    /**
     * @var string 队列名
     */
    protected $queueName;

    /**
     * @var array
     * 上次消费消息时返回的消息句柄。为方便用户使用，n从0开始或者从1开始都可以，
     * 但必须连续，例如删除两条消息，可以是(receiptHandle.0,receiptHandle.1)，
     * 或者(receiptHandle.1, receiptHandle.2)
     */
    protected $receiptHandle;
}