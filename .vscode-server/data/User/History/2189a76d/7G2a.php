@extends('layouts.app')

@section('content')

@foreach ($priorities as $priority)

@include('generic.index',['generic'=>$priority,'type'=>"priorities",'user'=>$user])

@endforeach

@endsection