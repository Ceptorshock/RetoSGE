@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="user" id="user">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="current_password" class="col-md-4 col-form-label text-md-end">{{ __('Current Password') }}</label>

                            <div class="col-md-6">
                                <input id="current_password" type="password" class="form-control @error('password') is-invalid @enderror" name="current_password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="new_password" class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="passwonew_password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="department_id" class="col-md-4 col-form-label text-md-end">{{ __('Introduzca departamento') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" name="department_id" id="department_id">
                                    @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <form action="{{route('home.update')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary" name="">Actualizar</button>
                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">{{ __('Incidencias') }}</div>
        <div class="card-body">
            <ul>
                @foreach ($user->incidents as $incident)
                <li class="pt-1">
                    <div class="d-flex flex-row">
                        <a href="incidents/{{$incident->id}}"> {{$incident->title}}</a> <p>Ultima actualizacion: {{$incident->updated_at}}</p>
                        <!-- <a class="btn btn-warning btn-sm" href="{{route('incidents.edit',$incident)}}"
                        role="button">Editar</a>

                        <form action="{{route('incidents.destroy',$incident)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit"
                            onclick="return confirm('Are you sure?')">Delete
                            </button>
                        </form> -->
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>


</div>
@endsection
