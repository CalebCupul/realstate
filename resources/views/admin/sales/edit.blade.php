@extends('adminlte::page')

@section('title', __('Editar venta'))

@section('content_header')

  <div class="row">
    <div class="col-auto">
      <h1 class="m-0 text-dark">{{ __('Editar venta') }}</h1>
    </div>
    @can('delete', $sale)
      <div class="col-auto ml-auto">
        @include('share.buttons.destroy', ['routeName' => 'sales.destroy', 'params' => $sale])
      </div>
    @endcan
  </div>
@stop

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          {!! Form::model($sale, ['route' => ['sales.update', $sale], 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true]) !!}

          @include('admin.sales.includes.form')

          @include('share.buttons.submit_cancel', ['routeName' => 'sales.index'])

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@stop
