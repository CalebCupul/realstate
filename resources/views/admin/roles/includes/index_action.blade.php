<div class="row justify-content-end">
  @can('view', $role)
    <div class="col-auto">
      @include('share.buttons.show', ['routeName' => 'roles.show', 'params' => $role])
    </div>
  @endcan

  @can('update', $role)
    <div class="col-auto">
      @include('share.buttons.edit', ['routeName' => 'roles.edit', 'params' => $role])
    </div>
  @endcan
  @can('delete', $role)
    <div class="col-auto">
      @include('share.buttons.destroy', ['routeName' => 'roles.destroy', 'params' => $role])
    </div>
  @endcan
</div>
