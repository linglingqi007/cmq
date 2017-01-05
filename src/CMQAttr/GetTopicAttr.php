<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string $topicName
 *
 * @see https://www.qcloud.com/document/product/406/7408
 *
 * Class GetTopicAttr
 * @package Tiger\CMQ\CMQAttr
 */
class GetTopicAttr extends BaseAttr
{

    /**
     * @var string 队列名
     */
    protected $topicName;

}