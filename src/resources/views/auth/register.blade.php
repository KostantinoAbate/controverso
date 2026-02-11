<x-layout.auth :viewData="$viewData">
    <div class="w-full min-h-[calc(100vh-5.5rem)] h-fit py-12 flex flex-col justify-center items-center gap-8">
        <h2 class="text-6xl font-display">Registrati</h2>
        <p class="max-w-150">Registrati su <span class="text-primary font-medium">{{ config('app.name') }}</span>. Se hai già un account <a href="/login" class="link link-animated link-primary">accedi qui</a>.</p>
        <form action="/register" method="POST" class="grid grid-cols-2 max-lg:grid-cols-1 gap-4 w-full max-w-300" validate-form>
            @csrf
            <div class="col-span-2 max-lg:col-span-1 w-full">
                <h3 class="font-medium">
                    Account
                </h3>
                <p class="text-sm">Inserisci i dati con cui accedere durante il login.</p>
            </div>
            <div class="w-full">
                <label class="label-text" for="input-username">Username <req>*</req></label>
                <input type="text" name="username" placeholder="Username" class="input @error('username') is-invalid @enderror" value="{{ old('username') }}" autocomplete="username" id="input-username" validate-required validate-handle="username" />
                @error('username')
                    <span class="helper-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full">
                <label class="label-text" for="input-email">Email <req>*</req></label>
                <input type="email" name="email" placeholder="Email" class="input @error('email') is-invalid @enderror" value="{{ old('email') }}" id="input-email" autocomplete="email" validate-required validate-handle="email" />
                @error('email')
                <span class="helper-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full z-auto">
                <label class="label-text" for="input-password">Password <req>*</req></label>
                <div class="flex">
                    <div class="relative flex-1">
                        <input type="password" id="input-password" class="input" placeholder="Password" name="password" autocomplete="new-password" validate-required/>
                        <div id="input-password-content" class="card bg-base-200 absolute w-full hidden p-4 z-40">
                            <div
                                data-strong-password='{
                                    "target": "#input-password",
                                    "hints": "#input-password-content",
                                    "minLength": "8",
                                    "stripClasses": "strong-password:bg-primary strong-password-accepted:bg-success h-1.5 flex-auto bg-neutral",
                                    "mode": "popover"
                                }'
                                class="rounded-full overflow-hidden mt-2.5 flex gap-0.5">
                            </div>
                            <h6 class="text-base text-base-content my-2 font-semibold">La tua password deve contenere:</h6>
                            <ul class="text-base-content/80 space-y-1 text-sm">
                                <li data-pw-strength-rule="min-length" class="strong-password-active:text-success flex items-center gap-x-2">
                                    <span class="icon-[tabler--circle-check] hidden size-5 shrink-0" data-check></span>
                                    <span class="icon-[tabler--circle-x] hidden size-5 shrink-0" data-uncheck></span>
                                    Almeno 8 caratteri.
                                </li>
                                <li data-pw-strength-rule="lowercase" class="strong-password-active:text-success flex items-center gap-x-2">
                                    <span class="icon-[tabler--circle-check] hidden size-5 shrink-0" data-check></span>
                                    <span class="icon-[tabler--circle-x] hidden size-5 shrink-0" data-uncheck></span>
                                    Almeno una lettera minuscola.
                                </li>
                                <li data-pw-strength-rule="uppercase" class="strong-password-active:text-success flex items-center gap-x-2">
                                    <span class="icon-[tabler--circle-check] hidden size-5 shrink-0" data-check></span>
                                    <span class="icon-[tabler--circle-x] hidden size-5 shrink-0" data-uncheck></span>
                                    Almeno una lettera maiuscola.
                                </li>
                                <li data-pw-strength-rule="numbers" class="strong-password-active:text-success flex items-center gap-x-2">
                                    <span class="icon-[tabler--circle-check] hidden size-5 shrink-0" data-check></span>
                                    <span class="icon-[tabler--circle-x] hidden size-5 shrink-0" data-uncheck></span>
                                    Almeno un numero.
                                </li>
                                <li data-pw-strength-rule="special-characters" class="strong-password-active:text-success flex items-center gap-x-2" >
                                    <span class="icon-[tabler--circle-check] hidden size-5 shrink-0" data-check></span>
                                    <span class="icon-[tabler--circle-x] hidden size-5 shrink-0" data-uncheck></span>
                                    Almeno un carattere speciale (!?*).
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @error('password')
                    <span class="helper-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full">
                <label class="label-text" for="input-password_confirmation">Conferma Password <req>*</req></label>
                <input type="password" name="password_confirmation" placeholder="Conferma Password" class="input @error('password_confirmation') is-invalid @enderror" autocomplete="off" id="input-password_confirmation" validate-required />
                @error('password_confirmation')
                <span class="helper-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-span-2 max-lg:col-span-1 divider my-4"></div>
            <div class="col-span-2 max-lg:col-span-1 w-full">
                <h3 class="font-medium">
                    Profilo <span class="text-base-content/60">(opzionale)</span>
                </h3>
                <p class="text-sm">Se desideri aggiungi informazioni su di te, serviranno per verificare il tuo profilo.</p>
            </div>
            <div class="w-full">
                <label class="label-text" for="input-name">Nome</label>
                <input type="text" name="name" placeholder="Nome" class="input @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="given-name" id="input-name" />
                @error('name')
                <span class="helper-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full">
                <label class="label-text" for="input-surname">Cognome</label>
                <input type="text" name="surname" placeholder="Cognome" class="input @error('surname') is-invalid @enderror" value="{{ old('surname') }}" autocomplete="family-name" id="input-surname" />
                @error('surname')
                <span class="helper-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full">
                <label class="label-text" for="input-birthdate">Data di nascita</label>
                <input type="text" name="birthdate" class="input w-full @error('birthdate') is-invalid @enderror" value="{{ old('birthdate') }}" autocomplete="off" placeholder="gg/mm/yyyy" id="input-birthdate" />
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
                            <option value="{{ $key }}" @selected(old('country') === $key)>{{ $country }}</option>
                        @endforeach
                    </select>
                </div>
                @error('country')
                <span class="helper-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-span-2 max-lg:col-span-1 divider my-4"></div>
            <div class="col-span-2 max-lg:col-span-1">
                <div class="flex flex-row justify-start items-center gap-0.5">
                    <input type="checkbox" name="accepted_terms" class="checkbox checkbox-primary checkbox-sm" id="input-accepted_terms" value="1" validate-required />
                    <label class="label-text label-text-light" for="input-accepted_terms"> Dichiaro di aver letto e compreso i <a href="{{ route('landing.compliance.terms') }}" class="link link-primary">Termini e Condizioni</a> per l'uso di questa piattaforma. Registrandomi dichiaro di accettare i suddetti nella loro interezza.</label>
                </div>
                <div class="flex flex-row justify-start items-center gap-0.5">
                    <input type="checkbox" name="accepted_privacy" class="checkbox checkbox-primary checkbox-sm" id="input-accepted_privacy" value="1" validate-required />
                    <label class="label-text label-text-light" for="input-accepted_privacy"> Dichiaro di aver letto e compreso la <a href="{{ route('landing.compliance.privacy') }}" class="link link-primary">Privacy Policy</a> e acconsento al trattamento dei miei dati nei modi e nei limiti descritti nella policy. </label>
                </div>
            </div>
            <div class="w-full flex flex-row justify-center items-center gap-2 mt-4 col-span-2 max-lg:col-span-1">
                <button type="submit" validate-submit class="btn btn-primary text-sm btn-wide">
                    <span class="icon-[tabler--arrow-right] size-5"></span>
                    <span>Registrati</span>
                </button>
            </div>
        </form>
    </div>
</x-layout.auth>
