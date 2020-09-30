<?php
use app\ExceptionHandle;
use app\Request;
use app\api\exception\ApiHandle;

// 容器Provider定义文件
return [
    'think\Request'          => Request::class,
    'think\exception\Handle' => ExceptionHandle::class,
    'think\exception\Handle' => ApiHandle::class,
];
