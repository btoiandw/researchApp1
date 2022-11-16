<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|password'
        ]);
        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            $role = Auth::user()->role;

            if ($role == '1') {
                return view('admin');
            } elseif ($role == '2') {
                return view('director');
            } else {
                return view('home');
            }
        }
    }
}
