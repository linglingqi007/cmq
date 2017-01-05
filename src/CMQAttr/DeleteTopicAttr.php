<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string $topicName
 *
 * @see https://www.qcloud.com/document/product/406/7409
 *
 * Class DeleteTopic
 * @package Tiger\CMQ\CMQAttr
 */
class DeleteTopicAttr extends BaseAttr
{
    /**
     * @var string 队列名
     */
    protected $topicName;
}