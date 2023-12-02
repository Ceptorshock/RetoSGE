<div class="comment-box">
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
</div>