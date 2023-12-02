@extends('layouts.app')

@section('content')

@include('generic.index',['incidents'=>$incidents,'user'=>$user])

@endsection