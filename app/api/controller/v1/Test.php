<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/9/28
 * Time: 16:32
 */

namespace app\api\controller\v1;
use app\api\exception\ApiException;
use app\BaseController;
use app\common\lib\auth\JwtAuth;
use app\common\lib\error\ApiErrDesc;
use app\common\lib\ResponseJson;

class Test extends BaseController
{
    use ResponseJson;
    public function index(){

        // 获取jwtAuth的句柄
        $jwtAuth = JwtAuth::getInstance();
        $token = $jwtAuth->setUid(1)->encode()->getToken();
        echo 1;
        return $this->success(['token' => $token]);
    }

    public function info()
    {
        throw new ApiException(ApiErrDesc::UNKNOWN_USER);
    }
}
