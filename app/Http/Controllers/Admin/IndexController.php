<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function run()
    {
        return view('admin.index', [

        ]);
    }
}
