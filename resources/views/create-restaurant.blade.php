@extends('layouts.page')

@push('styles')
<style>
    .restaurants__container {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .input-combo {
        display: flex;
        flex-direction: column;
    }

    .input-combo input {
        padding: 0.5rem;
        border: 1px solid rgba(150 150 150);
        border-radius: 0.25rem;
    }
</style>
@endpush


@section('title', 'Create a new restaurant')

@section('content')
<form method="POST" action="/restaurant/create">
    @csrf
    <div class="input-combo">
        <label for="name">Name</label>
        <input type="text" name="name">
    </div>
    <x-button label="Submit" :emphasis="true" />
</form>
@endsection

