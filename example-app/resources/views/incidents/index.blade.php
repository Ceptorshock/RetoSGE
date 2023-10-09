<ul>
    <h3>Incidencias</h3>
    @foreach ($incidents as $incident)
    <li>
        <a href="incidents/{{$incident->id}}"> {{$incident->title}}</a>
        Escrito el {{$incident->created_at}}
    </li>
    @endforeach
</ul>