@extends('layouts.app')

@once
@push('styles')
<style>
.top-section__container {
    display: flex;
    flex-direction: column;
    padding: 1rem;
}

.top-section__container header h1 {
    color: rgb(47, 161, 196);
}

.top-section__container hr {
    width: 100%;
    border: 1px solid rgb(225 225 225);
}
</style>
@endpush
@endonce

@section('base-content')
<main class="top-section__container">
    <header>
        <h1>@yield('title')</h1>
    </header>
    @yield('header-content')
    <hr>
    <section>
        @yield('content')
    </section>
</main>
@endsection
