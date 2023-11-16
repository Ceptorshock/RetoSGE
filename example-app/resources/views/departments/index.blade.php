@extends('layouts.app')

@section('content')

@foreach ($departments as $department)

@include('generic.index',['generic'=>$department,'incidents'=>$department->incidents->take(5)])

@endforeach

@endsection

