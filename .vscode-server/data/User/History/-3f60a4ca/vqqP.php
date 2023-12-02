@extends('auth.register')

@section('departments')

<div class="row mb-3">
                            <label for="department_id" class="col-md-4 col-form-label text-md-end">{{ __('Introduzca departamento') }}</label>
<!-- 
                            <div class="col-md-6">
                                <input id="department_id" type="text" class="form-control" name="department_od">
                            </div> -->
                            <select class="form-select" name="department_id" id="department_id">
                                <!-- <option value="1">Departamento 1</option>
                                <option value="2">Departamento 2</option>
                                <option value="3">Departamento 3</option> -->
                                foreach ($departments as $department) {
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                }
                            </select>
                        </div>
@endsection