<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/9/30
 * Time: 15:04
 */

namespace app\api\controller\v2;

use app\api\base\Base;
use app\api\exception\ApiException;
use app\common\lib\auth\JwtAuth;
use app\common\lib\error\ApiErrDesc;
use app\common\lib\ResponseJson;

class Test extends Base
{
    use ResponseJson;
    public function index(){

        // 获取jwtAuth的句柄
        $jwtAuth = JwtAuth::getInstance();
        $token = $jwtAuth->setUid(1)->encode()->getToken();
//        dump($token);
        return $this->success(['token' => $token]);
    }

    public function info()
    {
        $jwtAuth = JwtAuth::getInstance();
        echo $jwtAuth->getUid();
        echo 4;
    }
}
