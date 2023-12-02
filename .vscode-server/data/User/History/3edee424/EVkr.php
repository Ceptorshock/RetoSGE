@extends('layouts.app')

@section('content')

@include('generic.index',['incidents'=>$incidents,'user'=>$user,'type'=>"incidents"])
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">    
                        <div class="col-md-4 me-auto"><h1>{{ __('Incidencias') }}</h1></div>
                        <div class="col-md-2 ms-auto">
                            <a class="btn btn-warning btn-sm" href="{{route('incidents.create')}}" role="button">Crear Incidencia</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('incidents.index_template',['incidents'=>$incidents,'user'=>$user])
                </div>  
            </div>
        </div>
    </div>
</div> -->
@endsection