<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/25
 * Time: 17:02
 */

namespace weapp\Api;


use weapp\Tools\WeAppGateway;

/**
 * 订阅消息
 * Class TemplateMsg
 * @package weapp\Api
 */
class SubscribeMsg extends WeAppGateway
{
    protected $api = 'https://api.weixin.qq.com/cgi-bin/message/subscribe/send';
    const NEED_ACCESS_TOKEN = true;
    private $toUser;
    private $templateId;
    private $page;
    private $postData;

    /**
     * @param mixed $toUser
     * @return SubscribeMsg
     */
    public function setToUser($toUser)
    {
        $this->toUser = $toUser;
        return $this;
    }

    /**
     * @param mixed $templateId
     * @return SubscribeMsg
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
        return $this;
    }

    /**
     * @param mixed $page
     * @return SubscribeMsg
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @param mixed $postData
     * @return SubscribeMsg
     */
    public function setPostData($postData)
    {
        $this->postData = $postData;
        return $this;
    }


    /**
     * 执行发送请求
     * @return SubscribeMsg
     */
    public function send()
    {
        $param = array(
            'touser' => $this->toUser,
            'template_id' => $this->templateId,
            'page' => $this->page,
            'data' => $this->postData,
        );
        return $this->sendRequestWithToken($this->api, $param);
    }


}