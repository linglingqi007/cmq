<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string $topicName
 * @property string $searchWord
 * @property integer $offset
 * @property integer $limit
 *
 * @see https://www.qcloud.com/document/product/406/7415
 *
 * Class ListSubscriptionByTopicAttr
 * @package Tiger\CMQ\CMQAttr
 */
class ListSubscriptionByTopicAttr extends BaseAttr
{

    /**
     * @var string
     */
    protected $topicName;

    /**
     * @var string
     * 用于过滤订阅列表，后台用模糊匹配的方式来返回符合条件的订阅列表。
     * 如果不填该参数，默认返回帐号下的所有订阅
     */
    protected $searchWord;

    /**
     * @var integer
     * 分页时本页获取订阅列表的起始位置。
     * 如果填写了该值，必须也要填写 limit 。
     * 该值缺省时，后台取默认值 0。取值范围0-1000
     */
    protected $offset;

    /**
     * @var integer 分页时本页获取订阅的个数。取值范围0-100
     */
    protected $limit;
}