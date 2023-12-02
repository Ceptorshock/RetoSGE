@extends('incidents.show')

<div class="comment">
    <h2>{{$comment->text}}</h2>
    <p>Used Time: {{$comment->used_time}}</p>
     p>Creado por {{$comment->user->name}} del departamento {{$comment->user->department->name}}</p>
</div>