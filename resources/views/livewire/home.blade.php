 @section('page-title')
     {{ __('seo.title_home') }}
 @endsection

 @section('page-description')
     {{ __('seo.description_home') }}
 @endsection

 @push('scripts-schema')
     <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('assets/images/logo.svg') }}"
    }
    </script>
 @endpush

 <div>

 <div x-data="{ select: [true, false, false, false] }"
     class="bg-primary-light font-almarai text-primary-dark dark:bg-primary-dark dark:text-primary-light">

     <nav class="fixed top-0 z-50 flex w-full items-center justify-center drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]">
         {{-- Nav Text --}}
         <div class="flex max-w-5xl flex-wrap items-center gap-4 max-md:hidden">
             <x-home.link-index id="0" index="0">{{ __('home.home') }}</x-home.link-index>
             <x-home.link-index id="1" index="1">{{ __('home.info1') }}</x-home.link-index>
             <x-home.link-index id="2" index="2">{{ __('home.info2') }}</x-home.link-index>
             <x-home.link-index id="3" index="3">{{ __('home.info3') }}</x-home.link-index>
         </div>

         {{-- Nav Icon --}}
         <div class="flex max-w-5xl flex-wrap items-center gap-4 md:hidden">
             <x-home.link-index-icon id="0" index="0" title="{{ __('home.home') }}" />
             <x-home.link-index-icon id="1" index="1" title="{{ __('home.info1') }}" />
             <x-home.link-index-icon id="2" index="2" title="{{ __('home.info2') }}" />
             <x-home.link-index-icon id="3" index="3" title="{{ __('home.info3') }}" />
         </div>
     </nav>

     {{-- Home --}}
     <div class="relative h-screen bg-accent-light bg-index-header bg-center dark:bg-accent-dark dark:bg-opacity-10" id="0">
         <video autoplay loop muted poster="{{ asset('assets/images/bg_image_home.webp') }}"
             class="absolute h-screen w-full object-cover">
             <source src="{{ asset('assets/videos/bg_video_home.mp4') }}" type="video/mp4">
         </video>
         <div
             class="flex h-full items-center justify-center text-primary-light drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]">
             <div class="absolute bottom-0 left-0 right-0 top-0 bg-primary-dark opacity-30">
             </div>
             <div class="z-10 p-2 flex flex-col gap-16">
                 <x-text.h-one>
                     <span class="uppercase">{{ config('app.name') }}</span>
                     <br>
                     <br>
                     {{ __('seo.title_home') }}
                 </x-text.h-one>
                 <a href="{{ route('readies') }}" class="animate-pulse w-fit block m-auto">
                    <x-button type="fill-accent" text="{{ __('home.chat_fun') }}"/>
                </a>
             </div>
             <a href="#1" class="absolute bottom-0 animate-bounce p-2 shadow-sm" title="{{ __('home.go_info') }}"
                 x-on:click="select[0]=false;select[1]=true;select[2]=false;select[3]=false;"><i
                     class="bi bi-caret-down-fill"></i></a>
         </div>

     </div>

     {{-- Screen 1 --}}
     <div class="min-h-screen" id="1">
         <div class="flex flex-wrap">
             {{-- Image --}}
             <div class="flex min-h-screen w-2/4 pb-16 pt-32 max-md:hidden">
                 <div class="flex grow items-center justify-center">
                     <img src="{{ asset('assets/images/home_1.svg') }}" alt="{{ __('home.title_1') }}">
                 </div>
                 <div class="h-full w-0.5 bg-secondary-light dark:bg-secondary-dark"></div>
             </div>
             {{-- Info --}}
             <div class="flex min-h-screen w-2/4 items-center justify-center px-8 pb-16 pt-32 max-md:w-full">
                 <div class="text-center md:text-start flex flex-col gap-4">

                    <div class="flex items-center justify-center pb-12 md:hidden"><i class="bi bi-heart-fill text-8xl"></i></div>

                    <h2 class="text-2xl font-bold">{{ __('home.title_1') }}</h2>
                    <p class="text-xl leading-9">{{ __('home.description_1') }}</p>

                    <a href="{{ route('readies') }}" class="animate-pulse w-fit block max-md:m-auto">
                        <x-button type="fill-accent" text="{{ __('home.chat_fun') }}"/>
                    </a>
                 </div>
             </div>
         </div>
     </div>

     {{-- Screen 2 --}}
     <div class="min-h-screen" id="2">
         <div class="flex flex-wrap">
             {{-- Info --}}
             <div class="flex min-h-screen w-2/4 items-center justify-center px-8 pb-16 pt-32 max-md:w-full">
                <div class="text-center md:text-start flex flex-col gap-4">

                   <div class="flex items-center justify-center pb-12 md:hidden"><i class="bi bi-wifi text-8xl"></i></div>

                   <h2 class="text-2xl font-bold">{{ __('home.title_2') }}</h2>
                   <p class="text-xl leading-9">{{ __('home.description_2') }}</p>

                   <a href="{{ route('readies') }}" class="animate-pulse w-fit block max-md:m-auto">
                       <x-button type="fill-accent" text="{{ __('home.chat_fun') }}"/>
                   </a>
                </div>
            </div>
             {{-- Image --}}
             <div class="flex min-h-screen w-2/4 pb-16 pt-32 max-md:hidden">
                 <div class="h-full w-0.5 bg-secondary-light dark:bg-secondary-dark"></div>
                 <div class="flex grow items-center justify-center p-16">
                     <img src="{{ asset('assets/images/home_2.svg') }}" alt="{{ __('home.title_2') }}">
                 </div>
             </div>
         </div>
     </div>

     {{-- Screen 3 --}}
     <div class="min-h-screen" id="3">
         <div class="flex flex-wrap">
             {{-- Image --}}
             <div class="flex min-h-screen w-2/4 pb-16 pt-32 max-md:hidden">
                 <div class="flex grow items-center justify-center">
                     <img src="{{ asset('assets/images/home_3.svg') }}" alt="{{ __('home.title_3') }}">
                 </div>
                 <div class="h-full w-0.5 bg-secondary-light dark:bg-secondary-dark"></div>
             </div>
             {{-- Info --}}
             <div class="flex min-h-screen w-2/4 items-center justify-center px-8 pb-16 pt-32 max-md:w-full">
                <div class="text-center md:text-start flex flex-col gap-4">

                   <div class="flex items-center justify-center pb-12 md:hidden"><i class="bi bi-lock-fill text-8xl"></i></div>

                   <h2 class="text-2xl font-bold">{{ __('home.title_3') }}</h2>
                   <p class="text-xl leading-9">{{ __('home.description_3') }}</p>

                   <a href="{{ route('readies') }}" class="animate-pulse w-fit block max-md:m-auto">
                       <x-button type="fill-accent" text="{{ __('home.chat_fun') }}"/>
                   </a>
                </div>
            </div>
         </div>
     </div>

 </div>

@vite('resources/js/home.js')
</div>
