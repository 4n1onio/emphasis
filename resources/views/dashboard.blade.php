<x-app-layout>
    <x-layouts.card>

        <x-slot name="header">
            <div class="h1">
                <i class="fa-solid fa-chart-pie"></i>
                {{ __('Dashboard') }}
            </div>
        </x-slot>

        <x-slot name="content">
            <x-dashboard />
        </x-slot>

    </x-layouts.card>
</x-app-layout>
