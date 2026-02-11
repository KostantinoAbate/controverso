<x-layout.auth :viewData="$viewData">
    <div class="w-full min-h-[calc(100vh-5.5rem)] h-fit py-12 flex flex-col justify-center items-center gap-8">
        <h2 class="text-6xl font-display">Login</h2>
        <p class="max-w-150">Effettua il login per commentare e interagire. Se non hai ancora un account <a href="/registrati" class="link link-animated link-primary">crealo qui</a>.</p>
        <form action="/login" method="POST" class="grid grid-cols-1 gap-4 w-full max-w-150" validate-form>
            @csrf
            <div class="w-full">
                <label class="label-text" for="input-login">Email/Username <req>*</req></label>
                <input type="text" name="login" placeholder="Email/Username" class="input @error('login') is-invalid @enderror" value="{{ old('login') }}" id="input-login" validate-required />
                @error('login')
                    <span class="helper-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full">
                <label class="label-text" for="input-password">Password <req>*</req></label>
                <input type="password" name="password" placeholder="Password" class="input @error('login') is-invalid @enderror" id="input-password" validate-required />
                @error('login')
                    <span class="helper-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full flex flex-row justify-between items-center gap-2 flex-wrap">
                <div class="flex flex-row justify-start items-center gap-0.5">
                    <input type="checkbox" name="remember" class="checkbox checkbox-primary checkbox-sm" @checked(old('remember')) value="1" id="input-remember" />
                    <label class="label-text label-text-light" for="input-remember"> Ricordami </label>
                </div>
                <a href="/password-dimenticata" class="link link-hover text-sm text-base-content/60">Password dimenticata?</a>
            </div>
            <div class="w-full flex flex-row justify-center items-center gap-2 mt-4">
                <button type="button" validate-submit class="btn btn-primary text-sm btn-wide">
                    <span class="icon-[tabler--arrow-right] size-5"></span>
                    <span>Accedi</span>
                </button>
            </div>
        </form>
    </div>
</x-layout.auth>
