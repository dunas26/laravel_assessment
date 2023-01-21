@once
<style>
    .x_button__container {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.25rem;
        background-color: white;
        border: none;
        padding: 0.5rem 0.75rem;
        cursor: pointer;
        border-radius: 0.25rem;
        border: 1px solid rgb(47 161 196);
        transition: transform 75ms ease-in-out, color 75ms ease-in-out;
    }

    .x_button__container:hover {
        transform: translateY(-1px);
        box-shadow: 0 1px 2px rgba(0 0 0 / 0.15);
    }

    .x_button__container:active {
        transform: translateY(1px);
        box-shadow: none;
    }

    .x_button__container i {
        height: 100%;
        width: auto;
    }
</style>
@endonce


<button class="x_button__container">
    {{$label}}
    <i class="{{$boxicon}}"></i>
</button>
