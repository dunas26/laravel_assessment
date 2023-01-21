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
        grid-template-columns: repeat(3, 1fr);
        padding: 0.5rem;
    }

    .tablelist__group {
        display: flex;
        padding: 0.5rem;
        margin-top: 1rem;
        align-items: center;
        gap: 0.5rem;
        background-color: rgb(145 165 185);
        color: white;
        font-weight: bold;
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
    </section>
    @foreach($groups as $dining_area => $tables)
    <section class="tablelist__group">
        <i class="bx bxs-map"></i>
        <p>{{ $dining_area }}</p>
    </section>
        @foreach($tables as $table)
            <section class="tablelist__entry">
                <p>{{ $table->name }}</p>
                <p>{{ $table->minimum_capacity }}</p>
                <p>{{ $table->maximum_capacity }}</p>
            </section>
        @endforeach
    @endforeach
</article>
