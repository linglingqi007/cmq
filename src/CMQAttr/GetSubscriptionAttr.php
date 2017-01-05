<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string $topicName
 * @property string $subscriptionName
 *
 * @see https://www.qcloud.com/document/product/406/7418
 *
 * Class GetSubscriptionAttr
 * @package Tiger\CMQ\CMQAttr
 */
class GetSubscriptionAttr extends BaseAttr
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