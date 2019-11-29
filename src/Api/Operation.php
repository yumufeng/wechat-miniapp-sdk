<?php


namespace weapp\Api;


use weapp\Tools\WeAppGateway;

/**
 *
 * Class Operation
 * @package weapp\Api
 */
class Operation extends WeAppGateway
{
    protected $api = 'https://api.weixin.qq.com/wxaapi/userlog/userlog_search';

    public function realtimelogSearch(array $params)
    {
        if (!isset($params['date'])) {
            $params['date'] = date('Ymd');
        }
        if (!isset($params['begintime'])) {
            $params['begintime'] = time() - 86400;
        }
        if (!isset($params['endtime'])) {
            $params['endtime'] = time();
        }

        return $this->get($params);
    }
}