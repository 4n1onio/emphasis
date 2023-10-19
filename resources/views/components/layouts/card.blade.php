<div class="mx-auto max-w-7xl sm:px-6 lg:px-8 pt-2">
    <div class="shadow-md sm:rounded-lg">
        <div
            {{ $header->attributes->merge([
                'class' => 'bg-transparent text-xl
                            border-b p-4'
            ]) }}>

            {{ $header }}
        </div>

        <div {{ $content
                ->attributes
                ->merge(['class' => 'p-6 bg-white rounded-b-lg']) }}>

            {{ $content }}
        </div>
    </div>
</div>
