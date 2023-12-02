@extends('layouts.app')

@section('content')

<ul>
    <h3>Categorias</h3>
    @foreach ($categories as $category)
    <h4>{{$category->name}}</h4>
    @foreach ($category->incidents->take(5) as $incident)
    <li class="pt-1">
        <div class="d-flex flex-row">
            <a href="incidents/{{$incident->id}}"> {{$incident->title}}</a>.
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
    <@endforeach
    <p></p>
    @endforeach
</ul>
@endsection