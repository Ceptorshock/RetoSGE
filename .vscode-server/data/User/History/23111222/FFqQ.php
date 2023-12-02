@extends('layouts.app')

@section('content')

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
    @endsection