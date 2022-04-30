@extends('adminlte::page')

@section('title', __('Usuario'))

@section('content_header')

  <div class="row">
    <div class="col-auto">

      <h1 class="m-0 text-dark">{{ __('Usuario') }}</h1>

    </div>
    @can('update', $user)
      <div class="col-auto ">
        @include('share.buttons.edit', ['routeName' => 'users.edit', 'params' => $user])
      </div>
    @endcan
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
          <div class="row">
            <div class="col-md-3 textt-center">
              <img src="{{ $user->avatar() }}" class="img-thumbnail rounded-circle" alt="Avatar">
            </div>
            <div class="col-md-9">
              <h2>{{ $user->name }}</h2>
              <h3>{{ $user->email }}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
