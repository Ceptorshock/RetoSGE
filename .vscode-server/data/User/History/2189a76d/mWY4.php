@extends('layouts.app')

@section('content')

@foreach ($priorities as $priority)

@include('generic.index',['generic'=>$department,'type'=>"departments"])

@endforeach

@endsection