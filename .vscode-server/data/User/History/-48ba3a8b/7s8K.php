@extends('layouts.app')

@section('content')

<ul>
    <h3>Categorias</h3>
    @foreach ($categories as $category)
    <p>{{$category->name}}</p>
    <li class="pt-1">
        <div class="d-flex flex-row">
            <a href="incidents/{{$category->incidents->id}}"> {{$category->incidents->title}}</a>.
            Creado por {{$category->incidents->user->name}}
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