<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/25
 * Time: 16:11
 */

namespace weapp;

use weapp\Api\AccessToken;
use weapp\Api\CustomMsg;
use weapp\Api\QrCode;
use weapp\Api\SessionKey;
use weapp\Api\Statistic;
use weapp\Api\TemplateMsg;

/**
 * Class WeAppFatory
 * @package weapp
 * @property AccessToken $accessToken;
 * @property CustomMsg $customMsg;
 * @property QrCode $qrCode;
 * @property SessionKey $sessionKey;
 * @property Statistic $statistic;
 * @property TemplateMsg $templateMsg;
 */
class WeAppFatory
{
    protected $config;

    public function __construct($config = null)
    {
        if ($config == null || is_array($config)) {
            $this->config = new Config($config);
        }
        if ($config instanceof Config) {
            $this->config = $config;
        }
        if (empty($this->config)) {
            throw new \Exception('no config');
        }
        return $this;
    }

    public function __get($api)
    {
        $classname = __NAMESPACE__ . "\\Api\\" . ucfirst($api);
        if (!class_exists($classname)) {
            throw new \Exception('api undefined');
            return false;
        }
        $new = new $classname($this->config);
        if ($new::NEED_ACCESS_TOKEN == true) {
            $new->setAccessToken($this->getToken());
        }
        return $new;
    }

    protected function getToken()
    {
        $getAccessToken = $this->config->getAccessToken();
        if (empty($getAccessToken)) {
            $token = $this->accessToken->getToken();
            $this->config->setAccessToken($token->accessToken, $token->expiresIn);
        }
        return $this->config->getAccessToken();
    }
}