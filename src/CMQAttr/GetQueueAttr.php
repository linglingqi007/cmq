<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string $queueName
 *
 * @see https://www.qcloud.com/document/product/406/5834
 *
 * Class GetQueueAttr
 * @package Tiger\CMQ\CMQAttr
 */
class GetQueueAttr extends BaseAttr
{
    /**
     * @var string 队列名
     */
    protected $queueName;
}