<!-- Name Field -->
<div class="form-group col-sm-12 col-lg-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- E-mail Field -->
<div class="form-group col-sm-12 col-lg-6">
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-12 col-lg-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button class="btn btn-primary" type="submit">@lang('lang.Save')</button>
    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
</div>
