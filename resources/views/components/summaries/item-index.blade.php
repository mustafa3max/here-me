<a href="{{ route('summary', ['title'=>$title]) }}" title="{{__('str.read_summary_now')}}" class="grid grid-cols-1 gap-2 border-2 border-secondary-light p-2 shadow-md dark:border-secondary-dark group relative hover:border-accent-light dark:hover:border-accent-dark">
    <div class="relative">
        <img src="{{ asset($data->poster) }}" alt="{{ $data->title }}" class="aspect-video object-cover text-center border-2 border-secondary-light dark:border-secondary-dark bg-secondary-light dark:bg-secondary-dark">
        <div class="absolute top-0 start-0 end-0 flex">
            <div class=" bg-secondary-light grow dark:bg-secondary-dark items-center w-fit p-2 text-sm font-extrabold bg-opacity-85 dark:bg-opacity-85">
                {{$data->updated_at->format('Y/m/d')}}
            </div>
            <div class="grow w-full"></div>
            <div class=" bg-secondary-light grow dark:bg-secondary-dark items-center w-fit p-2 text-sm font-extrabold bg-opacity-85 dark:bg-opacity-85">
                {{$sections[$data->sections[1]]}}
            </div>
        </div>
    </div>

    <div class="flex gap-2 flex-col bg-secondary-light grow dark:bg-secondary-dark items-center ps-1 pe-2 p-1">
        <x-text.h-two>{{$data->title}}</x-text.h-two>
        <div class=" border-primary-light dark:border-primary-dark border w-full"></div>
        <x-text.p>{{$data->description}}</x-text.p>
    </div>

    <x-button type="fill-accent" text="{{__('str.read_summary_now')}}" icon="film"/>
</a>
