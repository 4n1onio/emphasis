@props(['students'])

<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="p-4 my-2 bg-white rounded-lg shadow-md">

        <form action="" method="get" autocomplete="off">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
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

        <div class="my-2">
            <span class="text-sm font-semibold text-gray-500">
                Total: {{ $students }}
            </span>
        </div>
    </div>
</div>
