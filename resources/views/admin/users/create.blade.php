@extends('adminlte::page')

@section('title', __('Nuevo usuario'))

@section('content_header')

  <div class="row">
    <div class="col-auto">
      <h1 class="m-0 text-dark">{{ __('Nuevo usuario') }}</h1>
    </div>
    {{-- <div class="col-auto ml-auto">
      <a class="btn btn-secondary" href="{{ route('users.index') }}" role="button" data-toggle="tooltip"
        data-placement="top" title="Regresar"><i class="fas fa-chevron-left fa-fw"></i> Regresar</a>
    </div> --}}
  </div>
@stop

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          {!! Form::open(['method' => 'POST', 'route' => 'users.store', 'class' => 'form-horizontal', 'files' => true]) !!}

          @include('admin.users.includes.form')

          @include('share.buttons.submit_cancel', ['routeName' => 'users.index'])

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
