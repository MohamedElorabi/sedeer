<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $meatType->id }}</p>
</div>

<!-- Images Field -->
<div class="form-group">
    {!! Form::label('images', 'Images:') !!}
    <p>{{ $meatType->images }}</p>
</div>

<!-- Age Field -->
<div class="form-group">
    {!! Form::label('age', 'Age:') !!}
    <p>{{ $meatType->age }}</p>
</div>

<!-- Slaughter Date Field -->
<div class="form-group">
    {!! Form::label('slaughter_date', 'Slaughter Date:') !!}
    <p>{{ $meatType->slaughter_date }}</p>
</div>

<!-- Butcher Id Field -->
<div class="form-group">
    {!! Form::label('butcher_id', 'Butcher Id:') !!}
    <p>{{ $meatType->butcher_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $meatType->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $meatType->updated_at }}</p>
</div>

