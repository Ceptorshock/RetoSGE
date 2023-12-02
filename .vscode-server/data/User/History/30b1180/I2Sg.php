@extends('layouts.app')


@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('incidents.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="title" class="form-label">Titulo</label>
        <input type="text" class="form-control" id="title" name="titulo" required/>
    </div>
    <div class="form-group mb-3">
        <label for="text" class="form-label">Texto</label>
        <textarea type="textarea" rows="5" class="form-control" id="text" name="texto">
        </textarea>
    </div>
    <div class="form-group mb-3">
        <label for="user_id" class="form-label">Texto</label>
        <input type="number" class="form-control" id="user_id" name="user_id">
        </textarea>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="published" name="publicado">
        <label class="form-check-label" for="publicado">¿Publicar?
    </label>
    </div>
    <button type="submit" class="btn btn-primary" name="">Crear</button>
    </form>
</div>
@endsection