@extends('layouts.app')

@section('title', 'Welcome')

@push('styles')
<style>
.content {
    display: flex;
    flex-direction: column;
    height: 100%;
    background: linear-gradient(to top left, rgb(47, 161, 196), rgb(123, 222, 238));
}

.content header {
    display: flex;
    height: 100%;
    width: 100%;
    justify-content: center;
    align-items: center;
    gap: 1rem;
    flex-direction: column;
}

.title, .subtitle {
    color: white;
}

.subtitle {
    font-size: 3.25vmax;
}

.title {
    font-family: 'Solitreo', cursive;
    font-size: 5.5vmax;
    margin: 0 1rem;
    text-align: center;

}

main {
    display: flex;
    justify-content: center;
    align-items: center;
    background: white;
    height: 20rem;
}

.restaurant-icon {
    position: absolute;
    color: rgba(255 255 255 / 0.25);
    font-size: clamp(10rem, 30vw, 16rem);
    left: calc(50% - 0.5em);
    top: 10%;
    transform: rotateZ(20deg);
}

.wave {
    width: 100%;
}

</style>
@endpush

@section('base-content')

<section class="content">
    <header>
        <p class="title">Your restaurants in one place!</p>
        <p class="subtitle">Welcome to EatDB</p>
    </header>
    <img class="wave" src="{{ asset('img/wave.svg') }}" role="presentation">
    <i class="bx bx-restaurant restaurant-icon"></i>
    <main>
        <a href="{{ route('restaurants') }}">
            <x-button label="See restaurant list" boxicon="bx bx-right-arrow-alt"/>
        </a>
    </main>
</section>
@endsection
