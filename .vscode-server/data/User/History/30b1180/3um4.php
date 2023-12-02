@extends('layouts.app')


@section('content')
<div class="container">
    @if (isset($incident))
    <form class="mt-2" name="create_platform" action="{{route('incidents.update',$incident)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @else
    <form class="mt-2" name="create_platform" action="{{route('incidents.store')}}" method="POST" enctype="multipart/form-data">
    @endif
    @csrf
    <div class="form-group mb-3">
        <label for="title" class="form-label">Titulo</label>
        <input type="text" class="form-control" id="title" name="title"
        @if(isset($incident))
            value="{{$incident->title}}"
        @endif
        required/>
    </div>
    <div class="form-group mb-3">
        <label for="text" class="form-label">Introduzca incidencia:</label>
        <textarea type="textarea" rows="5" class="form-control" id="text" name="text">
        @if(isset($incident))
            {{$incident->text}}
        @endif
        </textarea>
    </div>
    <div class="form-group mb-3">
        <label for="estimated_time" class="form-label">Tiempo estimado:</label>
        <input type="number" class="form-control" id="estimated_time" name="estimated_time" 
        @if(isset($incident))
        value="{{$incident->estimated_time}}"
        @endif
        />
    </div>

    <div class="form-group mb-3">
        <label for="category_id" class="form-label">Categoria:</label>
        <select name="category_id" id="category_id">
        @foreach ($categories as $category)
            <option value="{{$category->id}}"
            @if(isset($incident) && $incident->$category->id === $category->id)
            selected
            @endif
            >{{$category->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="priority_id" class="form-label">Prioridad:</label>
        <select name="priority_id" id="priority_id">
        @foreach ($priorities as $priority)
            <option value="{{$category->id}}"
            @if(isset($incident) && $incident->category_id === $priority->id)
            selected
            @endif
            >{{$category->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="statud_id" class="form-label">Categoria:</label>
        <select name="statud_id" id="statud_id">
        @foreach ($categories as $category)
            <option value="{{$category->id}}"
            @if(isset($incident) && $incident->category_id === $category->id)
            selected
            @endif
            >{{$category->name}}</option>
        @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary" name="">
    @if(isset($incident))
        Editar
    @else
        Crear
    @endif 
    </button>
    </form>
</div>
@endsection