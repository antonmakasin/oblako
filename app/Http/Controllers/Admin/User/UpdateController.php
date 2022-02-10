<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UpdateController extends Controller
{
    public function run(UpdateRequest $request, $id)
    {
        $item = User::findOrFail($id);
        $data = $request->all();
        $password_message = '';

        if (!empty($data['password']))
        {
            $data['password'] = bcrypt($data['password']);
            $password_message = '. ' . __('messages.admin_password_update');
        }
        else
        {
            unset($data['password']);
        }

        $item->update($data);

        return redirect()
            ->route('admin.users.edit', $id)
            ->with('status', __('messages.admin_success_update') . $password_message);
    }
}
