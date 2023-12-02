@extends('layouts.app')

@section('content')

<div class="card">
        <div class="card-header">{{ __($priorities->name) }}</div>
        <div class="card-body">
            <ul>
                @foreach ($priorities->incidents as $incident)
                <li class="pt-1">
                    <div class="d-flex flex-row">
                        <a href="{{route('incidents.show',$incident)}}"> {{$incident->title}}</a> <p>Ultima actualizacion: {{$incident->updated_at}}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __($priorities->name) }}</div>
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
                        @foreach ($priorities->incidents as $incident)
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