@extends('layouts.master')
@section('title')
    cart
@endsection

@section('style')
    
@endsection

@section('script')
    <script>

        (function(){
            $('.js-remove').on('click', function(){
                var id = $(this).data('id');
                var num = $('#num'+''+id).attr('value');
                console.log($('#num'+''+id));
                var formData = {'id': id, 'num':num}
                $.ajax({
                    url:"http://127.0.0.1:8000/cart/delete?" + $.param({
                        'id': id, 'num':num
                    }),
                    success: function(d) {
                        alert(d);
                    }
                });
            });
        }())
    
    </script>

@endsection


@section('content')
    

    <div class="jumbotron">
        <h1 class="display-3">Shopping Cart</h1>
        @if ($cart)
            
        
            <div class="row">
                
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <h3>product</h3>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <h3>#</h3>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <h3>Total Price</h3>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <h3>Action</h3>
                </div>  
                

                @foreach ($cart->items as $item)  
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <h3>{{$item['item']['title']}}</h3>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <h3>{{$item['qty']}}</h3>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <h3>{{$item['price']}}</h3>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <div>
                            <input class="form-control-sm"  id="num-{{$item['item']['id']}}" onKeyDown="return false" type="number" value="{{$item['qty']}}" data-decimals="4" min="1" max="{{$item['qty']}}" "/>
                            <button id="remove" data-id="{{$item['item']['id']}}" class="btn btn-success btn-xs js-remove">Remove</button>
                        </div>
                    </div>  
                @endforeach
                

            </div>
            <a href="/checkout"><button class="btn btn-success">Checkout</button></a>
        @else
            <div><p>Cart is empty</p></div>

        @endif

        
    </div>

@endsection