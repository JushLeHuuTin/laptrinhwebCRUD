<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="header">
        <div class="container">
            <nav class="mt-3">
                <ul class="d-flex justify-content-center list-unstyled border border-dark py-3">
                    <li><a class="border-end border-start border-dark px-3 text-decoration-none text-dark" href="{{ url('/exe/exe1/index') }}">Home</a></li>
                    <li><a class="border-end border-dark px-3 text-decoration-none text-dark" href="{{ url('/exe/exe2/list') }}">Danh sách user</a></li>
                    <li><a class="border-end border-dark px-3 text-decoration-none text-dark" href="{{ url('/exe/exe2/orders') }}">Danh sách đơn hàng</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Danh sách đơn hàng</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã user</th>
                                        <th>Tên user</th>
                                        <th>Mã đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->user_id }}</td>
                                            <td>{{ $order->user_name }}</td>
                                            <td>{{ $order->order_id }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer position-sticky bottom-0">
        <div class="container">
            <p class="text-center py-3 border border-dark">Copyright © 2025</p>
        </div>
    </div>
</body>
</html>