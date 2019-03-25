<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/25
 * Time: 16:58
 */

namespace weapp\Api;


use weapp\Tools\WeAppException;
use weapp\Tools\WeAppGateway;

class CustomMsg extends WeAppGateway
{
    protected $api = 'https://api.weixin.qq.com/cgi-bin/message/custom/send';
    const NEED_ACCESS_TOKEN = true;
    const SEND_CUSTOMER_MESSAGE_MSG_TYPE_TEXT = 'text';
    const SEND_CUSTOMER_MESSAGE_MSG_TYPE_IMAGE = 'image';
    protected $toUser;
    protected $msgType;
    protected $text;
    protected $image;

    public function setOpenId($openId)
    {
        $this->toUser = $openId;
        return $this;
    }

    public function text($content)
    {
        $this->msgType = self::SEND_CUSTOMER_MESSAGE_MSG_TYPE_TEXT;
        $this->text = (object)['content' => $content];
        return $this->send();
    }

    public function image($mediaId)
    {
        $this->msgType = self::SEND_CUSTOMER_MESSAGE_MSG_TYPE_IMAGE;
        $this->image = (object)['media_id' => $mediaId];
        return $this->send();
    }

    protected function send()
    {
        if (!$this->toUser) {
            throw new WeAppException('no openid');
        }
        if (!in_array($this->msgType, [self::SEND_CUSTOMER_MESSAGE_MSG_TYPE_TEXT, self::SEND_CUSTOMER_MESSAGE_MSG_TYPE_IMAGE])) {
            throw new WeAppException('wrong msgType');
        }
        $params = [
            'touser' => $this->toUser,
            'msgtype' => $this->msgType,
        ];
        switch ($this->msgType) {
            case self::SEND_CUSTOMER_MESSAGE_MSG_TYPE_TEXT:
                $params['text'] = $this->text;
                break;
            case self::SEND_CUSTOMER_MESSAGE_MSG_TYPE_IMAGE:
                $params['image'] = $this->image;
                break;
        }
        return $this->post($params, ['access_token' => $this->accessToken]);
    }
}