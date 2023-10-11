@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Username')" />
            <x-text-input id="name" class="auth-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="register-errors" />
        </div>

        <!-- Email Address -->
        <div class="register-email">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="auth-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="register-errors" />
        </div>

        <!-- Password -->
        <div class="register-password">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="auth-input" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="register-errors" />
        </div>

        <!-- Confirm Password -->
        <div class="register-password">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="auth-input" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="register-errors" />
        </div>

        <div class="register-submission">
            <a href="{{ route('login') }}">Already registered?</a>

            <x-primary-button>Register</x-primary-button>
        </div>
    </form>

    <div id="validation">
        <h2 id="validation-title">Validation rules :</h2>
        <p id="validation-length" style="color:red;">Min 8 charactere</p>
        <p id="validation-letter" style="color:red;">Min 1 letter</p>
        <p id="validation-number" style="color:red;">Min 1 number</p>
        <p id="validation-capital-letter" style="color:red;">Min 1 capital letter</p>
        <p id="validation-special-character" style="color:red;">Min 1 special character</p>
    </div>

@endsection
