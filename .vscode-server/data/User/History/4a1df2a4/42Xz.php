@extends('layouts.app')

@section('content')

@foreach ($departments as $department)

@include('generic.index',['generic'=>$department,'type'=>"departments",'user'=>$user])

@endforeach

@endsection

