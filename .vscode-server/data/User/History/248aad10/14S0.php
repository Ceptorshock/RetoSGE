@extends('layouts.app')

@section('content')

@include('generic.index',['generic'=>$categories,'incidents'=>$incidents])

@endsection