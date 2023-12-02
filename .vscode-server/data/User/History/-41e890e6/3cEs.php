<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        @if (Route::is('incidents.index'))
                            <div class="col-md-4 me-auto"><h1>{{ __('Incidencias') }}</h1></div>
                            <div class="col-md-2 ms-auto">
                                <a class="btn btn-warning btn-sm" href="{{route('incidents.create')}}" role="button">Crear Incidencia</a>
                            </div>
                        @elseif (Route::is('home'))
                            <div class="col-md-4 me-auto"><h1>{{ __('Incidencias') }}</h1></div>
                        @else
                            <div class="col-md-8 me-auto">
                                <a href="{{Request::segment(1)}}/{{$generic->id}}"><h3>{{$generic->name}}</h3></a>    
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Descripcion</th>
                                <th scope="col" class="text-center">Usuario</th>
                                <th scope="col" class="text-center">Fec. Creacion</th>
                                <th scope="col" class="text-center">Ultima Actualizacion</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
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
                                {{$incident->created_at->toDateString()}}
                                </td>
                                <td>
                                {{$incident->created_at->diffForHumans()}}
                                </td>
                                <td>
                                    @auth
                                    @if($incident->user_id === Auth::user()->id)
                                    <a class="btn btn-warning btn-sm" href="{{route('incidents.edit',$incident)}}"
                                role="button">Editar</a>
                                    @endif
                                    @endauth
                                </td>
                                <td>
                                    @auth
                                    @if($incident->user_id === Auth::user()->id)
                                    <form action="{{route('incidents.destroy',$incident)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit"
                                        onclick="return confirm('Are you sure?')">Delete
                                        </button>
                                    </form>
                                    @endif
                                    @endauth
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