<div class="w-full flex flex-col justify-center items-center h-auto mt-4 max-w-200 max-h-96 mx-auto overflow-hidden hover:shadow-xl transition-all">
    <img src="{{ $src }}"
         loading="lazy"
         decoding="async"
         fetchpriority="low"
         class=" object-cover object-center"
         alt="{{ isset($alt) ?? 'Immagine contestuale all\'articolo' }}"/>
</div>
@if(isset($credits))
    <div class="w-full text-end text-base-content/60! max-w-200 mx-auto text-sm mt-2 mb-4 ">
        ({{ $credits }})
    </div>
@endif
