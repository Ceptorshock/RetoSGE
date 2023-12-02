@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">    
                        <div class="col-md-4 me-auto"><h1>{{ __('Incidencias') }}</h1></div>
                        <div class="col-md-2 ms-auto">
                            <a class="btn btn-warning btn-sm" href="{{route('incidents.create')}}" role="button">Crear Incidencia</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($incidents as $incident)
                    <div class="d-flex flex-row">
                        <a href="{{route('incidents.show',$incident)}}"> {{$incident->title}}</a>
                        <p>Creado por {{$incident->user->name}}</p>
                        <p>Creado: {{$incident->created_at}}</p>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="col-sm">
                                <a class="btn btn-warning btn-sm" href="{{route('incidents.edit',$incident)}}"
                            role="button">Editar</a>
                        </div>
                        <div class="col-sm">
                            <form action="{{route('incidents.destroy',$incident)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit"
                                onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __($departments->name) }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Texto</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Fec. Creacion</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($incidents as $incident)
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
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
    </div>
</div>
