@extends('layouts.page')

@push('styles')
<style>
    form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        align-items: start;
    }

    .restaurants__container {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .input-combo {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .input-combo input {
        padding: 0.5rem;
        border: 1px solid rgba(150 150 150);
        border-radius: 0.25rem;
    }

    .button-group {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }
</style>
@endpush

@push('scripts')
<script>
addEventListener('DOMContentLoaded', () => {
    const form = document.forms[0];

    const submitCnt = document.querySelector(".button__submit").children;
    let submitBtn = undefined;

    for(const item of submitCnt) {
        if (item.nodeName == "BUTTON"){
            submitBtn = item;
            break;
        }
    }

    submitBtn.addEventListener('click', () => {
        form.submit();
    })
})
</script>
@endpush


@section('title', 'Create a new restaurant')

@section('content')
<form method="POST" action="/restaurant/create">
    @csrf
    <div class="input-combo">
        <label for="name">Name</label>
        <input type="text" name="name">
    </div>
</form>
<section class="button-group">
    <span class="button__submit">
        <x-button label="Submit" :emphasis="true" />
    </span>
    <a href="/restaurants">
        <x-button label="Cancel" />
    </a>
</section>
@endsection

