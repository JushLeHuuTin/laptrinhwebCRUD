@extends('dashboard')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Đăng nhập</h5>
                            <form  method="POST" action="{{ route('user.authUser') }}">
                            @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" placeholder="username" id="username" class="form-control" name="username" required
                                    autofocus>
                                    @if ($errors->has('username'))
                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input type="password" placeholder="mật khẩu" class="form-control" id="password" name="password" required
                                    autofocus>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="remember" class="form-label">Ghi nhớ đăng nhập</label>
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">

                                </div>
                                <div class="mb-3 d-flex justify-content-end gap-3">
                                    <button type="" class="btn ">Quên mật khẩu</button>
                                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    @endsection
