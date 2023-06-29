@if(count(\CartUsuario::getContent()) > 0)
    @foreach(\CartUsuario::getContent() as $item)
        <li class="list-group-item">
            <div class="row">
                <div class="col-lg-3">
                    <img src="{{asset($item->attributes->image) }}"
                         style="width: 50px; height: 50px;"
                    >
                </div>
                <div class="col-lg-6">
                    <b>{{$item->name}}</b>
                    <br><small>Qty: {{$item->quantity}}</small>
                </div>
                <div class="col-lg-3">
                    @php
                        
                        $subtotal = \CartUsuario::get($item->id)->getPriceSum();
                        $subFormato = number_format($subtotal , 0, ',', '.');
                        $discount = $subtotal/100*15; // Valor del descuento 
                        $desFormato = number_format($discount , 0, ',', '.');
                        $total = $subtotal - $discount;
                        $totalFormato = number_format($total , 0, ',', '.');
                    @endphp
                    <p>Subtotal: ${{ $subFormato }}</p>
                    <p>Descuento: ${{ $desFormato }}</p>
                    <p>Total: ${{ $totalFormato }}</p>
                </div>
                <hr>
            </div>
        </li>
    @endforeach
    <br>
    <li class="list-group-item">
        <div class="row">
            <div class="col-lg-10">
                <b>Total: </b>${{ $total }}
            </div>
            <div class="col-lg-2">
                <form action="{{ route('cart.clear') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-secondary btn-sm"><i class="fa fa-trash"></i></button>
                </form>
            </div>
        </div>
    </li>
    <br>
    <div class="row" style="margin: 0px;">
        <a class="btn btn-dark btn-sm btn-block" href="{{ route('cart.index') }}">
            CARRITO <i class="fa fa-arrow-right"></i>
        </a>
        <a class="btn btn-dark btn-sm btn-block" href="">
            CHECKOUT <i class="fa fa-arrow-right"></i>
        </a>
    </div>
@else
    <li class="list-group-item">Tu carrito está vacío</li>
@endif
