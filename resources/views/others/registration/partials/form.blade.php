<div>
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
                        {{ $student->processNb ?? $registration->student->processNb }}
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
                        {{ $student->name ?? $registration->student->name }}
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
                        @isset($student)
                            {{ $student->gender ? 'Masculino' : 'Feminino' }}
                        @endisset

                        @isset($registration)
                            {{ $registration->student->gender ? 'Masculino' : 'Feminino' }}
                        @endisset
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
                        @isset($student)
                            {{ $student->dateFormat($student->birthDate) }}
                        @endisset

                        @isset($registration)
                            {{ $registration->student->dateFormat($registration->student->birthDate) }}
                        @endisset
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
                        @isset($student)
                            {{ $student->age() }} anos
                        @endisset

                        @isset($registration)
                            {{  $registration->student->age() }} anos
                        @endisset
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
                        {{ $student->father ?? $registration->student->father }}
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
                        {{ $student->mother ?? $registration->student->mother }}
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
                        {{ $student->address ?? $registration->student->address }}
                    </span>
                </span>
            </div>
        </div>

        <input type="hidden" name="student_id" value="{{ $student->id ?? $registration->student_id }}">
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
            <div>
                <x-input-label for="school_year_id" value="Ano letivo" />

                <x-select name="school_year_id"
                    id="school_year_id" class="py-1 px-2" required>

                    <option value="{{ $model->current_year()->id }}" selected>
                        {{ $model->current_year()->year }}
                    </option>
                </x-select>

                <x-input-error :messages="$errors->get('school_year_id')" class="mt-2" />
            </div>

            <div class="flex flex-col justify-center">
                <x-input-label for="classes" value="Classe" />

                <x-select name="school_class_id" id="classes" class="select2" required>
                    @isset($registration)
                        <option value="{{ $registration->school_class->id }}" selected>
                            {{ $registration->school_class->level }}ª Classe
                        </option>

                        @foreach ($model->school_classes() as $class)
                            @if ($registration->school_class->level != $class->level)
                                <option value="{{ $class->id }}">
                                    {{ $class->level }}ª Classe
                                </option>
                            @endif
                        @endforeach
                    @else
                        <option value="{{ old('school_class_id') }}">
                        </option>

                        @foreach ($model->school_classes() as $class)
                            <option value="{{ $class->id }}">
                                {{ $class->level }}ª Classe
                            </option>
                        @endforeach
                    @endisset
                </x-select>

                <x-input-error :messages="$errors->get('school_class_id')" class="mt-2" />
            </div>

            <div class="flex flex-col justify-center lg:col-span-2">
                <x-input-label for="courses" value="Curso" />

                <x-select name="course_id" id="courses" class="select2" required>
                    @isset($registration)
                        <option value="{{ $registration->course->id }}" selected>
                            {{ $registration->course->name }}
                        </option>

                        @foreach ($model->courses() as $course)
                            @if ($registration->course->name != $course->name)
                                <option value="{{ $course->id }}">
                                    {{ $course->name }}
                                </option>
                            @endif
                        @endforeach
                    @else
                        <option value="{{ old('course_id') }}">
                        </option>

                        @foreach ($model->courses() as $course)
                            <option value="{{ $course->id }}">
                                {{ $course->name }}
                            </option>
                        @endforeach
                    @endisset
                </x-select>

                <x-input-error :messages="$errors->get('course_id')" class="mt-2" />
            </div>
        </div>
        <div class="flex items-end justify-end">
            <x-cancel-button />

            <x-primary-button />
        </div>
    </div>
</div>
