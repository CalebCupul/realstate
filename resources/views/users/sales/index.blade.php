@extends('adminlte::page')

@section('title', __('Ventas'))

@section('content_header')

@stop

@section('content')

<div class="container pt-4 pb-4">
    <div class="card pt-4 pb-4">
        <div class="col-12 d-flex justify-content-center">
            <a href="{{ route('sales.create') }}" role="button" class="btn btn-primary">Nueva venta</a>
        </div>

        <div class="card-body">
            <div class="outer-div">
                @foreach ($sales as $sale)
                    <div class="house-card">
                        <div class="background-img-container">
                            <a href="{{ route('sales.show', $sale->id) }}" target="_blank"><img class="background-img" src="{{$sale->house()}}"></a>
                            <span class="price">${{ $sale->price }}</span>
                        </div>

                        
                        <div class="house-caption">
                            <small class="suburb"><span class="fas fa-map-marker-alt"></span> {{ $sale->suburb->suburb_name }}, {{ $sale->city->city_name }}.</small>
                            <p class="status">{{ $sale->status }}</p>
                        </div>

                        <div class="house-contact">
                            <div>
                                <p><strong>Agente: </strong><span>{{ $sale->user->name }}</span></p>
                                <p><strong>Publicación: </strong><span>{{ $sale->created_at->format('d M, Y') }}</span></p>
                            </div>
                            <a href="{{ route('users.show', $sale->user->id) }}" target="_blank"><img class="user-img" src="{{$sale->user->avatar()}}" alt=""></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
            
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sales.css') }}">
@stop
