### qCloud CMQ 消息服务

> 基于 Laravel 封装腾讯云消息服务 API，非Laravel也可以用的， 但是没有测试过

### 示例

- Laravel

注册Provider 在config/app.php providers 中加入 下面代码

`
Tiger\CMQ\CMQServiceProvider::class,
`

生成配置文件

`
artisan vendor:publish --provider=Tiger\\CMQ\\CMQServiceProvider --tag=config
`

修改config/cmq.php 把对应的值替换

代码示例

```

$options = [
    'debug' => true,
    'timeout' => 5,
];

// 创建 queue
$attr = new CMQAttr\CreateQueueAttr();
$attr->Action = 'CreateQueue';
$attr->queueName = 'world-hello';

$response = app('cmq')->createQueue($attr, $options, 'post');

dd($response->isOk(), $response->getBody());
```