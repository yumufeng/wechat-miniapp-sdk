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
     * @return TemplateMsg
     */
    public function setToUser($toUser)
    {
        $this->toUser = $toUser;
        return $this;
    }

    /**
     * @param mixed $templateId
     * @return TemplateMsg
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
        return $this;
    }

    /**
     * @param mixed $page
     * @return TemplateMsg
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @param mixed $formId
     * @return TemplateMsg
     */
    public function setFormId($formId)
    {
        $this->formId = $formId;
        return $this;
    }

    /**
     * @param mixed $postData
     * @return TemplateMsg
     */
    public function setPostData($postData)
    {
        $this->postData = $postData;
        return $this;
    }

    /**
     * @param mixed $emphasisKeyword
     * @return TemplateMsg
     */
    public function setEmphasisKeyword($emphasisKeyword)
    {
        $this->emphasisKeyword = $emphasisKeyword;
        return $this;
    }

    /**
     * @param null $color
     * @return TemplateMsg
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
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