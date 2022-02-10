<?php

namespace App\Http\Controllers\Admin\File;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;

class IndexController extends Controller
{
    public function run(Request $request)
    {
        return view('admin.files.index', [
            'items' => File
                ::sort()
                ->filter()
                ->paginate(config('view.per_page_admin')),
        ]);
    }
}
