<div class="fixed inset-0 w-full h-full m-auto backdrop-blur-lg z-90 opacity-0 pointer-events-none transition-all duration-150" id="blurred-mask"></div>
<div class="fixed left-0 top-0 w-4/5 max-w-96 bg-neutral h-screen z-100 flex flex-col justify-between items-center p-8 -translate-x-full transition-transform duration-300 ease-in-out pt-14" id="nav-menu">
    <div class="w-full grow">
        <a href="{{ route('landing.home') }}">HOME</a>
    </div>
    <div class="w-full">
        @if(!Auth::check())
            <div class="flex flex-row justify-center items-center gap-2 text-sm">
                <a href="#" class="btn btn-primary max-lg:btn-square text-sm!">
                    <span class="icon-[tabler--user] size-4"></span>
                    <span class="max-lg:hidden">Accedi</span>
                </a>
                <span class="flex flex-row justify-center items-center gap-2 max-lg:hidden">
                            <span>o</span>
                            <a href="#" class="link link-animated link-primary">Registrati</a>
                        </span>
            </div>
        @else
            <a class="cursor-pointer" onclick="$('#logout-function').trigger('submit');">LOGOUT</a>
        @endif
        <div class="divider my-4"></div>
        <div class="flex flex-row justify-center items-center">
            <a href="#" class="btn btn-text btn-square text-base-content hover:text-primary duration-75">
                <span class="icon-[tabler--brand-instagram] size-6"></span>
            </a>
            <a href="#" class="btn btn-text btn-square text-base-content hover:text-primary duration-75">
                <span class="icon-[tabler--brand-threads] size-6"></span>
            </a>
            <a href="#" class="btn btn-text btn-square text-base-content hover:text-primary duration-75">
                <span class="icon-[tabler--brand-x] size-6"></span>
            </a>
        </div>
    </div>
</div>
<div class="fixed left-12 top-0 h-14 flex flex-row justify-start items-center gap-2 z-110">
    <div id="nav-icon" data-menu="closed">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
