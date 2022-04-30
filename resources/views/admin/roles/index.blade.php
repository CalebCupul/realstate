@extends('adminlte::page')

@section('title', __('Roles'))

@section('content_header')
  <div class="row">
    <div class="col-auto">

      <h1 class="m-0 text-dark">{{ __('Roles') }} </h1>
    </div>
    @can('roles.create')
      <div class="col-auto ">
        @include('share.buttons.create', ['routeName' => 'roles.create'])
      </div>
    @endcan
  </div>
@stop

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <table class="table table-hover table-sm" id="roles-table">
            <thead>
              <tr>
                <th>&nbsp;</th>
                <th>{{ __('Name') }}</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
@stop


@section('js')
  @include('share.datatable', [
      'model' => 'roles',
      'fields' => [
          ['name' => 'name'],
          [
              'name' => 'action',
              'orderable' => 'false',
              'searchable' => 'false',
          ],
      ],
  ])
@endsection
