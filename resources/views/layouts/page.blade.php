@extends('layouts.app')


<main>
    <header>
        <h1>@yield('title')</h1>
    </header>
    @yield('header-content')
    <hr>
    <section>
        @yield('content')
    </section>
</main>
