@extends('adminlte::page')

@section('title', __('Información de propiedad'))

@section('content_header')

@can('edit', $sale)
      <div class="col-auto ">
        @include('share.buttons.edit', ['routeName' => 'sales.edit', 'params' => $sale])
      </div>
    @endcan

@stop

@section('content')
<div class="container pt-4 pb-4">
    <div class="card pt-4 pb-4">
                <h1 class="card-title text-center mb-4" style="font-size:1.5rem;">Información de la propiedad</h1>
                    <div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8 col-md-10 mt-1 text-center">
                                <img class="img-fluid rounded" 
                                    src="{{ $sale->house() }}" 
                                    alt="House Image"/>
                            </div>
                        </div>
                
                        <div class="row d-flex justify-content-center mt-4">
                                <div class="card col-8">
                                    <h5 class="card-header text-center"><span class="fas fa-map-marker-alt"></span> Ubicación</h5>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-lg-6">
                                                <label for="name" class="form-label">País</label>
                                                <input type="text" id="name" class="form-control" placeholder="{{$sale->country->country_name}}" readonly>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="name" class="form-label">Estado</label>
                                                <input type="text" id="name" class="form-control" placeholder="{{$sale->state->state_name}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-lg-6">
                                                <label for="name" class="form-label">Ciudad</label>
                                                <input type="text" id="name" class="form-control" placeholder="{{$sale->city->city_name}}" readonly>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="name" class="form-label">Colonia</label>
                                                <input type="text" id="name" class="form-control" placeholder="{{$sale->suburb->suburb_name}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-lg-12">
                                                <label for="name" class="form-label">Calle</label>
                                                <input type="text" id="name" class="form-control" placeholder="{{$sale->street}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="row d-flex justify-content-center mt-4">
                                <div class="card col-8">
                                    <h5 class="card-header text-center"><span class="fas fa-sign"></span> Características</h5>
                                    <div class="card-body">

                                        <div class="form-row">
                                            <div class="col-lg-4">
                                                <label for="name" class="form-label">Precio</label>
                                                <input type="text" id="name" class="form-control" placeholder="{{$sale->price}}" readonly>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="name" class="form-label">Tipo de inmueble</label>
                                                <input type="text" id="name" class="form-control" placeholder="{{$sale->property_type}}" readonly>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="name" class="form-label">Tipo de venta</label>
                                                <input type="text" id="name" class="form-control" placeholder="{{$sale->sale_type}}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row mt-2">
                                            <div class="col-lg-12">
                                                <label for="name" class="form-label">Descripción</label>
                                                <textarea type="text" id="name" class="form-control" placeholder="{{ $sale->description }}" rows="3" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="row d-flex justify-content-center mt-4">
                                <div class="card col-8">
                                    <h5 class="card-header text-center"><span class="fas fa-user-tie"></span> Contacto</h5>
                                    <div class="card-body">

                                        <div class="row d-flex justify-content-center">
                                            <div class="col-4 mt-1">
                                                <img class="img-fluid rounded" 
                                                    style="width: 200px; height:250px; object-fit: cover" 
                                                    src="/images/default-avatar.jpeg" 
                                                    alt="{{ $sale->user->name }}"/>
                                                    
                                            </div>
                                            
                                            <div class="col-8 mt-4">
                                                    <div>
                                                        <label for="name" class="form-label">Nombre</label>
                                                        <input type="text" id="name" class="form-control" placeholder="{{$sale->user->name}}" readonly>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-8">
                                                            <label for="email" class="form-label">Correo</label>
                                                            <input type="email" id="email" class="form-control" placeholder="{{$sale->user->email}}" readonly>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="phone_number" class="form-label">Teléfono</label>
                                                            <input type="phone_number" id="phone_number" class="form-control" placeholder="{{$sale->user->phone_number}}" readonly>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>    
    </div>
</div>
@stop
