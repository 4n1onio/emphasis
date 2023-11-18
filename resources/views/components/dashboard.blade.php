<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    {{-- Registered students --}}
    <article class="rounded-xl border bg-gray-50 p-6
        shadow-md hover:scale-105 transition-transform">

        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 mb-1">
                    Alunos inscritos
                </p>

                <p class="text-4xl font-medium text-indigo-500">
                    {{ $nbStudents }}
                </p>
            </div>

            <a href="{{ route('students.index') }}" title="Alunos"
                class="rounded-full flex justify-center items-center
                    w-24 h-24 bg-white text-blue-600 border
                    hover:bg-indigo-50 transition hover:rotate-6">

                <i class="fa-solid fa-user fa-2xl"></i>
            </a>
        </div>

        <div class="mt-3 flex gap-1 text-green-600">
            <i class="fa-solid fa-chart-line"></i>

            <span class="font-medium">
                76.81%
            </span>
        </div>
    </article>

    {{-- Enrolled students --}}
    <article class="rounded-xl border bg-gray-50 p-6
        shadow-md hover:scale-105 transition-transform">

        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 mb-1">
                    Alunos matriculados
                </p>

                <p class="text-4xl font-medium text-indigo-500">
                    {{ $nbEnrolleds }}
                </p>
            </div>

            <a href="{{ route('registrations.index') }}" title="Matrículas"
                class="rounded-full flex justify-center items-center
                    w-24 h-24 bg-white text-blue-600 border
                    hover:bg-indigo-50 transition hover:rotate-6">

                <i class="fa-solid fa-user fa-2xl"></i>
            </a>
        </div>

        <div class="mt-3 flex gap-1 text-green-600">
            <i class="fa-solid fa-chart-line"></i>

            <span class="font-medium">
                89.81%
            </span>
        </div>
    </article>

    {{-- Classrooms --}}
    <article class="rounded-xl border bg-gray-50 p-6
        shadow-md hover:scale-105 transition-transform">

        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 mb-1">
                    Salas de aulas
                </p>

                <p class="text-4xl font-medium text-indigo-500">
                    __
                </p>
            </div>

            <span
                class="rounded-full flex justify-center items-center
                    w-24 h-24 bg-white text-blue-600 border">

                <i class="fa-solid fa-chalkboard fa-2xl"></i>
            </span>
        </div>

        <div class="mt-3 flex gap-1 text-green-600">
            <i class="fa-solid fa-chart-line"></i>
            <span class="font-medium">
                14%
            </span>
        </div>
    </article>

    {{-- Created classes --}}
    <article class="rounded-xl border bg-gray-50 p-6
        shadow-md hover:scale-105 transition-transform">

        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 mb-1">
                    Turmas
                </p>

                <p class="text-4xl font-medium text-indigo-500">
                    {{ $nbCreatedClasses }}
                </p>
            </div>

            <a href="{{ route('created-classes.index') }}" title="Turmas"
                class="rounded-full flex justify-center items-center
                    w-24 h-24 bg-white text-blue-600 border
                    hover:bg-indigo-50 transition hover:rotate-6">

                <i class="fa-solid fa-chalkboard-user fa-2xl"></i>
            </a>
        </div>

        <div class="mt-3 flex gap-1 text-green-600">
            <i class="fa-solid fa-chart-line"></i>

            <span class="font-medium">
                48.82%
            </span>
        </div>
    </article>
</div>
