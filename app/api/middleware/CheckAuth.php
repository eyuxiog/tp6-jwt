<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/9/28
 * Time: 16:39
 */

namespace app\api\middleware;

use app\api\exception\ApiException;
use app\common\lib\auth\JwtAuth;
use app\common\lib\error\ApiErrDesc;
use app\common\lib\ResponseJson;

/**
 * Class CheckAuth
 * @package app\api\middleware
 * 中间件
 */
class CheckAuth
{
    /**
     * @param $request
     * @param \Closure $next
     */
    public function handle($request, \Closure $next)
    {
        $token = $request->param('token');
        if ($token){

            // 校验
            $jwtAuth = JwtAuth::getInstance();
            $jwtAuth->setToken($token);
            if ($jwtAuth->validate() && $jwtAuth->verify()){
                return $next($request);
            }else{
                throw new ApiException(ApiErrDesc::ERR_LOGIN);
            }
        }else{
            throw new ApiException(ApiErrDesc::ERR_PARAMS);
        }

    }
}
