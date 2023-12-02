@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Incidencias') }}</div>
                <div class="card-body">
                    @auth
                    <a class="btn btn-warning btn-sm" href="{{route('incidents.create')}}" role="button">Crear Incidencia</a>
                    @endauth
                    @foreach ($incidents as $incident)
                    <div class="d-flex flex-row">
                        <a href="incidents/{{$incident->id}}"> {{$incident->title}}</a>
                        Creado por {{$incident->user->name}}
                    </div>
                    @auth
                    <div class="d-flex flex-row">
                        <div class="col-sm">
                                <a class="btn btn-warning btn-sm" href="{{route('incidents.edit',$incident)}}"
                            role="button">Editar</a>
                        </div>
                        <div class="col-sm">
                            <form action="{{route('incidents.destroy',$incident)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit"
                                onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    @endauth
                    @endforeach
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection