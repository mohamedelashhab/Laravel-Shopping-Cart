@extends('layouts.master')

@section('title')
    <p>shopping cart</p>
@endsection

@section('content')

@section('style')
    <style>
    .thumbnail {
        position: relative;
        padding: 0px;
        margin-bottom: 20px;
    }
    .bt{
       
    }
    </style>
@endsection

@section('script')
    <script>
        setTimeout(function(){ 
            $('.msg').prop('hidden', true);
         }, 5000);
    </script>
@endsection
<div class="row">
    @if(Session::has('success'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success msg">
                {{Session::get('success')}}
            </div>
        </div>
    </div>
    @endif
    @foreach ($products as $product)
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="thumbnail">
                <img width="100" height="100" class="img-responsive" src="{{$product->imagePath}}" alt="">
                <div class="caption">
                    <h3>{{$product->title}}</h3>
                    <p class="description">
                        {{$product->description}}
                    </p>
                    <p>
                        <strong class="price">{{$product->price}}$</strong>
                        <form action="{{route('cart.add', $product)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success pull-right bt">Add to Cart</button>
                        </form>
                       
                    </p>
                </div>
            </div>
        </div>
        
    @endforeach

</div>

    


@endsection






