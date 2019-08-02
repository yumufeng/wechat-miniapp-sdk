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

    /**
     * @var \Redis
     */
    protected $redisClient;

    const ACCESS_TOKEN_REDIS_KEY = 'weapp_access_token';

    public function __construct($config = null)
    {
        if (empty($config)) {
            $config = \config('sdk.weapp');
        }
        if (isset($config['ak'])) {
            $this->appId = $config['ak'];
        }
        if (isset($config['sk'])) {
            $this->secret = $config['sk'];
        }
        if (isset($config['redis'])) {
            $this->redisClient = $config['redis'];
        }
    }

    /**
     * 覆盖这个方法写取token的实现 ，比如redis，数据库
     * @return $token
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getAccessToken()
    {
        $token = $this->redisClient->get(self::ACCESS_TOKEN_REDIS_KEY);
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
     */
    public function setAccessToken($token, $expires = 0)
    {
        $setData = $this->redisClient->set(self::ACCESS_TOKEN_REDIS_KEY, $token, $expires);
        return $setData;
    }
}