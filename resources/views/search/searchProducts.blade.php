@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <a class="btn btn-primary" href="/home">Atrás</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4>Resultados de: {{$criteria}}</h4>
            
        </div>
    </div>
</div>
@endsection