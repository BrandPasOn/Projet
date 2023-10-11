@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <h1 class="home-title">Welcome on MAETS</h1>
    @livewire('home-component')
@endsection
