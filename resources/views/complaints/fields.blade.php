<!-- Name Field -->
<div class="form-group col-sm-6">
    <label for="name">@lang('lang.Name') :</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    <label for="name">@lang('lang.Phone') :</label>
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Complaints Field -->
<div class="form-group col-sm-6">
    <label for="name">@lang('lang.Complaints') :</label>
    {!! Form::textarea('complaints', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button class="btn btn-primary" type="submit">@lang('lang.Save')</button>
    <a href="{{ route('complaints.index') }}" class="btn btn-default">@lang('lang.Cancel')</a>
</div>
