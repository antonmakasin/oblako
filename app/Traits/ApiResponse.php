<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

/**
 * Trait ApiResponse
 *
 * @package App\Traits
 */
trait ApiResponse
{
    /**
     * @param array $data
     *
     * @return JsonResponse
     */
    protected function responseWithData(array $data = []): JsonResponse
    {
        return response()->json($data);
    }
}
