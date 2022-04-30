  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', __('Nombre')) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
  </div>

  <div class="form-group{{ $errors->has('permissions') ? ' has-error' : '' }}">
    {!! Form::label('permissions', __('Permisos')) !!}
    {!! Form::select('permissions[]', $permissions, null, ['id' => 'permissions', 'class' => 'form-control duallistbox', 'multiple', 'size' => 15]) !!}
    <small class="text-danger">{{ $errors->first('permissions') }}</small>
  </div>
