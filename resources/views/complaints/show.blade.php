@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('lang.Complaints')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('complaints.show_fields')
                    <a href="{{ route('complaints.index') }}" class="btn btn-default">@lang('lang.Back')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
