@extends('adminlte::page')

@section('title', __('Ventas'))

@section('content_header')
  <div class="row">
    <div class="col-auto">

      <h1 class="m-0 text-dark">{{ __('Ventas') }} </h1>
    </div>
    @can('create', \App\Models\Sale::class)
      <div class="col-auto">
        @include('share.buttons.create', ['routeName' => 'sales.create'])
      </div>
    @endcan
  </div>
@stop

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <table class="table table-hover table-sm" id="sales-table">
            <thead>
              <tr>
                <th>id</th>
                <th>Usuario</th>
                <th>Dirección</th>
                <th>Tipo de venta</th>
                <th>Tipo de inmueble</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($sales as $sale)
                  <tr>
                    <td>{{$sale->id}}</td>
                    <td>{{$sale->user->name}}</td>
                    <td>{{$sale->street}}</td>
                    <td>{{$sale->sale_type}}</td>
                    <td>{{$sale->property_type}}</td>
                    <td>@include('admin.sales.includes.index_action')</td>
  
                    
                  </tr>
                @endforeach
                
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@stop

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
    $('#sales-table').DataTable();
} );
</script>
@endsection
