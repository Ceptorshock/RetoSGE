@if(!$incident->comments->isEmpty())
<p></p>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><p>Comentarios</p></div>
                    <div class="card-body">
                        <table class="table table-responsive">
                            <tbody>
                            @foreach ($incident->comments as $comment)
                                <tr>
                                    <th>Usuario:</th>
                                    <td>{{$comment->user->name}}</td>
                                    <td rowspan="2" colspan="4">{{$comment->text}}</td>
                                </tr>
                                <tr>
                                    <th>Fecha Creacion:</th>
                                    <td>{{$comment->created_at}}</td>
                                </tr>
                                <tr>
                                    <th>Fecha Actualizacion:</th>
                                    @if($comment->updated_at != $comment->created_at)
                                    <td>{{$comment->updated_at}}</td>
                                    @else
                                    <td></td>
                                    @endif
                                    <th>Tiempo Usado:</th>
                                    <td>{{$comment->used_time}}</td>
                                    <td>
                                        @auth
                                        @if($incident->user_id === Auth::user()->id)
                                        <a class="btn btn-warning btn-sm" href="{{route('comments.edit',$comment->id)}}"
                                        role="button">Editar</a>
                                        @endif
                                        @endauth
                                    </td>
                                    <td>
                                        @auth
                                        @if($incident->user_id === Auth::user()->id)
                                        <form action="{{route('comment.destroy',$comment)}}" method="POST">
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
@endif