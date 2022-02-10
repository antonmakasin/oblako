<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
    public function run($id)
    {
        return view('admin.users.edit', [
            'item' => User::findOrFail($id),
        ]);
    }
}
