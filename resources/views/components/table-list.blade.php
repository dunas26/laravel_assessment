@once
<style>
    .tablelist__container {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: auto;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 2px 2px rgba(0 0 0 / 0.1);
    }

    .tablelist__container .tablelist__entry {
        background-color: rgba(240 240 240);
    }

    .tablelist__container .tablelist__entry:nth-child(even) {
        background-color: rgba(255 255 255);
        border: 1px solid rgba(240 240 240);
    }

    .tablelist__container .tablelist__entry:last-child {
    }

    .tablelist__entry,
    .tablelist__header {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        padding: 0.5rem;
    }

    .tablelist__header {
        background-color: rgb(47, 161, 196);
        color: white;
        font-weight: bold;
        border-bottom: 1px solid rgb(230 230 230);

    }
</style>
@endonce

<article class="tablelist__container">
    <section class="tablelist__header">
        <p>Table name</p>
        <p>Min. Capacity</p>
        <p>Max. Capacity</p>
        <p>Is active</p>
    </section>
    @foreach($tables as $table)
        <section class="tablelist__entry">
            <p>{{ $table->name }}</p>
            <p>{{ $table->minimum_capacity }}</p>
            <p>{{ $table->maximum_capacity }}</p>
            <p>{{ $table->active ? 'active' : 'not active' }}</p>
        </section>
    @endforeach
</article>
