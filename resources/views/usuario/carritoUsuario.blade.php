<!DOCTYPE html>
<html lang="en" data-theme="cmyk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
@extends('layoutsUsuario.app')
@section('content')
    <div class="container" style="margin-top: 80px">
        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors0>all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <br>
                @if(\CartUsuario::getTotalQuantity()>0)
                    <h4>{{ \CartUsuario::getTotalQuantity()}} Producto(s) en el carrito</h4><br>
                @else
                    <h4>No Product(s) In Your Cart</h4><br>
                    <a href="/" class="btn btn-dark">Continue en la tienda</a>
                @endif

                @foreach($cartCollection as $item)
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="{{ asset($item->attributes->image) }}" class="img-thumbnail" width="200" height="200">
                        </div>
                        <div class="col-lg-5">
                            <p>
                                @php
                                $subtotal =\Cart::get($item->id)->getPriceSum();
                                $subFormato = number_format($subtotal , 0, ',', '.');
                                $precio = $item->price ;
                                $precioFormato = number_format($precio , 0, ',', '.');
                                @endphp
                                <b><a href="/carrito/{{ $item->attributes->slug }}">{{ $item->name }}</a></b><br>
                                <b>Price: </b>${{ $precioFormato }}<br>
                                <b>Sub Total: </b>${{ $subFormato }}<br>
                                {{--                                <b>With Discount: </b>${{ \Cart::get($item->id)->getPriceSumWithConditions() }}--}}
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                        <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}"
                                               id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                        <button class="btn btn-secondary btn-sm" style="margin-right: 25px;"><i class="fa fa-edit"></i></button>
                                    </div>
                                </form>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                    <button class="btn btn-dark btn-sm" style="margin-right: 10px;"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                @if(count($cartCollection)>0)
                    <form action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                        <a href="{{route('shop')}}"><button class="btn btn-secondary btn-md">Borrar Carrito</button> </a>
                    </form>
                @endif
            </div>
            @if(count($cartCollection)>0)
                <div class="col-lg-5">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Total: </b>${{ \CartUsuario::getTotal() }}</li>
                            @php
                            $subtotal = \CartUsuario::get($item->id)->getPriceSum();
                            $subFormato = number_format($subtotal , 0, ',', '.');
                            $discount = $subtotal/100*15; // Valor del descuento 
                            $desFormato = number_format($discount , 0, ',', '.');
                            $total = $subtotal - $discount;
                            $totalFormato = number_format($total , 0, ',', '.');
                            @endphp
                            <li class="list-group-item"><b>Descuento: </b>${{ $desFormato }}</li>
                            <li class="list-group-item"><b>Total con descuento: </b>${{ $totalFormato }}</li>
                        </ul>
                    </div>
                    <br><a href="/" class="btn btn-dark">Continue en la tienda</a>
                    <a href="{{$url_to_pay}}" class="btn btn-success">Proceder al Checkout</a>
                </div>
            @endif
        </div>
        <br><br>
    </div>
@endsection
</body>
</html>