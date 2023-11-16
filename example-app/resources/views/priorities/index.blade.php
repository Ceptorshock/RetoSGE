@extends('layouts.app')

@section('content')

@foreach ($priorities as $priority)

@include('generic.index',['generic'=>$priority,'incidents'=>$priority->incidents->take(5)])

@endforeach

@endsection