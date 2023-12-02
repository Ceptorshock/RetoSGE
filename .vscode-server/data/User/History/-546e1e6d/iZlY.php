@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-2 ms-auto  btn-toolbar">
                        <a class="btn btn-warning btn-sm" href="{{route('incidents.edit',$incident->id)}}"
                        role="button">Editar</a>
                        <form action="{{route('incidents.destroy',$incident)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit"
                            onclick="return confirm('Are you sure?')">Delete
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive">
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
                                <th>Usuario:</th>
                                <td>{{$incident->user->name}}</td>
                                <th>Num. Comentarios:</th>
                                <td>{{$incident->comments->count()}}</td>
                            </tr>
                            <tr>
                                <th>Prioridad:</th>
                                <td>{{$incident->priority->name}}</td>
                                <th>Estado:</th>
                                @switch($incident->status->name)
                                    @case("Abierta")
                                        <td class="bg-success">
                                        @break
                                    @case("Asignada")
                                        <td class="bg-warning">
                                        @break
                                    @case("Solucionada")
                                        <td class="bg-danger">
                                        @break
                                @endswitch
                                {{$incident->status->name}}</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <th>Resumen:</th>
                                <td colspan="3">{{$incident->title}}</td>
                            </tr>
                            <tr rowspan="2">
                                <th>Descripcion:</th>
                                <td colspan="3">{{$incident->text}}</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    @if ($user->department_id === $incident->department_id && $user->department_id != null)
                                    <a class="btn btn-warning btn-sm" href="{{route('comments.create',$incident)}}"
                                    role="button">Añadir comentario</a>
                                    @endif
                                </td>
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

