@extends('layouts.app')

@section('content')

<div class="card">
        <div class="card-header">{{ __($categories->name) }}</div>
        <div class="card-body">
            <ul>
                @foreach ($categories->incidents as $incident)
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