@extends('layouts.page')

@section('title', $restaurant->name . ' Tables')

@section('header-content')
<section>
    <x-button label="New table" :emphasis="true" boxicon="bx bx-plus"/>
</section>
@endsection

@section('content')
<section>
    <x-table-list :tables="$tables"/>
</section>
@endsection
