@extends('layouts.app')

@section('content')

@foreach ($categories as $category)
<!-- @include('generic.index_template','nombre'=>$category->name,'incidencias'=>$category->incidents) -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">    
                        <div class="col-md-8 me-auto">
                            <a href="categories/{{$category->id}}"><h3>{{$category->name}}</h3></a>    
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Texto</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Fec. Creacion</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($category->incidents->take(5) as $incident)
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
<p></p>
@endforeach

@endsection

