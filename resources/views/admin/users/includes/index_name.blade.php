<div class="row justify-content-end">
  <div class="col-auto">
    <img src="{{ $user->avatar() }}" class="img-fluid elevation-2 rounded-circle" alt="Avatar de {{ $user->name }}"
      width="48">
  </div>
  <div class="col align-self-end">
    <a class="btn btn-link" href="{{ route('users.show', $user) }}" role="button">{{ $user->name }}</a>
  </div>
</div>
