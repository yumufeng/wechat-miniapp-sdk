<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/25
 * Time: 17:15
 */

namespace weapp\Api;


use weapp\Tools\WeAppGateway;

class Statistic extends WeAppGateway
{
    const STATISTIC_ABOUT = 'https://api.weixin.qq.com/datacube/getweanalysisappiddailysummarytrend';
    const STATISTIC_VISIT_DAILY = 'https://api.weixin.qq.com/datacube/getweanalysisappiddailyvisittrend';
    const STATISTIC_VISIT_WEEKLY = 'https://api.weixin.qq.com/datacube/getweanalysisappidweeklyvisittrend';
    const STATISTIC_VISIT_MONTHLY = 'https://api.weixin.qq.com/datacube/getweanalysisappidmonthlyvisittrend';
    const STATISTIC_VISIT_DISTRIBUTION = 'https://api.weixin.qq.com/datacube/getweanalysisappidvisitdistribution';
    const STATISTIC_VISIT_RETAIN_DAILY = 'https://api.weixin.qq.com/datacube/getweanalysisappiddailyretaininfo';
    const STATISTIC_VISIT_RETAIN_WEEKLY = 'https://api.weixin.qq.com/datacube/getweanalysisappidweeklyretaininfo';
    const STATISTIC_VISIT_RETAIN_MONTHLY = 'https://api.weixin.qq.com/datacube/getweanalysisappidmonthlyretaininfo';
    const STATISTIC_VISIT_PAGE = 'https://api.weixin.qq.com/datacube/getweanalysisappidvisitpage';
    const STATISTIC_VISIT_USERS_FEATURE = 'https://api.weixin.qq.com/datacube/getweanalysisappiduserportrait';

    public function getAbout($date)
    {
        $url = self::STATISTIC_ABOUT;
        $param = array(
            'begin_date' => $date,
            'end_date' => $date,
        );
        return $this->sendRequestWithToken($url, $param);
    }

    public function getVisitDaily($date)
    {
        $url = self::STATISTIC_VISIT_DAILY;
        $param = array(
            'begin_date' => $date,
            'end_date' => $date,
        );
        return $this->sendRequestWithToken($url, $param);
    }

    public function getVisitWeekly($begin_date, $end_date)
    {
        $url = self::STATISTIC_VISIT_WEEKLY;
        $param = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date,
        );
        return $this->sendRequestWithToken($url, $param);
    }

    public function getVisitMonthly($begin_date, $end_date)
    {
        $url = self::STATISTIC_VISIT_MONTHLY;
        $param = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date,
        );
        return $this->sendRequestWithToken($url, $param);
    }

    public function getDistribution($date)
    {
        $url = self::STATISTIC_VISIT_DISTRIBUTION;
        $param = array(
            'begin_date' => $date,
            'end_date' => $date,
        );
        return $this->sendRequestWithToken($url, $param);
    }

    public function getRetainDaily($date)
    {
        $url = self::STATISTIC_VISIT_RETAIN_DAILY;
        $param = array(
            'begin_date' => $date,
            'end_date' => $date,
        );
        return $this->sendRequestWithToken($url, $param);
    }

    public function getRetainWeekly($begin_date, $end_date)
    {
        $url = self::STATISTIC_VISIT_RETAIN_WEEKLY;
        $param = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date,
        );
        return $this->sendRequestWithToken($url, $param);
    }

    public function getRetainMonthly($begin_date, $end_date)
    {
        $url = self::STATISTIC_VISIT_RETAIN_WEEKLY;
        $param = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date,
        );
        return $this->sendRequestWithToken($url, $param);
    }

    public function getPage($date)
    {
        $url = self::STATISTIC_VISIT_PAGE;
        $param = array(
            'begin_date' => $date,
            'end_date' => $date,
        );
        return $this->sendRequestWithToken($url, $param);
    }

    public function getUserFeature($begin_date, $end_date)
    {
        $url = self::STATISTIC_VISIT_USERS_FEATURE;
        $param = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date,
        );
        return $this->sendRequestWithToken($url, $param);
    }
}