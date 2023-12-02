@extends('layouts.app')

@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('comments.store')}}" method="POST" enctype="multipart/form-data">
    @if($comment != null)
        @method('PUT')
    @endif
    @csrf
    <div class="form-group mb-3">
        <label for="text" class="form-label">Texto</label>
        <textarea type="textarea" rows="5" class="form-control" id="text" name="text">
        @if($comment != null)
            {{$comment->text}}
        @endif
        </textarea>
    </div>
    <div class="form-group mb-3">
        <label for="used_time" class="form-label">Tiempo usado:</label>
        @if($comment != null)
            <input type="number" class="form-control" id="used_time" name="used_time" value="{{$comment->used_time}}">
        @else
            <input type="number" class="form-control" id="used_time" name="used_time">
        @endif
    </div>
    <button type="submit" class="btn btn-primary" name="">Crear comentario</button>
    </form>
</div>
@endsection