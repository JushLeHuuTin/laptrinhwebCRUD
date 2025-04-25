@extends('dashboard')

@section('content')
<div class="content">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách user</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>name</th>
                                    <th>Role</th>
                                    <th>Order</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                        <a href="{{ route('user.role', ['id' => $role->id]) }}">
                                            {{ $role->role_name . '-' }}
                                        </a>
                                    @endforeach
                                    </td>
                                    <td>
                                        @foreach($user->Orders as $order)
                                        <a href="{{ route('user.order', ['id' => $order->id]) }}">
                                            {{ $order->id . '-' }}
                                        </a>
                                    @endforeach
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('user.updateUser', ['id' => $user->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('user.deleteUser', ['id' => $user->id]) }}" class="btn btn-danger">Delete</a>
                                        <a href="{{ route('user.readUser', ['id' => $user->id]) }}" class="btn btn-success">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection