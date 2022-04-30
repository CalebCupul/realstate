<a class="btn btn-sm btn-outline-success" href="{{ route($routeName, $params) }}" role="button" data-toggle="tooltip"
  data-placement="top" title="{{ $text ?? 'Editar' }}"><i class="fas {{ $icon ?? 'fa-pencil-alt' }} fa-fw"></i>
  {{ $text ?? 'Editar' }}</a>
