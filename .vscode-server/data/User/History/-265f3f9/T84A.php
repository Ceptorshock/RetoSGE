@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Usuario') }}
                @if($errors->any())
                <h4>{{$errors->first()}}</h4>
                @endif
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('home.update') }}">
                        @csrf
                        @method('PUT')
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
                                    <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirm" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="department_id" class="col-md-4 col-form-label text-md-end">{{ __('Introduzca departamento') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select" name="department_id" id="department_id">
                                        @foreach ($departments as $department)
                                        <option value="{{$department->id}}"@if($department->id === $user->department_id) selected @endif>{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-sm" type="submit">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">{{ __('Incidencias') }}</div>
        <div class="card-body">
            <!-- <table class="table table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Texto</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Fec. Actualizacion</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($user->incidents as $incident)
                <tr>
                        <td>
                            <a href="{{route('incidents.show',$incident)}}"> {{$incident->title}}</a>
                        </td>
                        <td>
                            {{$incident->user->name}}
                        </td>
                        <td>
                        {{$incident->created_at}}
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="{{route('incidents.edit',$incident)}}"
                        role="button">Editar</a>
                        </td>
                        <td>
                            <form action="{{route('incidents.destroy',$incident)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit"
                                onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table> -->
            @include('incidents.index_template',['$incidents'=>$user->incidents])
        </div>
    </div>


</div>
@endsection
