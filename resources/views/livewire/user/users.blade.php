<div class="grid grid-cols-1">
    <div class="p2 border border-primary-light bg-primary-light dark:border-primary-dark dark:bg-primary-dark">
        <x-text.h-three>{{ __('str.users') }}</x-text.h-three>
    </div>
    <ul class="grid grid-cols-1 gap-2 border border-primary-light dark:border-primary-dark">
        @foreach ($users as $user)
            <li class="{{ $loop->last ? '' : 'border-b' }} border-primary-light dark:border-primary-dark">
                <div class="flex items-center gap-2 p-2">
                    <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}"
                        class="h-10 w-10 rounded-full bg-accent">
                    <div class="grow font-extrabold">{{ $user->name }}</div>
                    <div class="text-sm">{{ $user->created_at->format('Y/m/d') }}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
