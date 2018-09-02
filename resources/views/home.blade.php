@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.search')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Product List</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <template>
                    <products></products>
                    </template>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
