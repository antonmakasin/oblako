<?php

namespace App\Http\Controllers\API\V1\File;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\File\StoreRequest;
use App\Services\API\V1\File\StoreService;
use Illuminate\Http\JsonResponse;

/**
 * Class StoreController
 *
 * @package App\Http\Controllers\API\V1\File\StoreController
 */
class StoreController extends Controller
{
    /**
     * @param StoreRequest $request
     *
     * @return JsonResponse
     */
    public function __invoke(StoreRequest $request) : JsonResponse
    {
        return $this->responseWithData([
            'path' => StoreService::store($request),
        ]);
    }
}
