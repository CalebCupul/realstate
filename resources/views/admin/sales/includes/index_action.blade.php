<div class="row justify-content-end">
  @can('view', $sale)
    <div class="col-auto">
      @include('share.buttons.show', ['routeName' => 'sales.show', 'params' => $sale])
    </div>
  @endcan

  @can('update', $sale)
    <div class="col-auto">
      @include('share.buttons.edit', ['routeName' => 'sales.edit', 'params' => $sale])
    </div>
  @endcan
  @can('delete', $sale)
    <div class="col-auto">
      @include('share.buttons.destroy', ['routeName' => 'sales.destroy', 'params' => $sale])
    </div>
  @endcan
</div>
