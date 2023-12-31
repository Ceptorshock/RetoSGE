@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Usuario') }}</div>

                <div class="card-body">
                    <table class="message">
                        <tr>
                            <td></td>
                            @if ($errors->get('success'))
                                <td class="bg-success"> {{$errors->first()}}
                            @elseif ($errors->get('error'))
                                <td class="bg-danger"> {{$errors->first()}}
                            @else
                                <td>
                            @endif
                            </td>
                            <td></td>
                        </tr>
                    </table>
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
                        <button class="btn btn-warning btn-sm" type="submit">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <p></p>
    @include('generic.index',['incidents'=>$user->incidents,'type'=>"home"])


</div>
@endsection
