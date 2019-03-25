<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/25
 * Time: 16:54
 */

namespace weapp\Api;


use weapp\Tools\WeAppGateway;

class SessionKey extends WeAppGateway
{
    protected $api = 'https://api.weixin.qq.com/sns/jscode2session';
    protected $grantType = 'authorization_code';

    /**
     * 获取session会话
     * @param $code
     * @return $this
     * @throws \Exception
     */
    public function getSession($code)
    {
        $params = [
            'appid' => $this->appId,
            'secret' => $this->secret,
            'js_code' => $code,
            'grant_type' => $this->grantType,
        ];
        return $this->post($params);
    }
}