@extends('layouts.app')

@section('content')
    <h1 class="title is-3 has-text-primary has-text-centered">Welcome {{ auth()->user()->name }}</h1>
@endsection