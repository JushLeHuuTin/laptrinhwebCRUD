@extends('dashboard')

@section('content')
    <main class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Chi tiết đơn hàng #{{ $order->id }}</h2>
            
            <!-- Thông tin đơn hàng -->
            <div class="row justify-content-center mb-5">
                <div class="col-md-8">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th colspan="2" class="text-center">Thông tin đơn hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Order ID</th>
                                <td>{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">User ID</th>
                                <td>{{ $order->user_id }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Danh sách sản phẩm -->
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h3 class="mb-3">Danh sách sản phẩm</h3>
                    @if($order->products->isNotEmpty())
                        <table class="table table-bordered table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Mô tả</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price) }} VND</td>
                                        <td>{{ $product->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning text-center" role="alert">
                            Không có sản phẩm trong đơn hàng.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

@endsection