<?php

namespace Tiger\CMQ\CMQAttr;

/**
 * @property string $topicName
 * @property array $msgBody
 * @property array $msgTag
 *
 * @see https://www.qcloud.com/document/product/406/7412
 *
 * Class BatchPublishMessage
 * @package Tiger\CMQ\CMQAttr
 */
class BatchPublishMessageAttr extends BaseAttr
{
    /**
     * @var string
     */
    protected $topicName;

    /**
     * @var array
     * 消息正文。表示这一批量中的一条消息。目前批量消息数量不能超过 16 条。
     * 为方便用户使用，n从0开始或者从1开始都可以，但必须连续，例如发送两条消息，
     * 可以是(msgBody.0, msgBody.1)，或者(msgBody.1, msgBody.2)
     */
    protected $msgBody;

    /**
     * @var array
     * 消息过滤标签。消息标签（用于消息过滤)。
     * 标签数量不能超过5个，每个标签不超过16个字符。
     * 与Subscribe接口的filterTag参数配合使用，规则：
     * 1）如果filterTag没有设置，则无论msgTag是否有设置，订阅接收所有发布到Topic的消息；
     * 2）如果filterTag数组有值，则只有数组中至少有一个值在msgTag数组中也存在时（即filterTag和msgTag有交集），订阅才接收该发布到Topic的消息；
     * 3）如果filterTag数组有值，但msgTag没设置，则不接收任何发布到Topic的消息，可以认为是2）的一种特例，此时filterTag和msgTag没有交集。
     * 规则整体的设计思想是以订阅者的意愿为主。
     */
    protected $msgTag;
}