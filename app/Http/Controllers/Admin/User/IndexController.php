<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller
{
    public function run(Request $request)
    {
        return view('admin.users.index', [
            'items' => User
                ::sort()
                ->filter()
                ->paginate(config('view.per_page_admin')),
        ]);
    }
}
