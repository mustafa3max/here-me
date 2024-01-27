@section('page-index')
    noindex
@endsection

@section('page-title')
    {{ __('seo.title_update_interests') }}
@endsection

@section('page-description')
    {{ __('seo.description_update_interests') }}
@endsection

<div>
<div class="grid grid-cols-1 gap-2" x-data="{ search: false, isSearch: false}">
    @livewire('ready.join-or-leave')
    <x-navbar.main />

    <x-containers.side side="1">
        <x-card.secondary>
            <div class="flex flex-col gap-2">
                <x-text.h-one>{{__('str.my_interests')}}</x-text.h-one>
                <x-text.p>{{__('not_seo.description_update_interests')}}</x-text.p>
                <ul class="flex flex-wrap gap-2">
                    @foreach ($interests as $interest)
                        <button :disabled="$store.interest.includes(1)&&'{{$interest->id}}'!=1" x-on:click="$store.interest.addInterest('{{$interest->id}}')" class="p-2 disabled:bg-secondary-light border border-primary-light disabled:text-primary-light dark:disabled:text-primary-dark dark:border-primary-dark dark:disabled:bg-secondary-dark font-extrabold hover:bg-accent-light dark:hover:bg-accent-dark hover:text-primary-light dark:hover:text-primary-dark grow text-center flex items-center justify-center gap-2" :class="$store.interest.includes('{{$interest->id}}')?'bg-accent-light dark:bg-accent-dark text-primary-light dark:text-primary-dark':'bg-primary-light dark:bg-primary-dark'">
                            <i class="bi" :class="$store.interest.includes('{{$interest->id}}')?'bi-x-lg':'bi-heart-fill'"></i>
                            {{__('interests.'.$interest->id)}}
                        </button>
                    @endforeach
                </ul>
                <div class="flex">
                <div class="grow cursor-pointer" wire:click='update($store.interest.interests)'>
                    <x-button type="fill-accent" text="{{__('str.update_my_interests')}}" icon="hearts"/>
                </div>
                <div class="w-12 h-12 flex items-center justify-center border border-s-0 border-accent-light dark:border-accent-dark bg-primary-light dark:bg-primary-dark" x-text="5-$store.interest.interests.length">
                </div>
            </div>
        </div>
        </x-card.secondary>
    </x-containers.side>

    <div wire:loading.delay>
        <x-tool.wite />
    </div>

    <x-tool.msg />
</div>

<script type="module">
    Alpine.store('interest', {
        interests: JSON.parse('{!!$myInterests!!}'),
        includes(interest) {
            return Alpine.store('interest').interests.includes(Number(interest));
        },
        addInterest(interest) {
            if(Alpine.store('interest').includes(interest)) {
                var index = Object.values(Alpine.store('interest').interests).indexOf(Number(interest));
                Alpine.store('interest').interests.splice(index, 1);
            }else {
                if(Alpine.store('interest').interests.length < 5) {
                    if(interest == 1) {
                        Alpine.store('interest').interests = [];
                    }
                    Alpine.store('interest').interests.push(Number(interest));
                }else {
                    alert("{!!__('str.max_interests')!!}");
                }
            }
        }
    });
</script>
</div>
