<a
    {{ $attributes->merge([
        'class' => "bg-white hover:bg-gray-50 transition focus:ring-2
                    focus:ring-offset-2 focus:ring-bg-gray-400 py-1 px-2
                    uppercase rounded-md text-xs font-semibold border border-gray-400
                    shadow-sm"
    ]) }}>

    <i class="fa-solid fa-print"></i>
    {{ __('Print') }}
</a>
