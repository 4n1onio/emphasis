<x-app-layout>
    <x-layouts.card>

        <x-slot name="header">
            <h1 class="h1">
                <i class="fa-solid fa-map"></i>
                {{ __('Counties') }}
            </h1>
        </x-slot>

        <x-slot name="content">
            <form action="{{ route('counties.store') }}" method="post" autocomplete="off">

                @include('config.county.partials.form')
            </form>
        </x-slot>

    </x-layouts.card>

    <x-layouts.card>
        <x-slot name="header" class="hidden">
        </x-slot>

        <x-slot name="content">
            <x-table.light>

                <x-slot name="thead">
                    <tr>
                        <th>
                            <i class="fa-solid fa-map"></i>
                            Província
                        </th>

                        <th>
                            <i class="fa-regular fa-circle"></i>
                            {{ __('County') }}
                        </th>
                    </tr>
                </x-slot>

                <x-slot name="tbody">
                    @foreach ($counties as $county)
                        <tr class="tbody-row">
                            <td>
                                {{ $county->province->name }}
                            </td>

                            <td>
                                {{ $county->name }}
                            </td>
                        </tr>
                    @endforeach
                </x-slot>

            </x-table.light>
        </x-slot>

    </x-layouts.card>
</x-app-layout>
