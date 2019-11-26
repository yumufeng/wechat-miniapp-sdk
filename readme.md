**淘宝联盟SDK**

淘宝联盟SDK

PHP =>7.0

`composer require yumufeng/wechat-miniapp-sdk`

如果是在swoole 扩展下使用，支持协程并发，需要在编译swoole扩展的时候开启，系统会自动判断是否采用swoole

```./configure --enable-openssl```

## 使用

```php
<?php

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);// 注入自己的缓存驱动，
$config = [
            'ak' => 'wx8e42c11111ca229c',
            'sk' => '',
            'redis' => $redis  // 注入自己的缓存驱动，
];
$pdd = new \weapp\WeAppFatory($config);
$info = $pdd->qrCode->createWeQr(
       '/pages/index/index',
       '11001'
);



```


## 支持

QQ 1476088442(收费服务，备注来意)

## License

apache
