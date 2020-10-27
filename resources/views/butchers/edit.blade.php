@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Butchers
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($butchers, ['route' => ['butchers.update', $butchers->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('butchers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection