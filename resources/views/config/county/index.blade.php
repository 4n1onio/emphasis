<x-app-layout>
    <x-layouts.card>

        <x-slot name="header" class="flex justify-between">
            <h1 class="h1">
                <i class="fa-solid fa-map"></i>
                <span>{{ __('Counties') }}</span>
            </h1>

            <x-add-btn :href="route('counties.create')" />
        </x-slot>

        <x-slot name="content">
            @if ($counties->count() > 0)
                <x-table.light>

                    <x-slot name="thead">
                        <tr>
                            <th>
                                <i class="fa-solid fa-map"></i>
                                Província
                            </th>

                            <th>
                                <i class="fa-regular fa-map"></i>
                                {{ __('County') }}
                            </th>

                            <th>
                                <i class="fa-solid fa-cog"></i>
                                Opções
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

                                <td class="cog">

                                    <x-table.edit-btn
                                        :href="route('counties.edit', $county)" />

                                    <x-table.del-btn
                                        :action="route('counties.destroy', $county)" />

                                </td>
                            </tr>
                        @endforeach
                    </x-slot>

                </x-table.light>

                {{ $counties->links() }}
            @else
                <x-table.alert-info />
            @endif
        </x-slot>

    </x-layouts.card>
</x-app-layout>
