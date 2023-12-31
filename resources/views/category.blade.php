@extends('layouts.app')

@section('title', 'Category')

@section('content')
    <h1 class="home-title">Category</h1>
    @livewire('category-component', ['category' => $category, 'category_slug' => $category_slug])
@endsection
