<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/25
 * Time: 17:02
 */

namespace weapp\Api;


use weapp\Tools\WeAppGateway;

class TemplateMsg extends WeAppGateway
{
    protected $api = 'https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send';
    const NEED_ACCESS_TOKEN = true;
    protected $toUser;
    protected $templateId;
    protected $page = null;
    protected $formId;
    protected $postData;
    protected $emphasisKeyword = null;
    protected $color = null;

    /**
     * @param mixed $toUser
     */
    public function setToUser($toUser): void
    {
        $this->toUser = $toUser;
        return $this;
    }

    /**
     * @param mixed $templateId
     */
    public function setTemplateId($templateId): void
    {
        $this->templateId = $templateId;
        return $this;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page): void
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @param mixed $formId
     */
    public function setFormId($formId): void
    {
        $this->formId = $formId;
        return $this;
    }

    /**
     * @param mixed $postData
     */
    public function setPostData($postData): void
    {
        $this->postData = $postData;
        return $this;
    }

    /**
     * @param mixed $emphasisKeyword
     */
    public function setEmphasisKeyword($emphasisKeyword): void
    {
        $this->emphasisKeyword = $emphasisKeyword;
        return $this;
    }

    /**
     * @param null $color
     */
    public function setColor($color): void
    {
        $this->color = $color;
    }

    /**
     * 执行发送请求
     * @return TemplateMsg
     */
    public function send()
    {
        $param = array(
            'touser' => $this->toUser,
            'template_id' => $this->templateId,
            'page' => $this->page,
            'form_id' => $this->formId,
            'data' => $this->postData,
            'color' => $this->color,
            'emphasis_keyword' => $this->emphasisKeyword,
        );

        return $this->post($param, ['access_token' => $this->accessToken]);
    }


}