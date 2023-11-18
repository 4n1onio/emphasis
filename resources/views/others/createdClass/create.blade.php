<x-app-layout>
    <x-layouts.card>

        <x-slot name="header">
            <h1 class="h1">
                <i class="fa-solid fa-inbox"></i>
                <span>{{ __('Created classes') }}</span>
            </h1>
        </x-slot>

        <x-slot name="content">
            <form action="{{ route('created-classes.store') }}"
                method="post" autocomplete="off">

                @include('others.createdClass.partials.form')
            </form>
        </x-slot>

    </x-layouts.card>
</x-app-layout>
