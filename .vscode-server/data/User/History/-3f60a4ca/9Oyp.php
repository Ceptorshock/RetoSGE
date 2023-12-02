@extends('layouts.app')

@section('content')

<ul>
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

<div class="container">
@foreach ($departments as $department)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">    
                        <div class="col-md-4 me-auto">
                            <a href="departments/{{$department->id}}"><h1>{{$department->name}}</h1></a>    
                        </div>
                    </div>
                </div>
                @foreach ($department->incidents->take(5) as $incident)
                <div class="card-body">
                    @foreach ($incidents as $incident)
                    <div class="d-flex flex-row">
                        <a href="{{route('incidents.show',$incident)}}"> {{$incident->title}}</a>
                        <p>Creado por {{$incident->user->name}}</p>
                        <p>Creado: {{$incident->created_at}}</p>
                    </div>
                    @endforeach
                </div>
                @endforeach 
            </div>
        </div>
    </div>
@endforeach
</div>