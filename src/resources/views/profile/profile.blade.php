<x-layout.profile :viewData="$viewData ?? []">
    <form action="/register" method="POST" class="grid grid-cols-2 max-lg:grid-cols-1 gap-4 w-full" validate-form>
        <div class="w-full">
            <label class="label-text" for="input-name">Nome</label>
            <input type="text" name="name" placeholder="Nome" class="input @error('name') is-invalid @enderror" value="{{ old('name', $user->name ?? '') }}" autocomplete="given-name" id="input-name" />
            @error('name')
            <span class="helper-text">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full">
            <label class="label-text" for="input-surname">Cognome</label>
            <input type="text" name="surname" placeholder="Cognome" class="input @error('surname') is-invalid @enderror" value="{{ old('surname', $user->surname ?? '') }}" autocomplete="family-name" id="input-surname" />
            @error('surname')
            <span class="helper-text">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full">
            <label class="label-text" for="input-birthdate">Data di nascita</label>
            <input type="text" name="birthdate" class="input w-full @error('birthdate') is-invalid @enderror" value="{{ old('birthdate', $user->birthdate ?? '') }}" autocomplete="off" placeholder="gg/mm/yyyy" id="input-birthdate" />
            @error('birthdate')
            <span class="helper-text">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full">
            <label class="label-text" for="input-country">Paese di provenienza</label>
            <div class="w-full">
                <select
                    data-select='{
                            "placeholder": "Scegli un paese",
                            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                            "toggleClasses": "advance-select-toggle text-sm select-disabled:pointer-events-none select-disabled:opacity-40",
                            "hasSearch": true,
                            "searchClasses": "border-base-content/40 focus:border-primary focus:outline-primary bg-base-200 block w-full rounded-field border px-3 py-2 mt-1 text-sm focus:outline-1",
                            "searchPlaceholder": "Cerca...",
                            "searchNoResultText": "Nessuna opzione trovata...",
                            "searchNoResultClasses": "block advance-select-option text-sm",
                            "dropdownClasses": "advance-select-menu bg-base-200 max-h-52 pt-0 overflow-y-auto z-40",
                            "optionClasses": "advance-select-option selected:select-active hover:bg-base-content/5 text-sm",
                            "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"icon-[tabler--check] shrink-0 size-4 text-primary hidden selected:block \"></span></div>",
                            "extraMarkup": "<span class=\"icon-[tabler--caret-up-down] shrink-0 size-4 text-base-content absolute top-1/2 end-3 -translate-y-1/2 \"></span>"
                        }'
                    class="hidden"
                    name="country"
                >
                    <option value="">Scegli un paese</option>
                    @foreach(config('countries') as $key => $country)
                        <option value="{{ $key }}" @selected(old('country', $user->country ?? '') === $key)>{{ $country }}</option>
                    @endforeach
                </select>
            </div>
            @error('country')
            <span class="helper-text">{{ $message }}</span>
            @enderror
        </div>
    </form>
</x-layout.profile>
