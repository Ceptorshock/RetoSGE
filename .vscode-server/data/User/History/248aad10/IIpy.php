@extends('layouts.app')

@section('content')

@include('generic.index',['generic'=>$categories,'incidents'=>$categories->incidents])

@endsection