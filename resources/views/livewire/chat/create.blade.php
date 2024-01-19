<form class="flex gap-2 border-x-2 border-b-2 border-primary-light p-2 dark:border-primary-dark" wire:submit='create'
    x-data="{ showEmojis: false, emojiTapParent: 'smileys_emotion' }">

    <div x-on:click="showEmojis=!showEmojis">
        <x-button.fill-icon circle="1" icon="emoji-smile-fill" title="" size="14" />
    </div>

    <div class="h-14 grow">
        <x-input.one circle="1" placeholder="{{ __('str.message') }}" id="message" model="message" />

        <input type="hidden" wire:model='broadcastId'>
    </div>

    <div onclick="location.href='{{ session()->get('url') }}#end'">
        <x-button.fill-icon accent="1" circle="1" icon="send-fill" title="" size="14"
            type="submit" />
    </div>

    @component('components.tool.emojis', ['emojis' => $emojis])
    @endcomponent
</form>
<script>
    addToTextArea = function(emoji) {
        let message = document.getElementById("message");
        let start_position = message.selectionStart;
        let end_position = message.selectionEnd;

        message.value = `${message.value.substring(
    0,
        start_position
    )}${emoji}${message.value.substring(
        end_position,
        message.value.length
    )}`;
        console.log(emoji);
    };
</script>
