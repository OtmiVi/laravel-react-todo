<?php

namespace App\Helpers;

use ArrayAccess;
use Throwable;
use Illuminate\Http\JsonResponse;

class ResponseProvider
{
    public static function getErrorResponse(Throwable $e): JsonResponse
    {
        return response()->json(
            [
                'success' => false,
                'message' => $e->getMessage(),
            ]
        );
    }

    public static function getSuccessResponse(ArrayAccess $item): JsonResponse
    {
        return response()->json(
            [
                'success' => true,
                'result' => $item,
            ]
        );
    }

    public static function getBoolResponse(bool $response): JsonResponse
    {
        return response()->json(
            [
                'success' => true,
                'result' => $response,
            ]
        );
    }

    public static function getNullResponse(): JsonResponse
    {
        return response()->json(
            [
                'success' => true,
                'result' => null,
            ]
        );
    }

}