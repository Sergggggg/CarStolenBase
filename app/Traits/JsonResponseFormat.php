<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

trait JsonResponseFormat
{
    /**
     * Return a success JSON response.
     *
     * @param array|string|JsonResource $data
     * @param string|null $message
     * @param int|null $code
     * @return JsonResponse
     */
    protected function success($data, string $message = '', int $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'content' => $data
        ], $code);
    }

    /**
     * Return an error JSON response.
     *
     * @param string|null $message
     * @param int $code
     * @param array|string|null $data
     * @return JsonResponse
     */
    protected function error(string $message = '', int $code = 400, $data = []): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'content' => $data
        ], $code);
    }

}
