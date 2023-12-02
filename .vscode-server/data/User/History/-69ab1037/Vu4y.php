@extends('layouts.app')

@section('content')
<div class="container">
    @if(Route::current()->getName() == 'edit')
        <form class="mt-2" name="edit_platform" action="{{route('comments.update',$comment)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @elseif(Route::current()->getName() == 'create')
        <form class="mt-2" name="create_platform" action="{{route('comments.store')}}" method="POST" enctype="multipart/form-data">
    @endif
    @csrf
    <div class="form-group mb-3">
        <label for="text" class="form-label">Texto</label>
        <textarea type="textarea" rows="5" class="form-control" id="text" name="text">
        @if(Route::current()->getName() == 'edit')
            {{$comment->text}}
        @endif
        </textarea>
    </div>
    <div class="form-group mb-3">
        <label for="used_time" class="form-label">Tiempo usado:</label>
        @if(Route::current()->getName() == 'edit')
            <input type="number" class="form-control" id="used_time" name="used_time" value="{{$comment->used_time}}">
        @elseif (Route::current()->getName() == 'create')
            <input type="number" class="form-control" id="used_time" name="used_time">
        @endif
    </div>
    @if(Route::current()->getName() == 'edit')
        <button type="submit" class="btn btn-primary" name="">Editar comentario</button>
    @elseif (Route::current()->getName() == 'create')
        <button type="submit" class="btn btn-primary" name="">Crear comentario</button>
    @endif
    </form>
</div>
@endsection