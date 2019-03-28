<?php

namespace weapp\Tools;

use weapp\Config;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/25
 * Time: 16:18
 */
class WeAppGateway
{
    protected $api = '';
    /**
     * NEED_ACCESS_TOKEN 是否需要 accessToken，如果为true，会掉接口获取
     */
    const NEED_ACCESS_TOKEN = false;
    protected $appId;
    protected $secret;
    protected $accessToken;
    protected $config;
    /**
     * 如果为true 直接返回curl结果
     */
    const CURL_RAW = false;

    public function __construct(Config $config)
    {
        $this->appId = $config->appId;
        $this->secret = $config->secret;
        $this->config = $config;
        return $this;
    }

    public function setAccessToken($token)
    {
        $this->accessToken = $token;
    }

    /**
     * get请求
     * @param $params
     * @return bool|string
     * @throws \Exception
     */
    protected function get($params)
    {
        $url = $this->api . '?' . http_build_query($params);
        return Helpers::curl_get($url);
    }

    /**
     * post请求
     * @param $params
     * @param array $urlParams
     * @return static
     */
    protected function post($params, $urlParams = [])
    {
        if (!empty($urlParams)) {
            $url = $this->api . '?' . http_build_query($urlParams);
        } else {
            $url = $this->api;
        }
        $headers = [
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen(json_encode($params))
        ];
        if (PHP_SAPI == 'cli' && \extension_loaded('swoole')) {
            $headers = [
                'Content-Type' => 'application/json; charset=utf-8',
                'Content-Length' => strlen(json_encode($params))
            ];
        }
        return Helpers::curl_post($url, $params, $headers);
    }

    /**携带accessToken请求
     * @param $url
     * @param $param
     * @return WeAppGateway
     */
    protected function sendRequestWithToken($url, $param)
    {
        $this->api = $url;
        return $this->post($param, ['access_token' => $this->accessToken]);
    }

    /**
     * 所有通用请求
     * @param $url
     * @param $params
     * @param string $method
     * @param array $urlParams
     * @return bool|string|WeAppGateway
     * @throws \Exception
     */
    protected function query($url, $params, $method = 'get', $urlParams = [])
    {
        $this->api = $url;
        switch (strtolower($method)) {
            case 'get':
                return $this->get($params);
                break;
            case 'post':
                return $this->post($params, $urlParams);
                break;
        }

    }
}