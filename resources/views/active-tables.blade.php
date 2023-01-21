@extends('layouts.page')

@section('title', $restaurant->name . ' Active Tables')

@section('header-content')
<section>
    <x-button label="New table" :emphasis="true" boxicon="bx bx-plus"/>
</section>
@endsection

@section('content')
<section>
    <x-group-by-table-list :groups="$groups"/>
</section>
@endsection
