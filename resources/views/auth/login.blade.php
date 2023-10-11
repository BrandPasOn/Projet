@extends('layouts.guest')

@section('title', 'Login')

@section('content')

<form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="login-email">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="auth-input" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="login-error" />
        </div>

        <!-- Password -->
        <div class="login-password">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="auth-input" type="password" name="password" required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="login-error" />
        </div>

        <!-- Remember Me -->
        <div class="login-remember">
            <label for="remember_me">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Remember me</span>
            </label>
        </div>

        <div class="login-submission">
            <a class="already-registered"
                href="{{ route('register') }}">
                You already have an account ? Register here
            </a>

            <x-primary-button>
                Log in
            </x-primary-button>
        </div>
    </form>
@endsection()