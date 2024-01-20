<div>
    <style>
        .split {
            height: 100vh;
        }

        .split>div {
            float: left;
            height: 100%;
        }

        .gutter {
            background-repeat: no-repeat;
            background-position: 50%;
        }

        .gutter.gutter-horizontal {
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAeCAYAAADkftS9AAAAIklEQVQoU2M4c+bMfxAGAgYYmwGrIIiDjrELjpo5aiZeMwF+yNnOs5KSvgAAAABJRU5ErkJggg==');
            cursor: col-resize;
        }

        .gutter.gutter-vertical {
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAFAQMAAABo7865AAAABlBMVEVHcEzMzMzyAv2sAAAAAXRSTlMAQObYZgAAABBJREFUeF5jOAMEEAIEEFwAn3kMwcB6I2AAAAAASUVORK5CYII=');
            cursor: row-resize;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/split.js/1.6.0/split.min.js"></script>

    <div class="split h-screen p-2 max-lg:hidden" dir="ltr">
        {{-- Broadcast --}}
        <div id="broadcast-h">
            <x-card.secondary>
                {{ $broadcast }}
            </x-card.secondary>
        </div>

        {{-- Chat --}}
        <div id="chat-h">
            <x-card.secondary>
                {{ $chat }}
            </x-card.secondary>
        </div>
    </div>

    <div class="h-screen p-2 lg:hidden">
        {{-- Broadcast --}}
        <div id="broadcast-v">
            <x-card.secondary>
                {{ $broadcast2 }}
            </x-card.secondary>
        </div>

        {{-- Chat --}}
        <div id="chat-v">
            <x-card.secondary>
                {{ $chat2 }}
            </x-card.secondary>
        </div>
    </div>

    <script>
        Split(['#broadcast-v', '#chat-v'], {
            direction: 'vertical',
        });

        Split(['#broadcast-h', '#chat-h']), {
            minSize: 1000,
        };
    </script>
</div>
