<x-app-layout>
    <x-layouts.card>

        <x-slot name="header">
            <h1 class="h1">
                <i class="fa-regular fa-square"></i>
                {{ __('Enrolls') }}
            </h1>
        </x-slot>

        <x-slot name="content">
            <form action="{{ route('registrations.update', $registration) }}"
                method="post" autocomplete="off">

                @csrf

                @include('others.registration.partials.form', [
                    'registration' => $registration,
                    'model' => $model,
                ])
            </form>
        </x-slot>

    </x-layouts.card>
</x-app-layout>