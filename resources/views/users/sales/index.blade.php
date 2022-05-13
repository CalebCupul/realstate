@extends('adminlte::page')

@section('title', __('Ventas'))

@section('content_header')

@stop

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-center p-2">
    {!! Form::open(['method' => 'GET', 'route' => 'sales.searchSales', 'class' => 'form-inline']) !!}
        {!! Form::text('search', null, array('class' => 'form-control m-2', 'placeholder' => 'Buscar propiedad')) !!}
        <button type="submit" class="btn btn-primary mr-2">Buscar</button>
        <a href="{{ route('sales.create') }}" role="button" class="btn btn-primary">Nueva venta</a>
    {!! Form::close() !!}
  </div>
</div>

<div class="container pb-4">
    <div class="card pt-4 pb-4">
        <div class="card-body">
            <div class="outer-div">
                @if($sales->isNotEmpty())
                    @foreach ($sales as $sale)
                        <div class="house-card">
                            <div class="background-img-container">
                                <a href="{{ route('sales.show', $sale->id) }}" target="_blank"><img class="background-img" src="{{$sale->house()}}"></a>
                                <span class="price">${{ $sale->price }}</span>
                            </div>

                            
                            <div class="house-caption">
                                <small class="suburb"><span class="fas fa-map-marker-alt"></span> {{ $sale->suburb->suburb_name }}, {{ $sale->city->city_name }}.</small>
                                <p><small class="suburb"><span class="fas fa-dollar-sign mr-1"></span> {{ $sale->property_type }} en {{ $sale->sale_type }}.</small></p>
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
                @else
                <div class="col-12">
                    <h3>No se encontró ninguna propiedad.</h3>
                </div>
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            {{ $sales->links() }}
        </div>

    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sales.css') }}">
@stop
