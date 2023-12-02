<!-- <div class="comment-box">
    @foreach ($incident->comments as $comment)
        <div class="comment">
            <h2>{{$comment->text}}</h2>
            <p>Used Time: {{$comment->used_time}}</p>
            <p>Creado por {{$comment->user->name}} del departamento {{$comment->user->department->name}}</p>
        </div>
        <a class="btn btn-warning btn-sm" href="{{route('comments.edit',$comment->id)}}"
            role="button">Editar</a>
    <form action="{{route('comments.destroy',$comment)}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger" type="submit"
        onclick="return confirm('Are you sure?')">Delete
        </button>
    </form>
    @endforeach
</div> -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><p>Comentarios</p></div>
                    <div class="card-body">
                        <table class="table">
                            @foreach ($incidents->comments as $comment)
                            <tbody>
                                <tr>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th>Usuario:</th>
                                    <td>{{$incident->user->name}}</td>
                                    <th>Asignada a:</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Prioridad:</th>
                                    <td>{{$incident->priority->name}}</td>
                                    <th>Estado:</th>
                                    <td>{{$incident->status->name}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <th>Resumen:</th>
                                    <td colspan="2">{{$incident->title}}</td>
                                </tr>
                                <tr >
                                    <th>Descripcion:</th>
                                    <td colspan="2">{{$incident->text}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
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
                            </tbody>
                            @endfor
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endfor