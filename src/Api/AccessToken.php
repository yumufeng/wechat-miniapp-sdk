<?php
/**
 * 获取accessToken
 * Date: 2019/3/25
 * Time: 16:23
 */


namespace weapp\Api;


use weapp\Tools\WeAppGateway;

class AccessToken extends WeAppGateway
{
    protected $api = 'https://api.weixin.qq.com/cgi-bin/token';
    protected $grant_type = 'client_credential';

    public $expiresIn = 7100;

    public $accessToken;

    public function getToken()
    {
        $params = [
            'grant_type' => $this->grant_type,
            'appid' => $this->appId,
            'secret' => $this->secret,
        ];
        $this->accessToken = $this->get($params);
        return $this;
    }
}