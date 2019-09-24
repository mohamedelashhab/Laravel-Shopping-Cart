@extends('layouts.master')

@section('title')
    <p>shopping cart</p>
@endsection

@section('content')




<div class="row">
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
                        <a href="#" class="btn btn-success pull-right">Add to Cart</a>
                    </p>
                </div>
            </div>
        </div>
        
    @endforeach

</div>

    


@endsection






