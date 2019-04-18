
微信小程序的SDK

为TP5 和 swoft-1.0 封装的小程序SDK

PHP =>7.0

`composer require yumufeng/wechat-miniapp-sdk`


使用案例

```php 

$weappClient = new \weapp\WeAppFatory([
    'ak' => '',
    'sk' => ''
]);

$weappClient->qrCode->createWeQr($path, $scene, $width = 480);

```