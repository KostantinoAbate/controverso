<nav class="w-full px-12 flex flex-row justify-end items-center gap-2 py-2 fixed left-0 right-0 top-0 h-14 bg-base-100/50 border-b-[0.5px] border-b-base-300 backdrop-blur-lg z-80">
    <div class="flex flex-row justify-center items-center gap-2 inset-0 absolute mx-auto z-30">
        <x-utility.logo :href="route('landing.home')" :style="1"/>
    </div>
    <div class="flex flex-row justify-end items-center gap-2 z-30 text-sm">
        @if(Auth::check())
            @php
                $user = Auth::user();
            @endphp
            <a href="{{ route('landing.profile') }}" class="btn btn-primary max-lg:btn-square max-md:btn-sm text-sm!">
                <span class="icon-[tabler--user] size-4"></span>
                <span class="max-lg:hidden">{{ $user->username }}</span>
            </a>
            <a onclick="$('#logout-function').trigger('submit');" class="btn btn-secondary btn-square max-md:btn-sm">
                <span class="icon-[tabler--logout]"></span>
            </a>
        @else
            <a href="/login" class="btn btn-primary max-lg:btn-square text-sm! max-md:btn-sm">
                <span class="icon-[tabler--user] size-4"></span>
                <span class="max-lg:hidden">Accedi</span>
            </a>
            <span class="flex flex-row justify-center items-center gap-2 max-lg:hidden">
                <span>o</span>
                <a href="/registrati" class="link link-animated link-primary">Registrati</a>
            </span>
        @endif
    </div>
</nav>
