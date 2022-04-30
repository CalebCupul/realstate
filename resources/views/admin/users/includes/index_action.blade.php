<div class="row justify-content-end">
  @can('view', $user)
    <div class="col-auto">
      @include('share.buttons.show', ['routeName' => 'users.show', 'params' => $user])
    </div>
  @endcan

  @can('update', $user)
    <div class="col-auto">
      @include('share.buttons.edit', ['routeName' => 'users.edit', 'params' => $user])
    </div>
  @endcan
  @can('delete', $user)
    <div class="col-auto">
      @include('share.buttons.destroy', ['routeName' => 'users.destroy', 'params' => $user])
    </div>
  @endcan
</div>
