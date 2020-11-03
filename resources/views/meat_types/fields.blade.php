



<!-- Images Field -->
<div class="form-group col-sm-6">
    <label for="name">@lang('lang.Images') :</label>
    {!! Form::file('attachments[]', ['multiple' => 'multiple']) !!}
</div>
<div class="clearfix"></div>

<!-- Age Field -->
<div class="form-group col-sm-6">
    <label for="name">@lang('lang.Age') :</label>
    {!! Form::text('age', null, ['class' => 'form-control']) !!}
</div>

<!-- Slaughter Date Field -->
<div class="form-group col-sm-6">
    <label for="name">@lang('lang.Slaughter Date') :</label>
    {!! Form::text('slaughter_date', null, ['class' => 'form-control','id'=>'slaughter_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#slaughter_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Butcher Id Field -->
<div class="form-group col-sm-6">
    <label for="name">@lang('lang.Butcher') :</label>
    {!! Form::select('butcher_id', App\Models\Butchers::pluck('name', 'id'), old('butcher_id'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button class="btn btn-primary" type="submit">@lang('lang.Save')</button>
    <a href="{{ route('meatTypes.index') }}" class="btn btn-default">@lang('lang.Cancel')</a>
</div>
