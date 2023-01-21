@once
<style>
.restaurant_section__container {
    display: flex;
    justify-content: space-between;
    border: 1px solid rgb(225 225 225);
    border-radius: 0.5rem;
    padding: 1rem;
    box-shadow: 0 1px 2px rgba(0 0 0 / 0.25);
}

.restaurant_section__container h2 {
    margin: 0;
}

.restaurant_section__buttons {
    display: flex;
    gap: 1rem;
    justify-content: end;
    align-items: start;
}

.restaurant_section__info_availability,
.restaurant_section__table_badge {
    display: flex;
    gap: 0.25rem;
    align-items: center;
}

.restaurant_section__info_availability {
    color: rgb(50, 180, 100);
}

.restaurant_section__badgegroup {
    display: flex;
    gap: 1rem;
    color: rgb(150 150 150);
}

.restaurant_section__badgegroup .active {
    color: rgb(47 161 196);
}
</style>
@endonce

<article class="restaurant_section__container">
    <section class="restaurant_section__info">
        <h2>{{ $restaurant->name }}</h2>
        <section class="restaurant_section__info_tablecount">
            <section class="restaurant_section__badgegroup">
                <article class="restaurant_section__table_badge">
                    <i class="bx bx-calendar-x"></i>
                    <p>
                        {{$tables}}
                    </p>
                </article>
                <article class="restaurant_section__table_badge active">
                    <i class="bx bx-calendar-check"></i>
                    <p>
                        {{$active_tables}}
                    </p>
                </article>
            </section>
            @if($tables_available)
            <section class="restaurant_section__info_availability">
                <i class="bx bx-check-circle"></i>
                <p>Tables are available</p>
            </section>
            @endif
        </section>
    </section>
    <section class="restaurant_section__buttons">
        <a href="/restaurant/{{ $restaurant->id }}/tables"><x-button label="See all tables" boxicon="bx bx-list-ul" /></a>
        <a href="/restaurant/{{ $restaurant->id }}/active-tables"><x-button label="See active tables" boxicon="bx bxs-wine" :emphasis="true" /></a>
    </section>
</article>
