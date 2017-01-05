<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string $queueName
 *
 * @see https://www.qcloud.com/document/product/406/5836
 *
 * Class DeleteQueueAttr
 * @package Tiger\CMQ\CMQAttr
 */
class DeleteQueueAttr extends BaseAttr
{

    /**
     * @var string 队列名
     */
    protected $queueName;
}