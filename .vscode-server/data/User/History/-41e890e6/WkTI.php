<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        @if ($type === "incidents")
                            <div class="col-md-4 me-auto"><h1>{{ __('Incidencias') }}</h1></div>
                            <div class="col-md-2 ms-auto">
                                <a class="btn btn-warning btn-sm" href="{{route('incidents.create')}}" role="button">Crear Incidencia</a>
                            </div>
                        @else
                            <div class="col-md-8 me-auto">
                                <a href="{{$type}}/{{$generic->id}}"><h3>{{$generic->name}}</h3></a>    
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <!-- @if ($type === "incidents")
                        @include('incidents.index_template',['incidents'=>$generic,'user'=>$user])
                    @else
                        @include('incidents.index_template',['incidents'=>$generic->incidents->take(5),'user'=>$user])
                    @endif -->
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Fec. Creacion</th>
                                <th scope="col">Ultima Actualizacion</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($type==="incidents")
                            @foreach ($generic->incidents as $incident)
                        @else
                            @foreach ($generic->incidents->take(5) as $incident)
                        @endif
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
                                    @if($incident->user_id === $user->id)
                                    <a class="btn btn-warning btn-sm" href="{{route('incidents.edit',$incident)}}"
                                role="button">Editar</a>
                                    @endif
                                    @endauth
                                </td>
                                <td>
                                    @auth
                                    @if($incident->user_id === $user->id)
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