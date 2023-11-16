@extends('layouts.app')

@section('content')

@include('generic.index',['generic'=>$departments,'incidents'=>$departments->incidents])

@endsection

