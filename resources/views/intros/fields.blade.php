<!-- Title Field -->
<div class="form-group col-sm-6">

    <label for="name">@lang('lang.Title') :</label>
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    <label for="name">@lang('lang.Description') :</label>
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    <label for="name">@lang('lang.Image') :</label>
    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button class="btn btn-primary" type="submit">@lang('lang.Save')</button>
    <a href="{{ route('intros.index') }}" class="btn btn-default">@lang('lang.Cancel')</a>
</div>
