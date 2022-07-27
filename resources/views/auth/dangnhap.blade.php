@extends('layouts.auth')

@section('content')
    <div class="account-page">
        <div class="account-center">
            <div class="account-box">
                <form action="{{ route('admin.danhnhap') }}" method="POST" class="form-signin">
                    @csrf
                    <h2 class="text-uppercase text-center my-4">Đăng nhập quản trị</h2>
                    @if(session()->has('error'))
                        <p class="alert alert-danger"> {{ session()->get('error') }}</p>
                    @endif
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" value="admin@pagebuilder.local" type="email" autofocus="" class="form-control" placeholder="Nhập vào email">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input name="password" value="Pass@123" type="password" class="form-control" placeholder="Nhập vào mật khẩu">
                    </div>
                    <div class="form-group text-right">
                        <a href="#">Quên mật khẩu?</a>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary account-btn">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
