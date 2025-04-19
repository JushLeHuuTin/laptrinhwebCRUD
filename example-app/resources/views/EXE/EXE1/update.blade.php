@extends('dashboard')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cập nhật thông tin</h5>
                            <form action="{{ route('user.postUpdateUser') }}" method="POST">
                                @csrf
                                <input name="id" type="hidden" value="{{$user->id}}">
                                <div class="mb-3">
                                    <label for="name" class="form-label">name</label>
                                    <input placeholder="name" type="text" class="form-control" id="name" name="name" value="{{$user->name}}" require autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input placeholder="xxx" type="password" class="form-control" id="password" name="password" require autofocus>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="confirm-password" class="form-label">Nhập lại mật khẩu</label>
                                    <input placeholder="xxx" type="password" class="form-control" id="confirm-password" name="confirm-password" require autofocus>
                                    @if ($errors->has('confirm-password'))
                                        <span class="text-danger">{{ $errors->first('confirm-password') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input placeholder="john.doe@example.com" type="text" class="form-control" id="email-address" name="email" value="{{$user->email}}" require autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3 d-flex justify-content-end gap-3">
                                    <a href="{{ route('user.list') }}" class="btn btn-secondary">Hủy bỏ</a>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection