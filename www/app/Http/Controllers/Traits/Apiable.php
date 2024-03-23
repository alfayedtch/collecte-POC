<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

trait Apiable
{
    /**
     * Return the failure response (success: false) with $datas variables and defined HTTP code
     * @param int $httpCode
     * @param array $additionalDatas
     * @return JsonResponse
     */
    protected function failureJsonResponse(int $httpCode = Response::HTTP_BAD_REQUEST,
                                       array $additionalDatas = null): JsonResponse
    {
        $datas = ['success' => false];
        if ($additionalDatas != null) {
            $datas = array_merge($datas, $additionalDatas);
        }
        return response()->json($datas, $httpCode);
    }

    /**
     * Return the success (success: true) response with $additionalDatas variables and defined HTTP code
     * @param int $httpCode
     * @param array or Illuminate\Support\Collection $additionalDatas (or null)
     * @return JsonResponse
     */
    protected function successJsonResponse(int $httpCode = Response::HTTP_OK,
                                           $additionalDatas = null): JsonResponse
    {
        $datas = ['success' => true];
        if ($additionalDatas != null) {
            if ($additionalDatas instanceof Collection) {
                $additionalDatas = $additionalDatas->all();
            }
            $datas = array_merge($datas, $additionalDatas);
        }
        return response()->json($datas, $httpCode);
    }
}
