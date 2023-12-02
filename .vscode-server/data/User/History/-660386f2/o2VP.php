@extends('layouts.app')


@section('content')
<div class="container">
    <form class="mt-2" name="edit_platform" action="{{route('incidents.update',$incident)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group mb-3">
        <label for="title" class="form-label">Titulo</label>
        <input type="text" class="form-control" id="title" name="title"
        value="{{$incident->title}}"/>
    </div>
    <div class="form-group mb-3">
        <label for="text" class="form-label">Texto</label>
        <textarea type="textarea" rows="5" class="form-control" id="text" name="text">
        {{$incident->text}}
        </textarea>
    </div>
    <div class="form-group mb-3">
        <label for="category_id" class="form-label">Categoria:</label>
        <select name="category_id" id="category_id">
        @foreach ($categories as $category)
            <option value="{{$category->id}}" 
            @if ($category->id === $incident->category_id)
            selected 
            @endif
            >{{$category->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="department_id" class="form-label">Departamento:</label>
        <select name="department_id" id="department_id">
        @foreach ($departments as $department)
            <option value="{{$department->id}}">{{$department->name}}</option>
        @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary" name="">Actualizar</button>
    </form>
</div>
@endsection
@if (count($records) === 1)
    I have one record!
@elseif (count($records) > 1)
    I have multiple records!
@else
    I don't have any records!
@endif