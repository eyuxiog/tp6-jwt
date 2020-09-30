<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/9/28
 * Time: 16:30
 */

namespace app\common\lib;
use app\common\lib\error\ApiErrDesc;

Trait ResponseJson
{
    /**
     * @param null $data
     * @param int $httpCode
     * @return \think\response\Json
     */
    public function success($data = [], $httpCode = 200){

        $code = ApiErrDesc::SUCCESS[0];
        $msg = ApiErrDesc::SUCCESS[1];

        return $this->jsonResponse($code, $msg, $data, $httpCode);
    }

    /**
     * @param $status
     * @param $message
     * @param null $data
     * @param int $httpCode
     * @return \think\response\Json
     */
    public function error($code, $msg, $data = [], $httpCode = 500){

        return $this->jsonResponse($code, $msg, $data, $httpCode);
    }

    /**
     * @param $status
     * @param $message
     * @param $data
     * @param int $httpCode
     * @return \think\response\Json
     */
    private function jsonResponse($code, $msg, $data, $httpCode = 200){

        $result = [
            'code' => $code, // 业务状态码
            'msg' => $msg,
            'data' => $data
        ];

        return json($result, $httpCode);
    }
}