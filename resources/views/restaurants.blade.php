@extends('layouts.page')

@push('styles')
<style>
    .restaurant_section__container {
        display: flex;
        justify-content: space-between;
    }

    .restaurant_section__buttons {
        display: flex;
        gap: 1rem;
        justify-content: end;
        align-items: center;
    }
</style>
@endpush

@section('title', 'Restaurants')

@section('header-content')
<section>
    <x-button label="New restaurant" :emphasis="true" boxicon="bx bx-plus"/>
</section>
@endsection

@section('content')
<section>
    @foreach($restaurants as $restaurant)
    <article class="restaurant_section__container">
        <h2>{{ $restaurant->name }}</h2>
        <section class="restaurant_section__buttons">
            <a href="/restaurant/{{ $restaurant->id }}/tables"><x-button label="See all tables" boxicon="bx bx-list-ul" /></a>
            <a href="/restaurant/{{ $restaurant->id }}/active-tables"><x-button label="See active tables" boxicon="bx bxs-wine" :emphasis="true" /></a>
        </section>
    </article>
    @endforeach
</section>
@endsection
