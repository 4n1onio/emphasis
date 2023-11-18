<x-app-layout>
    <x-layouts.card>

        <x-slot name="header" class="flex justify-between">
            <h1 class="h1">
                <i class="fa-solid fa-inbox"></i>
                <span>{{ __('Created classes') }}</span>
            </h1>

            <x-add-btn :href="route('created-classes.create')" />
        </x-slot>

        <x-slot name="content">
            @if ($createdClasses->count() > 0)
                <x-table.light>
                    <x-slot name="thead">
                        <tr>
                            <th>
                                <i class="fa-solid fa-calendar"></i>
                                Ano letivo
                            </th>

                            <th>
                                <i class="fa-regular fa-circle"></i>
                                Classe
                            </th>

                            <th>
                                <i class="fa-solid fa-square"></i>
                                Curso
                            </th>

                            <th>
                                <i class="fa-regular fa-circle"></i>
                                Período
                            </th>

                            <th>
                                <i class="fa-regular fa-square"></i>
                                Descritivo
                            </th>

                            <th>
                                <i class="fa-solid fa-square"></i>
                                Sala
                            </th>

                            <th>
                                <i class="fa-solid fa-cog"></i>
                                Opções
                            </th>
                        </tr>
                    </x-slot>

                    <x-slot name="tbody">
                        @foreach ($createdClasses as $createdClass)
                            <tr class="tbody-row">
                                <td>
                                    {{ $createdClass->school_year->year }}
                                </td>

                                <td>
                                    {{ $createdClass->school_class->level }}ª Classe
                                </td>

                                <td>
                                    {{ $createdClass->course->name }}
                                </td>

                                <td>
                                    {{ $createdClass->day_period }}
                                </td>

                                <td>
                                    {{ $createdClass->description }}
                                </td>

                                <td>
                                    {{ $createdClass->room_number }}
                                </td>

                                <td class="cog">
                                    <x-table.edit-btn
                                        :href="route('created-classes.edit', $createdClass)" />

                                    <x-table.del-btn
                                        :action="route('created-classes.destroy', $createdClass)" />
                                </td>
                            </tr>
                        @endforeach
                    </x-slot>

                </x-table.light>

                {{ $createdClasses->links() }}
            @else
                <x-table.alert-info />
            @endif
        </x-slot>

    </x-layouts.card>
</x-app-layout>
