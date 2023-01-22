@extends('layouts.page')

@push('styles')
<style>
    .form__container {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .button-group {
        display: flex;
        gap: 1rem;
    }

    .input-form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .inline {
        display: flex;
        width: 100%;
        gap: 1rem;
    }

    .input-combo {
        display: flex;
        width: 100%;
        flex-direction: column;
    }

    .input-combo.horizontal {
        flex-direction: row;
        gap: 1rem;
    }

    select {
        padding: 0.5rem;
        background-color: white;
        border: none;
        border: 1px solid rgb(150 150 150);
        border-radius: 0.25rem;
    }

    .input-combo input {
        padding: 0.5rem;
        border: 1px solid rgb(150 150 150);
        border-radius: 0.25rem;
    }

    .input-combo input[type=checkbox] {
        padding: 0;
        margin: 0;
    }
</style>
@endpush


@section('title', 'Create a table for \'' . $name . '\' restaurant')

@push('scripts')
<script>
addEventListener('DOMContentLoaded', () => {
    const form = document.forms[0];

    const continueCnt = document.querySelector(".button__continue").children;
    const finishCnt = document.querySelector(".button__finish").children;

    let continueBtn = undefined;
    let finishBtn = undefined;

    for(const item of continueCnt) {
        if (item.nodeName == "BUTTON"){
            continueBtn = item;
            break;
        }
    }

    for(const item of finishCnt) {
        if (item.nodeName == "BUTTON"){
            finishBtn = item;
            break;
        }
    }

    function sendForm(value) {
        form.next.value = value;
        form.method = "POST";
        form.submit();
    }

    form.restaurant_name.value = "<?php echo $name ?>"

    continueBtn.addEventListener('click', () => {
        const name = "<?php echo $name ?>";
        sendForm(`/table/create?name=${encodeURIComponent(name)}`);
    })
    finishBtn.addEventListener('click', () => {
        sendForm("/restaurants");
    })

})
</script>
@endpush

@section('content')
<main class="form__container">
    <form method="POST" class="input-form" action="/table/create">
        @csrf
        <input type="text" name="next" hidden>
        <input type="text" value="" name="restaurant_name" hidden>
        <div class="input-combo">
                <label for="name">Name</label>
                <input id="name" name="name">
        </div>
        <div class="inline">
            <div class="input-combo">
                    <label for="minimum_capacity">Min. capacity</label>
                    <input type="number" value="0" min="0" id="minimum_capacity" name="minimum_capacity">
            </div>
            <div class="input-combo">
                    <label for="maximum_capacity">Max. capacity</label>
                    <input type="number" value="0" min="0" id="maximum_capacity" name="maximum_capacity">
            </div>
        </div>
        <div class="input-combo">
                <label for="area">Dining Area</label>
                <select id="area" name="area">
                    @foreach($dining_areas as $area)
                    <option value="{{$area->id}}">{{$area->name}}</option>
                    @endforeach
                </select>
        </div>
        <div class="input-combo horizontal">
                <label for="active">Is active?</label>
                <input type="checkbox" id="active" name="active">
        </div>
    </form>
    <section class="button-group">
        <span class="button__continue">
            <x-button label="Add and continue adding" :emphasis="true" boxicon="bx bx-plus" />
        </span>
        <span class="button__finish">
            <x-button label="Add and finish" boxicon="bx bx-exit" />
        </span>
        <a href="/restaurants">
            <x-button label="Cancel" boxicon="bx bx-x"/>
        </a>
    </section>
</main>
@endsection
