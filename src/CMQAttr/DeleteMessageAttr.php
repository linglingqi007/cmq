<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string $queueName
 * @property string $receiptHandle
 *
 * @see https://www.qcloud.com/document/product/406/5840
 *
 * Class DeleteMessageAttr
 * @package Tiger\CMQ\CMQAttr
 */
class DeleteMessageAttr extends BaseAttr
{

    /**
     * @var string 队列名
     */
    protected $queueName;

    /**
     * @var string 上次消费返回唯一的消息句柄，用于删除消息
     */
    protected $receiptHandle;
}