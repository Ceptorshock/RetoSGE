@extends('layouts.app')


@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('incidents.update',$incident)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="titulo" class="form-label">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo"
        value="{{$incident->title}}"/>
    </div>
    <div class="form-group mb-3">
        <label for="texto" class="form-label">Texto</label>
        <textarea type="textarea" rows="5" class="form-control" id="texto" name="texto">
        {{$incident->text}}
        </textarea>
    </div>
    <div class="form-group mb-3">
        <label for="user_id" class="form-label">User ID</label>
        <input type="number" class="form-control" id="user_id" name="user_id" value="{{$incident->user_id}}"/>
    </div>

    <button type="submit" class="btn btn-primary" name="">Actualizar</button>
    </form>
</div>
@endsection