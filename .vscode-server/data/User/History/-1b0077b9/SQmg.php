@extends('layouts.app')

@section('content')

@foreach ($categories as $category)

@include('generic.index',['generic'=>$category,'incidents'=>$category->incidents->take(5),'type'=>"categories",'user'=>$user])

@endforeach

@endsection

