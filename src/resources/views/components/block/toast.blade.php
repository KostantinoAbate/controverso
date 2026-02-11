<div class="fixed right-4 top-18 max-w-96 w-full flex flex-col justify-start gap-1 items-end z-[99999]" id="alert-container">
    @if($errors->any())
        <x-utility.toast :type="'error'">
            <p>Si sono verificati i seguenti errori:</p>
            <ul class="list-inside list-disc">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-utility.toast>
    @endif
    @if(session('error'))
        <x-utility.toast :type="'error'">
            <p>{{ session('error') }}</p>
        </x-utility.toast>
    @endif
    @if(session('warning'))
        <x-utility.toast :type="'warning'">
            <p>{{ session('warning') }}</p>
        </x-utility.toast>
    @endif
    @if(session('info'))
        <x-utility.toast :type="'info'">
            <p>{{ session('info') }}</p>
        </x-utility.toast>
    @endif
    @if (session('status') && session('status') == 'verification-link-sent')
        <x-utility.toast :type="'info'">
            <p>Abbiamo inviato un nuovo link all'email che ci hai fornito!</p>
        </x-utility.toast>
    @elseif(session('status'))
        <x-utility.toast :type="'info'">
            <p>{{ session('status') }}</p>
        </x-utility.toast>
    @endif
    @if(session('success'))
        <x-utility.toast :type="'success'">
            <p>{{ session('success') }}</p>
        </x-utility.toast>
    @endif
    @if(!empty($flashes))
        @foreach($flashes as $type => $flash)
            @if($type == 'error')
                @foreach($flash as $text)
                    <x-utility.toast :type="'error'">
                        <p>{{ session('error') }}</p>
                    </x-utility.toast>
                @endforeach
            @elseif($type == 'warning')
                @foreach($flash as $text)
                    <x-utility.toast :type="'warning'">
                        <p>{{ session('warning') }}</p>
                    </x-utility.toast>
                @endforeach
            @elseif($type == 'info')
                @foreach($flash as $text)
                    <x-utility.toast :type="'info'">
                        <p>{{ session('info') }}</p>
                    </x-utility.toast>
                @endforeach
            @elseif($type == 'success')
                @foreach($flash as $text)
                    <x-utility.toast :type="'success'">
                        <p>{{ session('success') }}</p>
                    </x-utility.toast>
                @endforeach
            @endif
        @endforeach
    @endif
</div>
