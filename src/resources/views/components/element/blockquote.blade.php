<blockquote class="relative p-4 my-4">
    <span class="icon-[tabler--quote] text-base-300/50 absolute -start-3 -top-3 size-16 rotate-180 rtl:rotate-0"></span>
    <div class="relative z-1">
        <p class="text-base-content text-lg">
            <em>
                {{ $slot }}
            </em>
        </p>
    </div>
    @if(isset($author))
        <footer class="mt-4">
            <div class="text-base-content/50 text-base font-semibold">&mdash; {{ $author }}</div>
        </footer>
    @endif
</blockquote>
