<div class="toast {{ 'toast-' . $type }} show">
    @if($type === 'error')
        <div class="toast-icon">
            <span class="icon-[tabler--skull] size-5"></span>
        </div>
    @elseif($type === 'success')
        <div class="toast-icon">
            <span class="icon-[tabler--circle-check] size-5"></span>
        </div>
    @elseif($type === 'warning')
        <div class="toast-icon">
            <span class="icon-[tabler--alert-triangle] size-5"></span>
        </div>
    @elseif($type === 'info')
        <div class="toast-icon">
            <span class="icon-[tabler--help-hexagon] size-5"></span>
        </div>
    @else
        <div class="toast-icon">
            <span class="icon-[tabler--help-circle] size-5"></span>
        </div>
    @endif
    <div class="toast-content">
        {{ $slot }}
    </div>
    <div class="toast-close">
        <span class="icon-[tabler--x] size-5"></span>
    </div>
</div>
