{!! Form::open(['method' => 'DELETE', 'route' => [$routeName, $params], 'class' => 'form-horizontal']) !!}
<button type="button" class="btn btn-sm btn-outline-danger btn-confirm" data-toggle="tooltip" data-placement="top"
  title="{{ $text ?? 'Eliminar' }}"><i class="fas {{ $icon ?? 'fa-trash-alt' }}   fa-fw"></i>
  {{ $text ?? 'Eliminar' }}</button>
{!! Form::close() !!}
