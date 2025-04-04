@extends('dashboard')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Thông tin user</h5>
                            <form action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Username:</p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control border-0 bg-white"  value="{{$messi->username}}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Email:</p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control border-0 bg-white"  value="{{$messi->email}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('user.updateUser', ['id' => $messi->id]) }} "class="btn btn-primary float-end">Chỉnh sửa</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection