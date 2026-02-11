<footer class="w-full min-h-48 relative flex flex-row max-lg:flex-col justify-between gap-24 max-xl:gap-12 items-start max-lg:items-center p-24 max-lg:p-12 bg-transparent z-30" id="footer">
    <div class="w-full z-0" id="footer-background"></div>
    <div class="flex flex-col justify-start items-start max-lg:items-center z-30 max-w-72 max-lg:max-w-full max-lg:w-full gap-8">
        <div>
            <x-utility.logo :href="route('landing.home')" :style="2"/>
        </div>
        <p class="block text-base-100 format">
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
        </p>
        <div class="flex flex-row justify-center items-center gap-2">
            <a href="#" class="btn btn-outline btn-primary btn-square border-base-100 text-base-100 hover:border-primary hover:text-primary duration-75">
                <span class="icon-[tabler--brand-instagram] size-6"></span>
            </a>
            <a href="#" class="btn btn-outline btn-primary btn-square border-base-100 text-base-100 hover:border-primary hover:text-primary duration-75">
                <span class="icon-[tabler--brand-threads] size-6"></span>
            </a>
            <a href="#" class="btn btn-outline btn-primary btn-square border-base-100 text-base-100 hover:border-primary hover:text-primary duration-75">
                <span class="icon-[tabler--brand-x] size-6"></span>
            </a>
        </div>
        <p class="block text-base-100 format max-lg:hidden">
            {{ now()->format('Y') }} © Tutti i diritti riservati
        </p>
    </div>
    <div class="grow flex flex-row max-md:flex-col justify-evenly max-lg:items-center gap-24 max-xl:gap-12 z-30 format max-lg:w-full">
        <div class="p-8 border-t border-primary/80 shadow-lg bg-base-content/80 text-base-100 rounded-2xl w-1/2 max-lg:w-full">
            <h3 class="font-bold tracking-widest uppercase text-base-100/70 text-xs">Controverso</h3>
            <div class="flex flex-col justify-center items-start gap-2 mt-8">
                <a href="{{ route('landing.home') }}" class="link text-base-100 hover:text-white font-light link-animated items-center flex flex-row justify-start group">
                    <span class="icon-[tabler--chevron-right] text-base-100/70 group-hover:text-primary"></span>
                    <span>Home</span>
                </a>
                <a href="" class="link text-base-100 hover:text-white font-light link-animated items-center flex flex-row justify-start group">
                    <span class="icon-[tabler--chevron-right] text-base-100/70 group-hover:text-primary"></span>
                    <span>Articoli</span>
                </a>
                @if(Auth::check())
                    <a href="" class="link text-base-100 hover:text-white font-light link-animated items-center flex flex-row justify-start group">
                        <span class="icon-[tabler--chevron-right] text-base-100/70 group-hover:text-primary"></span>
                        <span>Profilo</span>
                    </a>
                @else
                    <a href="/registrati" class="link text-base-100 hover:text-white font-light link-animated items-center flex flex-row justify-start group">
                        <span class="icon-[tabler--chevron-right] text-base-100/70 group-hover:text-primary"></span>
                        <span>Registrati</span>
                    </a>
                @endif
            </div>
        </div>
        <div class="p-8 border-t border-primary/80 shadow-lg bg-base-content/80 text-base-100 rounded-2xl w-1/2 max-lg:w-full">
            <h3 class="font-bold tracking-widest uppercase text-base-100/70 text-xs">Legal</h3>
            <div class="flex flex-col justify-center items-start gap-2 mt-8">
                <a href="{{ route('landing.compliance.terms') }}" class="link text-base-100 hover:text-white font-light link-animated items-center flex flex-row justify-start group">
                    <span class="icon-[tabler--chevron-right] text-base-100/70 group-hover:text-primary"></span>
                    <span>Termini e Condizioni</span>
                </a>
                <a href="{{ route('landing.compliance.privacy') }}" class="link text-base-100 hover:text-white font-light link-animated items-center flex flex-row justify-start group">
                    <span class="icon-[tabler--chevron-right] text-base-100/70 group-hover:text-primary"></span>
                    <span>Privacy Policy</span>
                </a>
                <a href="{{ route('landing.compliance.legal') }}" class="link text-base-100 hover:text-white font-light link-animated items-center flex flex-row justify-start group">
                    <span class="icon-[tabler--chevron-right] text-base-100/70 group-hover:text-primary"></span>
                    <span>Note Legali</span>
                </a>
                <a href="{{ route('landing.compliance.cookie') }}" class="link text-base-100 hover:text-white font-light link-animated items-center flex flex-row justify-start group">
                    <span class="icon-[tabler--chevron-right] text-base-100/70 group-hover:text-primary"></span>
                    <span>Cookie Policy</span>
                </a>
                <a href="{{ route('landing.compliance.preferences') }}" class="link text-base-100 hover:text-white font-light link-animated items-center flex flex-row justify-start group">
                    <span class="icon-[tabler--chevron-right] text-base-100/70 group-hover:text-primary"></span>
                    <span>Gestisci Cookie</span>
                </a>
            </div>
        </div>
    </div>
    <p class="block text-base-100 format lg:hidden z-30">
        {{ now()->format('Y') }} © Tutti i diritti riservati
    </p>
</footer>
