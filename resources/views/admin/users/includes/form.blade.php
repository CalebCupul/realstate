<div class="row">
  <div class="col-md-4 text-center">

    <div class="form-group">
      <img src="{{ isset($user) ? $user->avatar() : asset('images/default-avatar.jpeg') }}"
        class="img-thumbnail rounded-circle" alt="Avatar">
    </div>

    <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
      {{-- {!! Form::label('avatar', 'Avatar') !!} --}}
      {!! Form::file('avatar') !!}
      {{-- <p class="help-block">Help block text</p> --}}
      <small class="text-danger">{{ $errors->first('avatar') }}</small>
    </div>

  </div>
  <div class="col-md-8">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      {!! Form::label('name', __('Nombre')) !!}
      {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
      <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      {!! Form::label('email', 'Correo electronico') !!}
      {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
      <small class="text-danger">{{ $errors->first('email') }}</small>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      {!! Form::label('password', 'Contraseña') !!}
      {!! Form::password('password', ['class' => 'form-control']) !!}
      <small class="text-danger">{{ $errors->first('password') }}</small>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
      {!! Form::label('password_confirmation', 'Confirmacion de contraseña') !!}
      {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
      <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
    </div>
  </div>
</div>
