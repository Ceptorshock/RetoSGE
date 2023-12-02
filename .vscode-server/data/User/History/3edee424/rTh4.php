@extends('layouts.app')

@section('content')

<ul>
    <h3>Incidencias</h3>
    <a class="btn btn-warning btn-sm" href="{{route('incidents.create')}}" role="button">Crear Incidencia</a>
    @foreach ($incidents as $incident)

    <li class="pt-1">
        <div class="d-flex flex-row">
            <a class="btn btn-warning btn-sm" href="{{route('incidents.create')}}"
            role="button">Crear Incidencia</a>
            Creado por {{$incident->user->name}}
            <a class="btn btn-warning btn-sm" href="{{route('incidents.edit',$incident)}}"
            role="button">Editar</a>

            <form action="{{route('incidents.destroy',$incident)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit"
                onclick="return confirm('Are you sure?')">Delete
                </button>
            </form>
        </div>
    </li>
    @endforeach
</ul>
@endsection