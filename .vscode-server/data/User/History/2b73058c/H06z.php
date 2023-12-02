@extends('layouts.app')

@section('content')

@include('generic.index',['generic'=>$statuses,'incidents'=>$statuses->incidents])

@endsection

