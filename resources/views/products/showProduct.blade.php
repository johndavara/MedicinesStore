@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @if($criteria == 'all')
      <a class="btn btn-primary" href="/home">Atrás</a>
    @else
      <a class="btn btn-primary" href="/directSearch/{{$criteria}}/directSearch">Atrás</a>
    @endif
       
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h1>{{$product->name}}</h1>
                <div>
                    <img src="/images/products/{{$product->photo}}" alt="Medicine Image" style="width:25rem;height:15rem;"/>
                </div>        
                <hr/>    
                <p>{{$product->description}}</p>
                <p>{{$product->price}}</p>
            </div>
        </div>
    </div>
</div>
@endsection