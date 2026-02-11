<x-layout.auth :viewData="$viewData">
    <div class="w-full min-h-[calc(100vh-5.5rem)] h-fit py-12 flex flex-col justify-center items-center gap-8">
        <h2 class="text-6xl font-display">Password Dimenticata?</h2>
        <p class="max-w-150">Inserisci la mail con cui ha effettuato la registrazione e riceverai un link per resettarla.</p>
        <form action="/password-dimenticata" method="POST" class="grid grid-cols-1 gap-4 w-full max-w-150" validate-form>
            @csrf
            <div class="w-full">
                <label class="label-text" for="input-email">Email <req>*</req></label>
                <input type="email" name="email" placeholder="Email" class="input @error('email') is-invalid @enderror" id="input-email" validate-required />
                @error('email')
                <span class="helper-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full flex flex-row justify-center items-center gap-2 mt-4">
                <button type="button" validate-submit class="btn btn-primary text-sm btn-wide">
                    <span class="icon-[tabler--arrow-right] size-5"></span>
                    <span>Invia Link</span>
                </button>
            </div>
        </form>
    </div>
</x-layout.auth>
