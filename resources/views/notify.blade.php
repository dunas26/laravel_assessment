@extends('layouts.app')

@push('styles')
<style>
main {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    height: 100%;
}

h1, p {
    margin: 0;
}

main h1 {
    color: rgb(150 150 150);
}
</style>
@endpush

@section('base-content')
<main>
    <h1>Notification</h1>
    <p>{{$msg}}</p>
    <a href="{{$url ?? '/'}}">
        <x-button label="Ok" :emphasis="true" boxicon="bx bx-check" />
    </a>
</main>
@endsection()
