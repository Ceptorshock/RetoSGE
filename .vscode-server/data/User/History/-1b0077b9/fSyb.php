@extends('layouts.app')

@section('content')

@foreach ($categories as $category)

@include('generic.index',['generic'=>$category,'type'=>"categories"])

@endforeach

@endsection

