@extends('layouts.app')

@section('content')

@foreach ($statuses as $status)

@include('generic.index',['generic'=>$status,'incidents'=>$status->incidents->take(5)])

@endforeach

@endsection