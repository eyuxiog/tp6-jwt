<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/9/28
 * Time: 16:41
 */

namespace app\api\exception;
use think\exception\Handle;
use think\Response;
use Throwable;
use app\common\lib\ResponseJson;
use app\common\lib\error\ApiErrDesc;
/**
 * Class ApiHandler
 * @package app\api\exception
 * api模块下的异常处理类
 */
class ApiHandle extends Handle
{
    use ResponseJson;
    protected $httpCode = 500;
    /**
     * Render an exception into an HTTP response.
     *
     * @access public
     * @param \think\Request   $request
     * @param Throwable $e
     * @return Response
     */
    public function render($request, Throwable $e): Response
    {
        if ($e instanceof ApiException){
            $code = $e->getCode();
            $msg = $e->getMessage();
        }else{
            $code = $e->getCode();
            if(!$code || $code < 0){
                $code = ApiErrDesc::UNKNOWN_ERR[0];
            }
            $msg = $e->getMessage() ?: ApiErrDesc::UNKNOWN_ERR[1];
        }

        // 添加自定义异常处理机制
        if (method_exists($e, 'getStatusCode')){

            $this->httpCode = $e->getStatusCode();
        }
        return $this->error($code, $msg, [], $this->httpCode);
    }

}
