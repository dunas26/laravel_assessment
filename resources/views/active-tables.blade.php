@extends('layouts.page')

@push('styles')
<style>
.header__button_container {
    display: flex;
    gap: 1rem;
}

.header__button_container a {
    width: min;
}
</style>
@endpush

@section('title', $restaurant->name . ' Active Tables')

@section('header-content')
<section class="header__button_container">
    <a href="/table/create?name={{ urlencode($restaurant->name) }}">
        <x-button label="New table" :emphasis="true" boxicon="bx bx-plus"/>
    </a>
    <a href="/restaurants">
        <x-button label="Cancel" boxicon="bx bx-x"/>
    </a>
</section>
@endsection

@section('content')
<section>
    <x-group-by-table-list :groups="$groups"/>
</section>
@endsection
