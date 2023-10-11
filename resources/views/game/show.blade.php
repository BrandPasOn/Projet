@extends('layouts.app')

@section('title', 'Game')

@section('content')
    @livewire('game-component', ['game_slug' => $game_slug])
@endsection
