<x-app-layout>
    <x-layouts.card>

        <x-slot name="header" class="flex justify-between">
            <h1 class="h1">
                <i class="fa-solid fa-chalkboard-user"></i>
                <span>{{ __('Subjects') }}</span>
            </h1>

            <x-add-btn :href="route('school-subjects.create')" />
        </x-slot>

        <x-slot name="content">
            @if ($schoolSubjects->count() > 0)
                <x-table.light>
                    <x-slot name="thead">
                        <tr>
                            <th>
                                <i class="fa-solid fa-chalkboard-user"></i>
                                Nome
                            </th>

                            <th>
                                <i class="fa-regular fa-circle"></i>
                                Abreviatura
                            </th>

                            <th>
                                <i class="fa-regular fa-square"></i>
                                Estado
                            </th>

                            <th>
                                <i class="fa-solid fa-cog"></i>
                                Opções
                            </th>
                        </tr>
                    </x-slot>

                    <x-slot name="tbody">
                        @foreach ($schoolSubjects as $schoolSubject)
                            <tr class="tbody-row">
                                <td>
                                    {{ $schoolSubject->name }}
                                </td>

                                <td class="hsm">
                                    {{ $schoolSubject->abbreviation }}
                                </td>

                                <td class="hsm">
                                    {{ $schoolSubject->status ? 'Activo' : 'Inactivo' }}
                                </td>

                                <td class="cog">
                                    <x-table.edit-btn
                                        :href="route('school-subjects.edit', $schoolSubject)" />

                                    <x-table.del-btn
                                        :action="route('school-subjects.destroy', $schoolSubject)" />
                                </td>
                            </tr>
                        @endforeach
                    </x-slot>

                </x-table.light>

                {{ $schoolSubjects->links() }}
            @else
                <x-table.alert-info />
            @endif
        </x-slot>

    </x-layouts.card>
</x-app-layout>
