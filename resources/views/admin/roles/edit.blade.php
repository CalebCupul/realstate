@extends('adminlte::page')

@section('title', __('Editar rol'))

@section('content_header')

  <div class="row">
    <div class="col-auto">
      <h1 class="m-0 text-dark">{{ __('Editar rol') }}</h1>
    </div>
    @can('delete', $role)
      <div class="col-auto ml-auto">
        @include('share.buttons.destroy', ['routeName' => 'roles.destroy', 'params' => $role])
      </div>
    @endcan
  </div>
@stop

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

          @include('admin.roles.includes.form')

          @include('share.buttons.submit_cancel', ['routeName' => 'roles.index'])

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@stop

@section('plugins.duallistbox', true)


@section('adminlte_js')
  <script>
    $('.duallistbox').bootstrapDualListbox({
      nonSelectedListLabel: 'Disponibles',
      selectedListLabel: 'Activos',
      moveOnSelect: false,
    });
  </script>
@endsection
