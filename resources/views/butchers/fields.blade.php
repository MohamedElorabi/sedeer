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

<!-- Image Field -->
<div class="form-group col-sm-6">
    <label for="name">@lang('lang.Image') :</label>
    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    <label for="name">@lang('lang.Address') :</label>
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Longitude Field -->
<div class="form-group col-sm-6">
    <label for="name">@lang('lang.Longitude') :</label>
    {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Latituede Field -->
<div class="form-group col-sm-6">
    <label for="name">@lang('lang.Latituede') :</label>
    {!! Form::text('latituede', null, ['class' => 'form-control']) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button class="btn btn-primary" type="submit">@lang('lang.Save')</button>
    <a href="{{ route('butchers.index') }}" class="btn btn-default">@lang('lang.Cancel')</a>
</div>
