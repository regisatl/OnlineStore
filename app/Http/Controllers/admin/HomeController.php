<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
      //
      public function index()
      {
            // $admin = Auth::guard("admin")->user();
            // return redirect()->route("admin.dashboard")->with("success", $admin);
            return view("admin.dashboard");
      }

      public function logout()
      {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')->with('success', 'Vous êtes déconnecté');
      }
}
