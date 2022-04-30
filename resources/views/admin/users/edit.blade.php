@extends('adminlte::page')

@section('title', __('Editar usuario'))

@section('content_header')

  <div class="row">
    <div class="col-auto">
      <h1 class="m-0 text-dark">{{ __('Editar usuario') }}</h1>
    </div>
    @can('delete', $user)
      <div class="col-auto ml-auto">
        @include('share.buttons.destroy', ['routeName' => 'users.destroy', 'params' => $user])
      </div>
    @endcan
  </div>
@stop

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true]) !!}

          @include('admin.users.includes.form')

          @include('share.buttons.submit_cancel', ['routeName' => 'users.index'])

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@stop
