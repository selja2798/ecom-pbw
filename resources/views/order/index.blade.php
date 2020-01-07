@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="d-inline">Order</h3>
            <a href="{{route('order.index')}}" class="btn btn-sm float-right btn-light  ">Reset</a>

            <div class="dropdown show float-right" >
                <a class="btn btn-sm btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Status order
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="?status_order=3">Paid</a>
                    <a class="dropdown-item" href="?status_order=2">Unpaid</a>
                    <a class="dropdown-item" href="?status_order=1">Pending</a>
                </div>
            </div>
            <div class="dropdown show float-right" >
                <a class="btn btn-sm btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Produk
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach ($produks as $produk)
                        <a class="dropdown-item" href="?produk={{$produk->id}}">{{$produk->name}}</a>
                    @endforeach
                </div>
            </div>
            <span class="float-right mr-2">Filter:</span>
        </div>
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
                            <th>Tanggal Order</th>
                            <th>Status Order</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $index => $order)
                            <tr>
                                <td>{{ $orders->firstItem() + $index }}</td>
                                <td>{{$order->consumers->nama_konsumer}}</td>
                                <td>{{$order->produks->name}}</td>
                                <td>{{$order->qty}}</td>
                                <td>@rupiah($order->total_harga)</td>
                                <td>{{$order->created_at->format('d-m-Y')}}</td>
                                <td>
                                    <form action="{{route('order.update', $order->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-control d-inline-block" style="width: 100px" name="status_order" id="status_order">
                                            <option value="3"
                                                @if ($order->status_order == 3)
                                                    selected
                                                @endif>
                                                Paid
                                            </option>

                                            <option value="2"
                                                @if ($order->status_order == 2)
                                                    selected
                                                @endif>
                                                Unpaid
                                            </option>

                                            <option value="1"
                                                @if ($order->status_order == 1)
                                                    selected
                                                @endif>
                                                Pending
                                            </option>

                                            <option value="0"
                                                @if ($order->status_order == 0)
                                                    selected
                                                @endif>
                                                Cancel
                                            </option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-secondary">Edit</button>
                                    </form>
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$orders->links()}}
            @else
                <h3 class="text-center">
                    Belum ada order.
                </h3>
            @endif
        </div>
    </div>
@endsection
