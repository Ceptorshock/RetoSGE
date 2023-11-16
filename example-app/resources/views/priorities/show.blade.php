@extends('layouts.app')

@section('content')

@include('generic.show',['generic'=>$priorities])
@include('generic.index',['generic'=>$priorities,'incidents'=>$priorities->incidents])

@endsection
