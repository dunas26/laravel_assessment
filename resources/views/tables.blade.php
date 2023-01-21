@extends('layouts.page')

@section('title', $restaurant->name . ' Tables')

@section('header-content')
<section>
    <button>New table</button>
</section>
@endsection

@section('content')
<section>
    @foreach($tables as $table)
    <article>
        <h2>{{ $table->name }}</h2>
        <section>
        </section>
    </article>
    @endforeach
</section>
@endsection
