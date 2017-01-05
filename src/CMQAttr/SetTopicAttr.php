<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string $topicName
 * @property integer $maxMsgSize
 *
 * @see https://www.qcloud.com/document/product/406/7406
 *
 * Class SetTopicAttr
 * @package Tiger\CMQ\CMQAttrp
 */
class SetTopicAttr extends BaseAttr
{

    /**
     * @var string
     * 主题名字，在单个地域同一帐号下唯一。
     * 主题名称是一个不超过 64 个字符的字符串，
     * 必须以字母为首字符，剩余部分可以包含字母、数字和横划线(-)
     */
    protected $topicName;

    /**
     * @var integer 消息最大长度。取值范围 1024-65536 Byte（即1-64K），默认值 65536
     */
    protected $maxMsgSize;

}