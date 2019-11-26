<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/19
 * Time: 10:32
 */
error_reporting(E_ALL);

class  swooleDemo
{
    public function __construct()
    {
        $http = new \swoole_http_server("0.0.0.0", 10000);
        $http->set(array(
            'worker_num' => 2,
            'dispatch_mode' => 2,
            'reload_async' => true,
            'max_wait_time' => 50,
            'daemonize' => 0,
            'max_request' => 10000
        ));
        $http->on('Start', [$this, 'onStart']);
        $http->on("request", [$this, 'onRequest']);
        $http->start();
    }

    public function onStart(\swoole_server $server)
    {
        echo "swoole is start 0.0.0.0:10000" . PHP_EOL;
    }

    public function onRequest(\swoole_http_request $request, \swoole_http_response $response)
    {
        require './vendor/autoload.php';
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);
        $config = [
            'ak' => 'wx8e42c11111ca229c',
            'sk' => '',
            'redis' => $redis
        ];
        $pdd = new \weapp\WeAppFatory($config);
        $info = $pdd->qrCode->createWeQr(
            '/pages/index/index',
            '11001'
        );
        $response->end(json_encode($info));
    }

}

new swooleDemo();
