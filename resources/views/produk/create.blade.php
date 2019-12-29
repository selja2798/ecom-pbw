@extends('layouts.app')


@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="d-inline-block">Buat Produk</h3>
        </div>
        <div class="card-body">
            @include('partials.error')
            <form action="{{route('produk.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" id="stok" name="stok" class="form-control">
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" id="harga" name="harga" class="form-control">
                </div>

                <button type="submit" class="btn btn-md btn-success">Buat Produk</button>

                {{-- <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" name="kategori" class="form-control">
                </div> --}}

            </form>
        </div>
    </div>
@endsection

