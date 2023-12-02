@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($comment))
        <form class="mt-2" name="edit_platform" action="{{route('comments.update',$comment,$incident)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @elseif(isset($id))
        <form class="mt-2" name="create_platform" action="{{route('comments.store')}}" method="POST" enctype="multipart/form-data">
    @endif
    @csrf
    <div class="form-group mb-3">
        <label for="text" class="form-label">Texto</label>
        <textarea type="textarea" rows="5" class="form-control" id="text" name="text">
        @if(isset($comment))
            {{$comment->text}}
        @endif
        </textarea>
    </div>
    <div class="form-group mb-3">
        <label for="used_time" class="form-label">Tiempo usado:</label>
        @if(isset($comment))
            <input type="number" class="form-control" id="used_time" name="used_time" value="{{$comment->used_time}}">
        @elseif (isset($id))
            <input type="number" class="form-control" id="used_time" name="used_time">
        @endif
    </div>
    @if(isset($comment))
        <button type="submit" class="btn btn-primary" name="">Editar comentario</button>
    @elseif (isset($id))
        <button type="submit" class="btn btn-primary" name="">Crear comentario</button>
    @endif
    </form>
</div>
@endsection