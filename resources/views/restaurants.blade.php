@extends('layouts.page')

@section('title', 'Restaurants')

@section('header-content')
<section>
    <button>New restaurant</button>
</section>
@endsection

@section('content')
<section>
    @foreach($restaurants as $restaurant)
    <article>
        <h2>{{ $restaurant->name }}</h2>
        <section>
            <a href="/restaurant/{{ $restaurant->id }}/tables"><button>Tables</button></a>
            <a href="/restaurant/{{ $restaurant->id }}/active-tables"><button>Active tables</button></a>
        </section>
    </article>
    @endforeach
</section>
@endsection
