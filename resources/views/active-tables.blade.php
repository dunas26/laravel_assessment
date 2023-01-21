@extends('layouts.page')

@section('title', $restaurant->name . ' Active Tables')

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
            <p>{{ $table->active ? 'active' : 'not active' }}</p>
        </section>
    </article>
    @endforeach
</section>
@endsection
