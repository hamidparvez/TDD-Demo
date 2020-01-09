<?php

namespace App\Http\Traits;

trait ResponseTrait
{

    /**
     *
     * Default Success Response
     *
     * @param null $data
     * @param array $message
     * @param int $status
     * @param bool $custom_code
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($data = null,$message = ['Success'],$status=200,$custom_code = false)
    {
        return response()->json([
            'status' => $custom_code ?: $status,
            'message' => $message,
            'data' => $data,
        ],$status);
    }

    /**
     *
     * Default Fail Response
     *
     * @param null $data
     * @param array $message
     * @param int $status
     * @param bool $custom_code
     * @return \Illuminate\Http\JsonResponse
     */
    public function failResponse($data = null,$message = ['Failed'],$status=500,$custom_code = false)
    {
        return response()->json([
            'status' => $custom_code ?: $status,
            'message' => $message,
            'data' => $data,
        ],$status);
    }
}
