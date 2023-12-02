@extends('layouts.app')

@section('content')

<ul>
    <h3>Departamentos</h3>
    @foreach ($departments as $department)
    <a href="departments/{{$department->id}}"><h4>{{$department->name}}</h4></a>
    @foreach ($department->incidents->take(5) as $incident)
    <li class="pt-1">
        <div class="d-flex flex-row">
            <a href="{{route('incidents.show',$incident)}}"> {{$incident->title}} </a>
            Creado por {{$incident->user->name}} en la fecha {{$incident->created_at}}
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
    <p></p>
    @endforeach
</ul>
@endsection