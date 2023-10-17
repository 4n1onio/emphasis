<x-pdf-layout>
    {{-- Photo --}}
    <div>
        <div class="photo">
            <i class="fa-solid fa-user"></i>
        </div>
    </div>

    {{-- Details 1 --}}
    <div class="clearfix">
        <div class="w-50 py-3 float-left">
            {{-- Process --}}
            <label for="name" class="form-label">
                <i class="fa-solid fa-vcard"></i>
                Número do processo
            </label>
            <input type="text" class="form-control" readonly
                value="{{ $student->processNb }}" id="name" />
        </div>

        <div class="w-50 py-3 float-right">
            {{-- Name --}}
            <label for="name" class="form-label">
                <i class="fa-solid fa-user-circle"></i>
                Nome
            </label>
            <input type="text" class="form-control" readonly
                value="{{ $student->name }}" id="name" />
        </div>
    </div>

    {{-- Details 2 --}}
    <div class="clearfix">
        <div class="w-50 py-3 float-left">
            {{-- Father --}}
            <label for="father" class="form-label">
                <i class="fa-solid fa-user"></i>
                Nome do pai
            </label>
            <input type="text" class="form-control disabled"
                value="{{ $student->father }}" id="father" />
        </div>

        <div class="w-50 py-3 float-right">
            {{-- Mother --}}
            <label for="mother" class="form-label">
                <i class="fa-regular fa-user"></i>
                Nome da mãe
            </label>
            <input type="text" class="form-control disabled"
                value="{{ $student->mother }}" id="mother" />
        </div>
    </div>

    {{-- Details 3 --}}
    <div class="clearfix">
        <div class="w-50 py-3 float-left">
            {{-- BirthDate --}}
            <label for="birthDate" class="form-label">
                <i class="fa-solid fa-calendar"></i>
                Data de nascimento
            </label>
            <input type="text" class="form-control" readonly
                value="{{ $student->dateFormat($student->birthDate) }}"
                id="birthDate" />
        </div>

        <div class="w-50 py-3 float-right">
            {{-- Age --}}
            <label for="age" class="form-label">
                <i class="fa-regular fa-calendar"></i>
                Idade do aluno
            </label>
            <input type="text" class="form-control" readonly
                value="{{ $student->age() }}" id="age" />
        </div>
    </div>

    {{-- Details 4 --}}
    <div class="clearfix">
        <div class="w-50 py-3 float-left">
            {{-- Province --}}
            <label for="province" class="form-label">
                <i class="fa-solid fa-map"></i>
                Província de naturalidade
            </label>
            <input type="text" class="form-control disabled"
                value="{{ $student->county->province->name }}" id="province" />
        </div>

        <div class="w-50 py-3 float-right">
            {{-- County --}}
            <label for="age" class="form-label">
                <i class="fa-regular fa-map"></i>
                Município de naturalidade
            </label>
            <input type="text" class="form-control disabled"
                value="{{ $student->county->name }}" id="age" />
        </div>
    </div>

    {{-- Details 5 --}}
    <div class="clearfix">
        <div class="w-50 py-3 float-left">
            {{-- Identity card --}}
            <label for="identityCard" class="form-label">
                <i class="fa-solid fa-vcard"></i>
                BI/Cédula
            </label>
            <input type="text" class="form-control" readonly
                value="{{ $student->identityCard }}" id="identityCard" />
        </div>

        <div class="w-50 py-3 float-right">
            {{-- IcIssueDate --}}
            <label for="icIssueDate" class="form-label">
                <i class="fa-regular fa-calendar"></i>
                Data de emissão
            </label>
            <input type="text" class="form-control" readonly
                value="{{ $student->dateFormat($student->icIssueDate) }}"
                id="icIssueDate" />
        </div>
    </div>

    {{-- Details 6 --}}
    <div class="clearfix">
        <div class="w-50 py-3 float-left">
            {{-- Phone --}}
            <label for="phone" class="form-label">
                <i class="fa-solid fa-phone"></i>
                Telemóvel
            </label>
            <input type="text" class="form-control disabled"
                value="{{ $student->phone }}" id="phone" />
        </div>

        <div class="w-50 py-3 float-right">
            {{-- Alternative phone --}}
            <label for="alternative_phone" class="form-label">
                <i class="fa-solid fa-phone-volume"></i>
                Telemóvel alternativo
            </label>
            <input type="text" class="form-control disabled"
                value="{{ $student->alternative_phone }}"
                id="alternative_phone" />
        </div>
    </div>

    {{-- Details 7 --}}
    <div class="clearfix">
        <div class="w-50 py-3 float-left">
            {{-- Address --}}
            <label for="address" class="form-label">
                <i class="fa-solid fa-map-location"></i>
                Endereço
            </label>
            <input type="text" class="form-control" readonly
                value="{{ $student->address }}" id="address" />
        </div>
    </div>
</x-pdf-layout>
