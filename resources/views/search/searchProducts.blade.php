@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <a class="btn btn-primary" href="/home">Atrás</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4>Resultados de: {{$products->count()}}</h4>
            
        </div>
    </div>
    <div class="container">
        <div class="row">
        @foreach ($products as $product)
            <div class="col-sm-3"> 
            <div class="card">
            <a>
                <img class="card-img-top" src="/images/products/{{$product->photo}}" alt="Card image cap">
            </a>
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">{{$product->description}}</p>
                <p class="card-text">{{$product->price}}</p>
                <a href="#" class="btn btn-primary">Add to cart</a>
            </div>
            </div>
        </div>
            @endforeach
        </div>
    </div>
</div>
@endsection