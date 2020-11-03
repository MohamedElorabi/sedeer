<!-- About Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('about', 'About:') !!}
    {!! Form::textarea('about', null, ['class' => 'form-control']) !!}
</div>

<!-- Terms Of Use Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('terms_of_use', 'Terms Of Use:') !!}
    {!! Form::textarea('terms_of_use', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button class="btn btn-primary" type="submit">@lang('lang.Save')</button>
    <a href="{{ route('settings.index') }}" class="btn btn-default">Cancel</a>
</div>
