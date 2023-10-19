<x-app-layout>
    <x-layouts.card>

        <x-slot name="header">
            <h1 class="h1">
                <i class="fa-solid fa-map"></i>
                {{ __('Counties') }}
            </h1>
        </x-slot>

        <x-slot name="content">
            <form action="{{ route('counties.update', $county) }}"
                method="post" autocomplete="off">

                @method('patch')
                @include('config.county.partials.form', ['county' => $county])
            </form>
        </x-slot>

    </x-layouts.card>
</x-app-layout>
