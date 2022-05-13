@extends('adminlte::page')

@section('title', __('Usuario'))

@section('content_header')

  <div class="row">
    <div class="col-auto">

      <h1 class="m-0 text-dark">{{ __('Usuario') }}</h1>

    </div>
    @can('edit', $user)
      <div class="col-auto ">
        @include('share.buttons.edit', ['routeName' => 'users.edit', 'params' => $user])
      </div>
    @endcan
  </div>
@stop

@section('content')
<div class="row d-flex justify-content-center mt-4">
  <div class="card col-8">
                                    <h5 class="card-header text-center"><span class="fas fa-user-tie"></span> Agente</h5>
                                    <div class="card-body">

                                        <div class="row d-flex justify-content-center">
                                            <div class="col-4 mt-1">
                                                <img class="img-fluid rounded" 
                                                    style="width: 200px; height:200px; object-fit: cover" 
                                                    src="{{ $user->avatar() }}" 
                                                    alt="{{ $user->name }}"/>
                                            </div>
                                            
                                            <div class="col-8 mt-4">
                                                    <div>
                                                        <label for="name" class="form-label">Nombre</label>
                                                        <input type="text" id="name" class="form-control" placeholder="{{$user->name}}" readonly>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-8">
                                                            <label for="email" class="form-label">Correo</label>
                                                            <input type="email" id="email" class="form-control" placeholder="{{$user->email}}" readonly>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="phone_number" class="form-label">Teléfono</label>
                                                            <input type="phone_number" id="phone_number" class="form-control" placeholder="{{$user->phone_number}}" readonly>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
  </div>
</div>
@stop
