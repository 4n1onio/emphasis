<x-app-layout>
    @isset ($_REQUEST['id'])
        <x-layouts.card>

            <x-slot name="header">
                <h1 class="h1">
                    <i class="fa-regular fa-square"></i>
                    {{ __('Enrolls') }}
                </h1>
            </x-slot>

            <x-slot name="content">
                <form action="{{ route('registrations.store') }}"
                    method="post" autocomplete="off">

                    @csrf

                    @include('others.registration.partials.form', [
                        'student' => $student,
                        'model' => $model,
                    ])
                </form>
            </x-slot>

        </x-layouts.card>
    @else
        <x-search-student :students="$records" />

        <x-layouts.card>

            <x-slot name="header" class="flex justify-between">
                <h1 class="h1">
                    <i class="fa-solid fa-user"></i>
                    <span>{{ __('Students') }}</span>
                </h1>
            </x-slot>

            <x-slot name="content">
                @if (count($students))
                    <x-table.light>
                        <x-slot name="thead">
                            <tr>
                                <th>
                                    <i class="fa-solid fa-vcard"></i>
                                    Nº do processo
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
                            @foreach ($students as $student)
                                <tr class="tbody-row">
                                    <td>
                                        {{ $student->processNb }}
                                    </td>

                                    <td>
                                        {{ $student->name }}
                                    </td>

                                    <td class="cog">
                                        <x-table.show-btn :href="route('students.show', $student)" />

                                        <a class="enroll"
                                            href="{{ route('registrations.create', ['id' => $student->id]) }}">

                                            {{ __('To enroll') }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </x-slot>

                    </x-table.light>

                    @if (!isset($_REQUEST['student_id']))
                        {{ $students->links() }}
                    @endif
                @else
                    <x-table.alert-info />
                @endif
            </x-slot>

        </x-layouts.card>
    @endisset
</x-app-layout>
