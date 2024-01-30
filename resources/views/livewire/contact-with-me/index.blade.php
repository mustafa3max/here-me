@section('page-index')
    noindex
@endsection

@section('page-title')
    {{ __('seo.title_call_me') }}
@endsection

@section('page-description')
    {{ __('seo.description_call_me') }}
@endsection

<div x-init="footer=false">
    <div class="flex flex-col w-full gap-2 overflow-hidden h-screen">
        @component('components.chat.nav', ['data'=> $data])
        @endcomponent

        @livewire('contact-with-me.text', ['data' =>$data])

        @livewire('contact-with-me.call', ['data' =>$data])
    </div>

    <x-chat.wait/>

    <x-tool.msg />

    <script type="module">
        window.roomId = '{!!$data->id!!}';
        Alpine.store('chat', {
            messages: [],
            type: null,
            calling: false,
            currentTime: '00:00:00',
            userId: '{{Auth::id()}}',
            userIdHe: '{!!$data->user_id_me === Auth::id()?$data->user_id_he:$data->user_id_me!!}',
            avatarHe: '{!!$data->user_id_me === Auth::id()?$data->userHe->avatar:$data->userMe->avatar!!}',
            nameHe: '{!!$data->user_id_me === Auth::id()?$data->userHe->name:$data->userMe->name!!}',
            avatar: '{{asset(Auth::user()->avatar)}}',
            readyMember: [],
            recall() {
                Echo.private("waiting." + Alpine.store("chat").userIdHe).whisper("index", {
                    roomId: window.roomId,
                    userIdHe: Alpine.store("chat").userId,
                    nameHe: '{{Auth::user()->name}}',
                });
            }
        });
    </script>
    @vite(['resources/js/contact-with-me/main.js','resources/js/contact-with-me/text.js'])
</div>
