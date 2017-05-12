<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * 登录展示页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view("login.login");
    }

    /**
     * 获取验证码功能
     */
    public function getCaptcha()
    {
        return Captcha();
    }

    public function loginValidate(Request $request)
    {
//        $this->validate($request,
//            [
//                "login_name" => "required",
//                "pwd" => "required",
//                "code" => "required|captcha"
//            ], [
//                "required" => ":attribute 必填",
//                "captcha" => ":attribute 错误"
//            ], [
//                "login_name" => "用户名",
//                "pwd" => "密码",
//                "code" => "验证码"
//            ]
//        );
        //验证用户登录信息
        if (Auth::attempt(["login_name" => $request->input("login_name"), "password" => $request->input("pwd")])) {
            return redirect("/index");
        }
        return redirect()->back()->with("error", "用户或密码错误")->withInput();
    }
}
