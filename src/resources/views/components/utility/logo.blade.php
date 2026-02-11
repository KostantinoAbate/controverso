<a href="{{ $href }}" class="flex flex-row justify-center items-center gap-1">
    @if($style === 1)
        <span class="text-4xl max-sm:text-3xl uppercase font-display"><span class="text-primary">Contro</span><span>verso</span></span>
    @elseif($style === 2)
        <span class="text-4xl max-sm:text-3xl uppercase font-display"><span class="text-base-content">Contro</span><span class="text-base-100">verso</span></span>
    @endif
</a>
