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
<p></p>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><p>Comentarios</p></div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            @foreach ($incident->comments as $comment)
                                <tr>
                                    <td>
                                        <div>
                                            <p>{{$comment->user->name}}</p>
                                            <p>{{$comment->created_at}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <p>{{$comment->text}}</p>
                                        <p>Tiempo Usado: {{$comment->used_time}}</p>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td colspan="4"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>