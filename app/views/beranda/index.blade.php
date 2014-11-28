@extends('layout.main')
@section('content')

@if(Auth::check())
{{Auth::user()->username }}
@endif

@stop