<?php


namespace weapp\Api;


use weapp\Tools\WeAppGateway;

/**
 * SOTER 生物认证秘钥签名验证
 * Class Soter
 * @package weapp\Api
 */
class Soter extends WeAppGateway
{
    protected $api = 'https://api.weixin.qq.com/cgi-bin/soter/verify_signature';
    const NEED_ACCESS_TOKEN = true;

    /**
     * @link https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/soter/soter.verifySignature.html
     * @param $openid
     * @param $json_string
     * @param $json_signature
     * @return WeAppGateway
     */
    public function verifySignature($openid, $json_string, $json_signature)
    {
        $params = [
            'openid' => $openid,
            'json_string' => $json_string,
            'json_signature' => $json_signature
        ];

        return $this->sendRequestWithToken($this->api, $params);
    }
}