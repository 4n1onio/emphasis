<select
    {{ $attributes->merge([
        'class' => 'border-indigo-300 w-full
                    focus:border-indigo-500
                    focus:ring-indigo-500
                    rounded-md shadow-sm
                    disabled:bg-gray-50 disabled:border-gray-300'
    ]) }}>

    {{ $slot }}
</select>
