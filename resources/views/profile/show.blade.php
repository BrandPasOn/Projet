@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    @livewire('profile.profile-component', ['user' => $user], key($user->id))
@endsection
