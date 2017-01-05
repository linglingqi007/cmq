<?php

namespace Tiger\CMQ\CMQAttr;

/**
 *
 * @property string $searchWord
 * @property integer $offset
 * @property integer $limit
 *
 * @see https://www.qcloud.com/document/product/406/5833
 *
 * Class ListQueueAttr
 * @package Tiger\CMQ\CMQAttr
 */
class ListQueueAttr extends BaseAttr
{

    /**
     * @var string 用于过滤队列列表
     */
    protected $searchWord;

    /**
     * @var integer 分页时本页获取队列列表的起始位置
     */
    protected $offset;

    /**
     * @var integer 分页时本页获取队列的个数
     */
    protected $limit;
}