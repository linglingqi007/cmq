<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property $searchWord
 * @property $offset
 * @property $limit
 *
 * @see https://www.qcloud.com/document/product/406/7407
 *
 * Class ListTopicAttr
 * @package Tiger\CMQ\CMQAttr
 */
class ListTopicAttr extends BaseAttr
{

    /**
     * @var string
     * 用于过滤主题列表
     * 后台用模糊匹配的方式来返回符合条件的主题列表
     * 如果不填该参数，默认返回帐号下的所有主题
     */
    protected $searchWord;

    /**
     * @var integer 分页时本页获取主题列表的起始位置
     */
    protected $offset;

    /**
     * @var integer 分页时本页获取主题的个数
     */
    protected $limit;
}