@extends('layouts.app')

@section('content')
<div class="container">
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
                    <!-- @include('incidents.index_template',['incidents'=>$incidents,'user'=>$user]) -->
                    @include('generic.index',['generic'=>$incidents,'user'=>$user,'type'=>"incidents"])
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection