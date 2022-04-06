<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\API\LoginController as DefaultLoginController;
class CustomerlgController extends DefaultLoginController
{
    protected $redirectTo = '/customer/home';
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }
    public function showLoginForm()
    {
        return view('dashboard.customer.logins');
    }
    public function username()
    {
        return 'email_id';
    }
    protected function guard()
    {
        return Auth::guard('customer');
    }
}