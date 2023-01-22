@extends('layouts.page')

@push('styles')
<style>
    .restaurants__container {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
</style>
@endpush


@section('title', 'Restaurants')

@section('header-content')
<section>
    <a href="/restaurant/create">
        <x-button label="New restaurant" :emphasis="true" boxicon="bx bx-plus"/>
    </a>
</section>
@endsection

@section('content')
<section class="restaurants__container">
    @foreach($restaurants as $restaurant)
        <x-restaurant-item :restaurant="$restaurant"/>
    @endforeach
</section>
@endsection
