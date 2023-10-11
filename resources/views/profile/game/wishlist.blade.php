@extends('layouts.app')

@section('title', 'Wishlist')

@section('content')
    <h1 class="home-title">Wishlist</h1>
    @livewire('profile.wishlist-component')
@endsection
