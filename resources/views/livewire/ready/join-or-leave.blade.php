<div class="fixed z-50 bottom-0 end-0 p-2">
    <div>
        <a class="hover:text-accent shadow-lg border-2 border-primary-light dark:border-primary-dark h-16 w-16 flex items-center justify-center text-primary-light dark:text-primary-dark hover:text-primary-dark dark:hover:text-primary-light cursor-pointer bg-accent-light dark:bg-accent-dark rounded-full hover:bg-primary-light dark:hover:bg-primary-dark"
        :class="$store.joinUser.isAnim?'animate-bounce':''" :title="$store.joinUser.isJoin?'{{ __('str.leave') }}':'{{ __('str.join') }}'"
        x-on:click='$store.joinUser.isJoinAlert()'>
        <i class="bi text-4xl" :class="$store.joinUser.isJoin?'bi-x':'bi-plus'"></i>
        </a>

        <div class="fixed start-0 end-0 w-full top-0 z-10" x-show="$store.joinUser.alert">
            <div class="bg-secondary-light shadow-lg flex items-center flex-col gap-4 dark:bg-secondary-dark w-full p-4 border-b border-accent-light dark:border-accent-dark">
                <div x-show="!$store.joinUser.isJoin">
                    <x-text.p>{{__('str.join_desc')}}</x-text.p>
                </div>
                <div x-show="$store.joinUser.isJoin">
                    <x-text.p>{{__('str.leave_desc')}}</x-text.p>
                </div>

                <div x-show="$store.joinUser.isUser" class="flex flex-col gap-4 items-center">
                <span class="text-warning-light dark:text-warning-dark">{{__('error.sign_in_first')}}</span>

                    <div class="flex gap-2 items-center">
                        <a class="w-fit" href="{{ route('sign-in') }}">
                            <x-button type="fill-accent" title="{{__('str.close')}}" text="{{__('not_seo.title_sign_in')}}"/>
                        </a>
                        <button class="w-fit" x-on:click="$store.joinUser.isJoinAlert()">
                            <x-button type="fill-primary" title="{{__('str.close')}}" text="" icon="x"/>
                        </button>
                    </div>
                </div>

                <div class="flex gap-2" x-show="!$store.joinUser.isUser">
                    <button class="w-fit" wire:click='joinOrleave'>
                        <div x-show="!$store.joinUser.isJoin"><x-button type="fill-accent" text="{{__('str.join')}}" icon="house-add-fill"/></div>
                        <div x-show="$store.joinUser.isJoin"><x-button type="fill-primary" text="{{__('str.leave')}}" icon="house-dash-fill"/></div>
                    </button>

                    <button class="w-fit" x-on:click="$store.joinUser.isJoinAlert()">
                        <x-button type="fill-primary" title="{{__('str.close')}}" text="" icon="x"/>
                    </button>
                </div>
            </div>
        </div>

        <script type="module">
            Alpine.store("joinUser", {
                isJoin: '{!!Auth::check()?Auth::user()->ready:false!!}',
                isUser: '{!!!Auth::check()!!}',
                alert: false,
                isAnim: true,
                isJoinAlert() {
                    this.alert = !this.alert;
                },
                init() {
                    setTimeout(() => {
                        this.isAnim = false;
                    }, 10000);
                }
            });
            Livewire.on('is-join', (event) => {
                Alpine.store('joinUser').isJoin = !event.isJoin;
                Alpine.store('joinUser').isJoinAlert();
            });
        </script>
    </div>
</div>
