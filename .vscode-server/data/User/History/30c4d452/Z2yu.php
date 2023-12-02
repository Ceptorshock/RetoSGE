@extends('layouts.app')


@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('incidents.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="title" class="form-label">Titulo</label>
        <input type="text" class="form-control" id="title" name="title" required/>
    </div>
    <div class="form-group mb-3">
        <label for="text" class="form-label">Introduzca incidencia:</label>
        <textarea type="textarea" rows="5" class="form-control" id="text" name="text">
        </textarea>
    </div>
    <div class="form-group mb-3">
        <label for="stimated_time" class="form-label">Tiempo estimado:</label>
        <input type="number" class="form-control" id="stimated_time" name="stimated_time"/>
    </div>

    <div class="form-group mb-3">
        <label for="category_id" class="form-label">Categoria:</label>
        <!-- <select name="category_id" id="category_id">
            @foreach
            <option value="KB">KB</option>
            <option value="INC">INC</option>
        </select> -->
        <input type="number" class="form-control" id="category_id" name="category_id"/>
    </div>
    <div class="form-group mb-3">
        <label for="department_id" class="form-label">Departamento:</label>
        <input type="number" class="form-control" id="department_id" name="department_id"/>
    </div>
    <button type="submit" class="btn btn-primary" name="">Crear</button>
    </form>
</div>
@endsection