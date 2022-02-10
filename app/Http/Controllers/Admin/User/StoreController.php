<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Admin\User\StoreRequest;
use App\Models\User;

class StoreController extends Controller
{
    public function run(StoreRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect()
            ->route('admin.users.index')
            ->with('status', __('messages.admin_success_store'));
    }
}
