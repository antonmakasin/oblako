<?php

namespace App\Http\Controllers\Admin\File;

use App\Http\Controllers\Controller;
use App\Services\API\V1\File\DestroyService;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function run(Request $request, $id)
    {
        DestroyService::destroy($id);

        return redirect()
            ->back()
            ->with('status', __('messages.admin_success_destroy'));
    }
}
