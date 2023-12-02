@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __($incident->title) }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Departamento</th>
                                <th scope="col">Fecha Creacion</th>
                                <th scope="col">Ultima Actualizacion</th>
                            </tr>
                            <tr>
                                <td>{{$incident->id}}</td>
                                <td>{{$incident->department->name}}</td>
                                <td>{{$incident->created_at}}</td>
                                <td>{{$incident->updated_at}}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td>{{$incident->department->name}}</td>
                                <td>{{$incident->category->name}}</td>
                                <td>{{$incident->status->name}}</td>
                                <td>{{$incident->priority->name}}</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="{{route('comments.create',$incident)}}"
                                    role="button">Añadir comentario</a>
                                </td>
                                <td></td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="{{route('incidents.edit',$incident->id)}}"
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
                            <tr>
                                <td>{{$incident->text}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
    </div>
</div>
@auth
@include('comments.index')
@endauth
@endsection

