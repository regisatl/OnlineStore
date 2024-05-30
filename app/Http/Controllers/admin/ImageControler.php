<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageControler extends Controller
{
    //
    public function upload(Request $request) {
            $file = $request->file("file");
    }
}
