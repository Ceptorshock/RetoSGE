<table class="table table-responsive">
    <thead>
        <tr>
            <th scope="col">Descripcion</th>
            <th scope="col">Usuario</th>
            <th scope="col">Fec. Creacion</th>
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
            {{$incident->created_at}}
            </td>
            <td>
                @auth
                @if($incident->user_id === $user->id)
                <a class="btn btn-warning btn-sm" href="{{route('incidents.edit',$incident)}}"
            role="button">Editar</a>
                @endif
                @endauth
            </td>

                <form action="{{route('incidents.destroy',$incident)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit"
                    onclick="return confirm('Are you sure?')">Delete
                    </button>
                </form>
                @endauth
            </td>
    </tr>
    @endforeach
    </tbody>
</table>