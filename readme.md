
微信小程序的SDK

PHP =>7.0

`composer require yumufeng/wechat-miniapp-sdk`


使用案例

```php 

$weappClient = new \weapp\WeAppFatory([
    'ak' => '',
    'sk' => '',
    'redis=> ''//redis驱动
]);

$weappClient->qrCode->createWeQr($path, $scene, $width = 480);

```