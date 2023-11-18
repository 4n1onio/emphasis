<x-app-layout>
    <x-layouts.card>
        <x-slot name="header">
        </x-slot>

        <x-slot name="content">
            {{-- Student info --}}
            <div class="p-2 border bg-gray-50 rounded-md relative">
                {{-- Fieldset --}}
                <div class="absolute -top-4 lg:left-1/2 transform lg:-translate-x-1/2 bg-gray-200 rounded-lg">
                    <span class="inline-block m-2 text-gray-500 font-semibold">
                        <i class="fa-solid fa-user"></i>
                        Dados do aluno
                    </span>
                </div>

                {{-- Content --}}
                <div class="mt-8 mb-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
                    {{-- Process --}}
                    <div class="text-sm text-gray-500">
                        <span class="inline-block mb-px ms-px">
                            <i class="fa-solid fa-vcard"></i>
                            Nº do processo
                        </span>

                        <span class="block border font-semibold bg-white rounded-md">
                            <span class="inline-block px-2 py-1">
                                {{ $registration->student->processNb }}
                            </span>
                        </span>
                    </div>

                    {{-- Name --}}
                    <div class="text-sm text-gray-500">
                        <span class="inline-block mb-px ms-px">
                            <i class="fa-solid fa-user"></i>
                            Nome
                        </span>

                        <span class="block border font-semibold bg-white rounded-md">
                            <span class="inline-block px-2 py-1">
                                {{ $registration->student->name }}
                            </span>
                        </span>
                    </div>

                    {{-- Gender --}}
                    <div class="text-sm text-gray-500">
                        <span class="inline-block mb-px ms-px">
                            <i class="fa-solid fa-venus-mars"></i>
                            Género
                        </span>

                        <span class="block border font-semibold bg-white rounded-md">
                            <span class="inline-block px-2 py-1">
                                {{ $registration->student->gender ? 'Masculino' : 'Feminino' }}
                            </span>
                        </span>
                    </div>

                    {{-- Birth of date --}}
                    <div class="text-sm text-gray-500">
                        <span class="inline-block mb-px ms-px">
                            <i class="fa-solid fa-calendar"></i>
                            Data de nascimento
                        </span>

                        <span class="block border font-semibold bg-white rounded-md">
                            <span class="inline-block px-2 py-1">
                                {{ $registration->student->dateFormat($registration->student->birthDate) }}
                            </span>
                        </span>
                    </div>

                    {{-- Birth of date --}}
                    <div class="text-sm text-gray-500">
                        <span class="inline-block mb-px ms-px">
                            <i class="fa-regular fa-calendar"></i>
                            Idade
                        </span>

                        <span class="block border font-semibold bg-white rounded-md">
                            <span class="inline-block px-2 py-1">
                                {{ $registration->student->age() }} anos
                            </span>
                        </span>
                    </div>

                    {{-- Father --}}
                    <div class="text-sm text-gray-500">
                        <span class="inline-block mb-px ms-px">
                            <i class="fa-regular fa-user"></i>
                            Pai
                        </span>

                        <span class="block border font-semibold bg-white rounded-md">
                            <span class="inline-block px-2 py-1">
                                {{ $registration->student->father }}
                            </span>
                        </span>
                    </div>

                    {{-- Mother --}}
                    <div class="text-sm text-gray-500">
                        <span class="inline-block mb-px ms-px">
                            <i class="fa-regular fa-user"></i>
                            Mãe
                        </span>

                        <span class="block border font-semibold bg-white rounded-md">
                            <span class="inline-block px-2 py-1">
                                {{ $registration->student->mother }}
                            </span>
                        </span>
                    </div>

                    {{-- Address --}}
                    <div class="text-sm text-gray-500">
                        <span class="inline-block mb-px ms-px">
                            <i class="fa-regular fa-map"></i>
                            Morada do aluno(a)
                        </span>

                        <span class="block border font-semibold bg-white rounded-md">
                            <span class="inline-block px-2 py-1">
                                {{ $registration->student->address }}
                            </span>
                        </span>
                    </div>
                </div>
            </div>

            {{-- Enrolled info --}}
            <div class="p-2 mt-12 border bg-gray-50 rounded-md relative">
                {{-- Fieldset --}}
                <div class="absolute -top-4 lg:left-1/2 transform lg:-translate-x-1/2 bg-gray-200 rounded-lg">
                    <span class="inline-block m-2 text-gray-500 font-semibold">
                        <i class="fa-solid fa-file-alt"></i>
                        Dados da matrícula
                    </span>
                </div>

                {{-- Content --}}
                <div class="mt-8 mb-5 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    {{-- Enrolled number --}}
                    <div class="text-sm text-gray-500">
                        <span class="inline-block mb-px ms-px">
                            <i class="fa-regular fa-square"></i>
                            Nº da matrícula
                        </span>

                        <span class="block border font-semibold bg-white rounded-md">
                            <span class="inline-block px-2 py-1">
                                {{ $registration->id }}
                            </span>
                        </span>
                    </div>

                    {{-- School year --}}
                    <div class="text-sm text-gray-500">
                        <span class="inline-block mb-px ms-px">
                            <i class="fa-solid fa-calendar"></i>
                            Ano letivo
                        </span>

                        <span class="block border font-semibold bg-white rounded-md">
                            <span class="inline-block px-2 py-1">
                                {{ $registration->school_year->year }}
                            </span>
                        </span>
                    </div>

                    {{-- School_class --}}
                    <div class="text-sm text-gray-500">
                        <span class="inline-block mb-px ms-px">
                            <i class="fa-solid fa-square"></i>
                            Classe
                        </span>

                        <span class="block border font-semibold bg-white rounded-md">
                            <span class="inline-block px-2 py-1">
                                {{ $registration->school_class->level }}
                            </span>
                        </span>
                    </div>

                    {{-- Course --}}
                    <div class="text-sm text-gray-500">
                        <span class="inline-block mb-px ms-px">
                            <i class="fa-regular fa-circle"></i>
                            Curso
                        </span>

                        <span class="block border font-semibold bg-white rounded-md">
                            <span class="inline-block px-2 py-1">
                                {{ $registration->course->name }}
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-layouts.card>
</x-app-layout>
