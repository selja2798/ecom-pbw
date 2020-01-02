<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title></title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <script>
            (function titleScroller(text) {
                document.title = text;
                setTimeout(function () {
                    titleScroller(text.substr(1) + text.substr(0, 1));
                }, 500);
            }("|E-commerce Pak Budi"));
        </script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            .full-height {
                height: 10vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        </style>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Admin</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div class="py-4">
            <div class="container">
                <br>
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-5">
                       <div class="card card-default">
                           <div class="card-header">
                            <h1 class="text-center">E-commerce Pak Budi</h1>
                           </div>
                           <div class="card-body">
                            <form action="{{route('order.store')}}" method="POST">
                                @csrf
                                @include('partials.error')
                                {{-- <div class="form-group">
                                    <label for="produk">Pilih Produk</label>
                                    <select class="form-control" name="produk" id="produk">
                                        @foreach ($produks as $produk)
                                            <option value="{{$produk->id}}">
                                                {{$produk->name}} - {{$produk->harga}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label for="consumer">Pilih Consumer</label>
                                    <select class="form-control" name="consumer" id="consumer">
                                        @foreach ($consumers as $consumer)
                                            <option value="{{$consumer->id}}">
                                                {{$consumer->nama_konsumer}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="qty" class="sr-only">Qty</label>
                                    <div  class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Qty</div>
                                        </div>
                                        <input type="number" name="qty" class="form-control col-md-2">
                                </div>

                                @if (session()->has('success'))
                                    <div class="alert alert-success notif">
                                        {{session()->get('success')}}
                                        <button class="btn btn-light btn-sm float-right notif">X</button>
                                    </div>
                                @endif

                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-primary mt-2"  value="Proses">
                                </div>
                            </form>

                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
