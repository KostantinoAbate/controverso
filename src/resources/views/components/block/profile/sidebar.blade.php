<div class="w-62 max-md:w-full mt-4 h-auto p-8 bg-accent rounded-xl text-accent-content">
    <p class="text-xs font-bold uppercase tracking-widest text-accent-content/70">Profilo</p>
    <div class="flex flex-col justify-center items-start gap-2 mt-8">
        <a href="{{ route('landing.profile') }}" class="link text-base-100 hover:text-white font-light link-animated items-center flex flex-row justify-start group">
            <span class="icon-[tabler--chevron-right] text-base-100/70 group-hover:text-primary @if(Route::is('landing.profile')) text-primary @endif"></span>
            <span>Dati personali</span>
        </a>
        <a href="{{ route('landing.profile.verify') }}" class="link text-base-100 hover:text-white font-light link-animated items-center flex flex-row justify-start group">
            <span class="icon-[tabler--chevron-right] text-base-100/70 group-hover:text-primary @if(Route::is('landing.profile.verify')) text-primary @endif"></span>
            <span>Verifica account</span>
        </a>
        <a href="{{ route('landing.profile.password') }}" class="link text-base-100 hover:text-white font-light link-animated items-center flex flex-row justify-start group">
            <span class="icon-[tabler--chevron-right] text-base-100/70 group-hover:text-primary @if(Route::is('landing.profile.password')) text-primary @endif"></span>
            <span>Cambia password</span>
        </a>
        <a href="{{ route('landing.compliance.preferences') }}" class="link text-base-100 hover:text-white font-light link-animated items-center flex flex-row justify-start group">
            <span class="icon-[tabler--chevron-right] text-base-100/70 group-hover:text-primary @if(Route::is('landing.compliance.privacy')) text-primary @endif"></span>
            <span>Gestisci Cookie</span>
        </a>
    </div>
</div>
