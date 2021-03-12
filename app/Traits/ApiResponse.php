<?php

namespace App\Traits;

trait  ApiResponse
{
    /**
     * Undocumented function
     *
     * @param Array $data
     * @param integer $code
     * @param string $msg
     * @return void
     */
    public function successResponse($data, $code = 200, $msg = '')
    {
        return response()->json(array('data' => $data, 'code' => $code, 'msg' => $msg), $code);
    }

    /**
     * Undocumented function
     *
     * @param Array $data
     * @param integer $code
     * @param string $msg
     * @return void
     */
    public function errorResponse($data, $code = 500, $msg = '')
    {
        return response()->json(array('data' => $data, 'code' => $code, 'msg' => $msg), $code);
    }
}