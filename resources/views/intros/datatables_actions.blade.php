{!! Form::open(['route' => ['intros.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('intros.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('intros.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('@lang('lang.Are you sure?')')"
    ]) !!}
</div>
{!! Form::close() !!}
