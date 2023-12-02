@extends('auth.register')

@section('departments')

<div class="row mb-3">
    <label for="department_id" class="col-md-4 col-form-label text-md-end">{{ __('Introduzca departamento') }}</label>
    <select class="form-select" name="department_id" id="department_id">
        @foreach ($departments as $department)
            <option value="{{$department->id}}">{{$department->name}}</option>
        @endforeach
    </select>
</div>
@endsection