



<!-- Images Field -->
<div class="form-group col-sm-6">
    {!! Form::label('images', 'Images:') !!}
    {!! Form::file('attachments[]', ['multiple' => 'multiple']) !!}
</div>
<div class="clearfix"></div>

<!-- Age Field -->
<div class="form-group col-sm-6">
    {!! Form::label('age', 'Age:') !!}
    {!! Form::text('age', null, ['class' => 'form-control']) !!}
</div>

<!-- Slaughter Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slaughter_date', 'Slaughter Date:') !!}
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
    {!! Form::label('butcher_id', 'Butcher Id:') !!}
    {!! Form::select('butcher_id', App\Models\Butchers::pluck('name', 'id'), old('butcher_id'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('meatTypes.index') }}" class="btn btn-default">Cancel</a>
</div>
