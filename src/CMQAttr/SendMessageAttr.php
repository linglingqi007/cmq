<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string $queueName
 * @property string $msgBody
 *
 * @see https://www.qcloud.com/document/product/406/5837
 *
 * Class SendMessageAttr
 * @package Tiger\CMQ\CMQAttr
 */
class SendMessageAttr extends BaseAttr
{
    /**
     * @var string
     * 队列名字，在单个地域同一帐号下唯一。
     * 队列名称是一个不超过 64 个字符的字符串，
     * 必须以字母为首字符，剩余部分可以包含字母、数字和横划线(-)
     */
    protected $queueName;

    /**
     * @var string
     *
     * 消息正文。至少 1 Byte，
     * 最大长度受限于设置的队列消息最大长度属性。
     */
    protected $msgBody;
}