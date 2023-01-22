@extends('layouts.page')

@section('title', $restaurant->name . ' Tables')

@section('header-content')
<section>
    <a href="/table/create?name={{ urlencode($restaurant->name) }}">
        <x-button label="New table" :emphasis="true" boxicon="bx bx-plus"/>
    </a>
</section>
@endsection

@section('content')
<section>
    <x-table-list :tables="$tables"/>
</section>
@endsection
