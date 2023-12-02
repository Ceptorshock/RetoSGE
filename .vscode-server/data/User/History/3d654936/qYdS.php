@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <ul>
                <div class="card-header">{{ __('Incidencias') }}</div>
                <div class="card-body">
                @auth
                <a class="btn btn-warning btn-sm" href="{{route('incidents.create')}}" role="button">Crear Incidencia</a>
                @endauth
                @foreach ($incidents as $incident)

                <li class="pt-1">
                    <div class="d-flex flex-row">
                        <a href="incidents/{{$incident->id}}"> {{$incident->title}}</a>.
                        Creado por {{$incident->user->name}}
                        @auth
                        <a class="btn btn-warning btn-sm" href="{{route('incidents.edit',$incident)}}"
                        role="button">Editar</a>

                        <form action="{{route('incidents.destroy',$incident)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit"
                            onclick="return confirm('Are you sure?')">Delete
                            </button>
                        </form>
                        @endauth
                    </div>
                </li>
                @endforeach
                </div>  
            </ul>
            </div>
        </div>
    </div>
</div>
@endsection