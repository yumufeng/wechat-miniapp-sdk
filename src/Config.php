<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/25
 * Time: 16:13
 */

namespace weapp;


class Config
{
    public $appId;
    public $secret;
    public $accessToken;
    const ACCESS_TOKEN_REDIS_KEY = 'weapp_access_token';

    public function __construct($config = null)
    {
        if (empty($config)) {
            $config = \config('weapp');
        }
        if (isset($config['ak'])) {
            $this->appId = $config['ak'];
        }
        if (isset($config['sk'])) {
            $this->secret = $config['sk'];
        }
    }

    /**
     * 覆盖这个方法写取token的实现 ，比如redis，数据库
     * @return $token
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getAccessToken()
    {
        $token = \cache()->get(self::ACCESS_TOKEN_REDIS_KEY);
        if (empty($token)) {
            return null;
        }
        return $token;
    }

    /**
     * 覆盖这个方法 存token，默认写临时文件
     * @param $token
     * @param int $expires
     * @return int
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function setAccessToken($token, $expires = 0)
    {
        $setData = \cache()->set(self::ACCESS_TOKEN_REDIS_KEY, $token, $expires);
        return $setData;
    }
}