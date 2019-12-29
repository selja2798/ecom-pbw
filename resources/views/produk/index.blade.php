@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">Produk</h3>
                <a href="{{route('produk.create')}}" class="btn btn-md btn-danger float-right ml-2">Delete All</a>
                    <a href="{{route('produk.create')}}" class="btn btn-md btn-success float-right">Create produk</a>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama Produk</th>
                                {{-- <th>Kategori</th> --}}
                                <th>Harga</th>
                                <th>Stok</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($produks as $produk)
                                    <td>{{$produk->name}}</td>
                                    <td>{{$produk->stok}}</td>
                                    <td>{{$produk->harga}}</td>
                                    <td>
                                    <a href="{{route('produk.edit', $produk->id)}}" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="{{route('produk.destroy', $produk->id)}}" class="btn btn-sm btn-secondary">Delete</a>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
