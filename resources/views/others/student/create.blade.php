<x-app-layout>
    <x-layouts.card>

        <x-slot name="header">
            <h1 class="h1">
                <i class="fa-solid fa-user-plus"></i>
                {{ __('Students') }}
            </h1>
        </x-slot>

        <x-slot name="content">
            <form action="{{ route('students.store') }}"
                method="post" autocomplete="off">

                @include('others.student.partials.form')
            </form>
        </x-slot>

    </x-layouts.card>
</x-app-layout>
