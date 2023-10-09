@extends('layouts.app')

@section('content')
    @livewire('game-component', ['game_slug' => $game_slug])
@endsection
