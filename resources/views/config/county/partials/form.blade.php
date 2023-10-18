<div class="flex flex-col gap-4">
    @csrf

    <div class="grid flex-1 grid-cols-1 gap-4 md:grid-cols-2">
        <div class="flex flex-col justify-center">
            <x-input-label>
                <i class="fa-solid fa-map"></i>
                Provincia
            </x-input-label>

            <x-select name="province_id" id="province_id" class="select2" required>
                @isset($county)
                    <option value="{{ $county->province->id }}" selected>
                        {{ $county->province->name }}
                    </option>

                    @foreach ($county->provinces() as $province)
                        @if ($county->province->name != $province->name)
                            <option value="{{ $province->id }}">
                                {{ $province->name }}
                            </option>
                        @endif
                    @endforeach
                @else
                    <option>
                    </option>

                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">
                            {{ $province->name }}
                        </option>
                    @endforeach
                @endisset
            </x-select>
        </div>

        <div>
            <x-input-label for="name">
                <i class="fa-regular fa-map"></i>
                {{ __('Counties') }}
            </x-input-label>

            <x-text-input type="text" name="name" id="name" class="py-1 px-2"
                value="{{ $county->name ?? old('county') }}"   />

        </div>
    </div>

    <div class="mt-6 text-end lg:mt-2">
        <x-cancel-button />

        <x-primary-button />
    </div>
</div>
