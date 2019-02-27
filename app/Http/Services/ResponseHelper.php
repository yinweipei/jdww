<?php

namespace App\Http\Services;

class ResponseHelper
{
    /**
     * 响应成功的数据
     * @param array|string $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($data)
    {
        $response['code'] = 200;
        $response['data'] = $data;
        return response()
            ->json($response);
    }

    /**
     * 响应失败的数据
     * @param array|string $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error($data)
    {
        $response['code'] = '-1';
        $response['error_msg'] = $data;
        return response()
            ->json($response);
    }

}