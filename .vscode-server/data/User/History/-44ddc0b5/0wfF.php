@extends('layouts.app')

@section('content')

@foreach ($statuses as $status)

@include('generic.index',['generic'=>$status,'type'=>"statuses",'user'=>$user])

@endforeach

@endsection