<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DangNhapRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DangNhapController extends Controller
{
    public function formDangNhap()
    {
        return view('auth.dangnhap');
    }
    public function dangnhap(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if(!Auth::attempt($credentials)) {
            return redirect()->back()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng');
        }
        return redirect('/admin/trang-chu');
    }
}
