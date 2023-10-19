<a
    {{ $attributes->merge([
        'class' => "bg-violet-500 hover:bg-violet-600 transition focus:ring-2
                    focus:ring-offset-2 focus:ring-violet-500 py-1 px-2
                    uppercase rounded-md text-xs font-semibold
                    text-white shadow-sm"
    ]) }}>

    <i class="fa-solid fa-edit"></i>
    {{ __('Edit') }}
</a>
