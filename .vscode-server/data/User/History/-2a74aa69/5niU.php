@extends('layouts.app')

@section('content')
<div class="container">
    <form class="mt-2" name="edit_platform" action="{{route('comments.update',$comment)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="text" class="form-label">Texto</label>
        <textarea type="textarea" rows="5" class="form-control" id="text" name="text">{{$comment->text}}
        </textarea>
    </div>
    <div class="form-group mb-3">
        <label for="used_time" class="form-label">Tiempo usado:</label>
        <input type="number" class="form-control" id="used_time" name="used_time" value="{{$comment->used_time}}>
    </div>
    <button type="submit" class="btn btn-primary" name="">Crear comentario</button>
    </form>
</div>
@endsection