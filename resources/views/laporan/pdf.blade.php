<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Laporan Bulanan E-commerce Pak budi</h1>
    <hr>

    <div class="card card-default">
        <div class="card-body">
            @if ($orders->count() > 0)
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Consumer</th>
                            <th>Produk</th>
                            <th>Qty</th>
                            <th>Total harga</th>
                            <th>Tanggal Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->consumers->nama_konsumer}}</td>
                                <td>{{$order->produks->name}}</td>
                                <td>{{$order->qty}}</td>
                                <td>@rupiah($order->total_harga)</td>
                                <td>{{$order->updated_at->format('d-m-Y')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">
                    Belum ada order.
                </h3>
            @endif
        </div>
    </div>
</body>
</html>

