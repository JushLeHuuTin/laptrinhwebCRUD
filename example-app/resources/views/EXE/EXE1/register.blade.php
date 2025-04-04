@extends('dashboard')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Đăng ký</h5>
                            <form action="{{ route('user.postUser') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" require autofocus>
                                    @if ($errors->has('username'))
                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="name" class="form-label">phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" require autofocus>
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">address</label>
                                    <input type="text" class="form-control" id="address" name="address" require autofocus>
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div> -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input type="password" class="form-control" id="password" name="password" require autofocus>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="confirm-password" class="form-label">Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control" id="confirm-password" name="confirm-password" require autofocus>
                                    @if ($errors->has('confirm-password'))
                                        <span class="text-danger">{{ $errors->first('confirm-password') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email_address" name="email" require autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3 d-flex justify-content-end gap-3">
                                    <a href="{{ url('/exe/exe1/login') }}" class="btn btn-secondary">Đã có tài khoản</a>
                                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection