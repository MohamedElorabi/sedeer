@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Meat Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($meatType, ['route' => ['meatTypes.update', $meatType->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('meat_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection