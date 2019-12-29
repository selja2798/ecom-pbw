@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Order list</h3>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama Konsumer</th>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Status Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
