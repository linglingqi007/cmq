<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string $topicName
 * @property string $subscriptionName
 *
 * @see https://www.qcloud.com/document/product/406/7417
 *
 * Class UnSubscribeAttr
 * @package Tiger\CMQ\CMQAttr
 */
class UnsubscribeAttr extends BaseAttr
{

    /**
     * @var string
     */
    protected $topicName;

    /**
     * @var string
     */
    protected $subscriptionName;
}