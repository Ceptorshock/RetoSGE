@extends('layouts.app')

@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('comments.store',$incident)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="text" class="form-label">Texto</label>
        <textarea type="textarea" rows="5" class="form-control" id="text" name="text">
        </textarea>
    </div>
    <div class="form-group mb-3">
        <label for="used_time" class="form-label">Tiempo usado:</label>
        <input type="number" class="form-control" id="used_time" name="used_time">
    </div>
    <input type="hidden" value="{{ $incident->id }}" name="incident_id"/>
    <button type="submit" class="btn btn-primary" name="">Crear comentario</button>
    </form>
</div>
@endsection