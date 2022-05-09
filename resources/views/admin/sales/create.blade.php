@extends('adminlte::page')

@section('title', __('Nueva venta'))

@section('content_header')

  <div class="row">
    <div class="col-auto">
      <h1 class="m-0 text-dark">{{ __('Nueva venta') }}</h1>
    </div>
    {{-- <div class="col-auto ml-auto">
      <a class="btn btn-secondary" href="{{ route('sales.index') }}" role="button" data-toggle="tooltip"
        data-placement="top" title="Regresar"><i class="fas fa-chevron-left fa-fw"></i> Regresar</a>
    </div> --}}
  </div>
@stop

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
          {!! Form::open(['method' => 'POST', 'route' => 'sales.store', 'class' => 'form-horizontal', 'files' => true]) !!}

          @include('admin.sales.includes.form')

          @include('share.buttons.submit_cancel', ['routeName' => 'sales.index'])

          {!! Form::close() !!}
      </div>
    </div>
  </div>
@stop

