{!! Form::open(['route' => ['settings.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>

    <a href="{{ route('settings.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>

</div>
{!! Form::close() !!}
