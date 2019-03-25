<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/25
 * Time: 16:39
 */

namespace weapp\Api;


use weapp\Tools\WeAppGateway;

class QrCode extends WeAppGateway
{
    const NEED_ACCESS_TOKEN = true;
    protected $grant_type = 'client_credential';
    //限制二维码接口
    const LIMIT_API = 'https://api.weixin.qq.com/cgi-bin/wxaapp/createwxaqrcode';
    //不限制小程序接口
    const UNLIMIT_API = 'https://api.weixin.qq.com/wxa/getwxacodeunlimit';

    /**
     * 获取小程序码，永久的
     * @param $path
     * @param $width
     * @return resource
     * @throws \Exception
     */
    public function createWeQr($path, $scene, $width = 480)
    {
        $params = [
            'page' => $path,
            'width' => $width,
            'scene' => $scene
        ];
        return $this->sendRequestWithToken(self::UNLIMIT_API, $params);
    }

    /**
     * 获取二维码临时的
     * @param $path
     * @param int $width
     * @return mixed
     */
    public function createQr($path, $width = 480)
    {
        $params = [
            'path' => $path,
            'width' => $width
        ];
        return $this->sendRequestWithToken(self::LIMIT_API, $params);
    }

}