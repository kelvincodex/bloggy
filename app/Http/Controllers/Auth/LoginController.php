<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }
    
    public function index() {
        return view('Auth.login');
    }

    public function store(Request $request) {

        $this->validate($request, [
            "email"=>"required|email",
            "password"=>"required",
        ]);

        $login = auth()->attempt($request->only("email","password"), $request->remember);
        if ($login == false) {
            return back()->with('status', 'Invald credential');
        }
        return redirect()->route('dashboard');
    }
}
