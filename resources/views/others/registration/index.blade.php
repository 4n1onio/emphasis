<x-app-layout>

    {{-- Search registration --}}
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="p-4 my-2 bg-white rounded-lg shadow-md">

            <form action="" method="get" autocomplete="off">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                    <div>
                        <x-input-label for="school_year">
                            Ano letivo
                        </x-input-label>

                        <x-select name="school_year_id" class="select2" id="school_year" required>
                            <option>
                            </option>

                            @foreach ($model->school_years() as $school_year)
                                <option value="{{ $school_year->id }}">
                                    {{ $school_year->year }}
                                </option>
                            @endforeach
                        </x-select>
                    </div>

                    <div class="md:col-span-2">
                        <x-input-label for="students">
                            Pesquisar por aluno
                        </x-input-label>

                        <x-select name="student_id" id="students" required>
                        </x-select>
                    </div>

                    <div class="flex items-end">
                        <x-primary-button :search="true" />
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-layouts.card>

        <x-slot name="header">
            <h1 class="h1">
                <i class="fa-solid fa-file-alt"></i>
                <span>{{ __('Enrolled') }}</span>
            </h1>
        </x-slot>

        <x-slot name="content">
            @if (count($registrations))
                <x-table.light>
                    <x-slot name="thead">
                        <tr>
                            <th>
                                <i class="fa-solid fa-vcard"></i>
                                Nº da matrícula
                            </th>

                            <th>
                                <i class="fa-solid fa-user"></i>
                                Nome
                            </th>

                            <th>
                                <i class="fa-solid fa-cog"></i>
                                Opções
                            </th>
                        </tr>
                    </x-slot>

                    <x-slot name="tbody">
                        @foreach ($registrations as $registration)
                            <tr class="tbody-row">
                                <td>
                                    {{ $registration->id }}
                                </td>

                                <td>
                                    {{ $registration->student->name }}
                                </td>

                                <td class="cog">
                                    <x-table.show-btn :href="route('registrations.show', $registration)" />

                                    <x-table.edit-btn :href="route('registrations.edit', $registration)" />

                                    <x-print-btn :href="route('registrations.index')" />
                                </td>
                            </tr>
                        @endforeach
                    </x-slot>

                </x-table.light>

                @if (!isset($_REQUEST['student_id']))
                    {{ $registrations->links() }}
                @endif
            @else
                <x-table.alert-info />
            @endif
        </x-slot>

    </x-layouts.card>
</x-app-layout>
