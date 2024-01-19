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

 @vite(['resources/js/home.js'])

 <div x-data="{ select: [true, false, false, false] }"
     class="bg-primary-light font-almarai text-primary-dark dark:bg-primary-dark dark:text-primary-light">

     <nav class="fixed top-0 z-50 flex w-full items-center justify-center drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]">
         {{-- Nav Text --}}
         <div class="flex max-w-5xl flex-wrap items-center gap-4 max-md:hidden">
             <x-home.link-index id="0" index="0">{{ __('str.home') }}</x-home.link-index>
             <x-home.link-index id="1" index="1">{{ __('home_str.info1') }}</x-home.link-index>
             <x-home.link-index id="2" index="2">{{ __('home_str.info2') }}</x-home.link-index>
             <x-home.link-index id="3" index="3">{{ __('home_str.info3') }}</x-home.link-index>
         </div>

         {{-- Nav Icon --}}
         <div class="flex max-w-5xl flex-wrap items-center gap-4 md:hidden">
             <x-home.link-index-icon id="0" index="0" title="{{ __('str.home') }}" />
             <x-home.link-index-icon id="1" index="1" title="{{ __('home_str.info1') }}" />
             <x-home.link-index-icon id="2" index="2" title="{{ __('home_str.info2') }}" />
             <x-home.link-index-icon id="3" index="3" title="{{ __('home_str.info3') }}" />
         </div>
     </nav>

     {{-- Home --}}
     <div class="relative h-screen bg-accent-light bg-index-header bg-center dark:bg-accent-dark" id="0">
         <video autoplay loop muted poster="{{ asset('assets/images/bg_image_home.webp') }}"
             class="absolute h-screen w-full object-cover max-lg:hidden">
             <source src="{{ asset('assets/videos/bg_video_home.mp4') }}" type="video/mp4">
         </video>
         <div
             class="flex h-full items-center justify-center text-primary-light drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]">
             <div class="absolute bottom-0 left-0 right-0 top-0 bg-primary-dark opacity-30">
             </div>
             <div class="z-10 p-2">
                 <h1 class="text-center text-3xl font-extrabold">
                     <span class="uppercase">{{ config('app.name') }}</span>
                     <br>
                     <br>
                     {{ __('seo.title_home') }}
                 </h1>
                 <br>
                 <br>
                 <a href="{{ route('employees') }}"
                     class="block animate-pulse text-center text-xl font-bold uppercase hover:underline">{{ __('str.live_broadcast') }}</a>
             </div>
             <a href="#1" class="absolute bottom-0 animate-bounce p-2 shadow-sm" title="{{ __('str.go_info') }}"
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
                     <img src="{{ asset('assets/images/home_1.svg') }}" alt="{{ __('home_str.title_1') }}">
                 </div>
                 <div class="h-full w-0.5 bg-secondary-light dark:bg-secondary-dark"></div>
             </div>
             {{-- Info --}}
             <div class="flex min-h-screen w-2/4 items-center justify-center px-8 pb-16 pt-32 max-md:w-full">
                 <div class="text-center md:text-start">
                     <h2 class="pb-4 text-2xl font-bold">{{ __('home_str.title_1') }}</h2>
                     <p class="text-xl leading-9">{{ __('home_str.description_1') }}</p>
                     <div class="pt-4">
                         <a href="{{ route('employees') }}"
                             class="animate-pulse text-lg font-bold uppercase text-accent-light hover:underline dark:text-accent-dark">{{ __('str.live_broadcast') }}</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     {{-- Screen 2 --}}
     <div class="min-h-screen" id="2">
         <div class="flex flex-wrap">
             {{-- Info --}}
             <div class="flex min-h-screen w-2/4 items-center justify-center px-8 pb-16 pt-32 max-md:w-full">
                 <div class="text-center md:text-start">
                     <h2 class="pb-4 text-2xl font-bold">{{ __('home_str.title_2') }}</h2>
                     <p class="text-xl leading-9">{{ __('home_str.description_2') }}</p>
                     <div class="pt-4">
                         <a href="{{ route('employees') }}"
                             class="animate-pulse text-lg font-bold uppercase text-accent-light hover:underline dark:text-accent-dark">{{ __('str.live_broadcast') }}</a>
                     </div>
                 </div>
             </div>
             {{-- Image --}}
             <div class="flex min-h-screen w-2/4 pb-16 pt-32 max-md:hidden">
                 <div class="h-full w-0.5 bg-secondary-light dark:bg-secondary-dark"></div>
                 <div class="flex grow items-center justify-center p-16">
                     <img src="{{ asset('assets/images/home_2.svg') }}" alt="{{ __('home_str.title_2') }}">
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
                     <img src="{{ asset('assets/images/home_3.svg') }}" alt="{{ __('home_str.title_3') }}">
                 </div>
                 <div class="h-full w-0.5 bg-secondary-light dark:bg-secondary-dark"></div>
             </div>
             {{-- Info --}}
             <div class="flex min-h-screen w-2/4 items-center justify-center px-8 pb-16 pt-32 max-md:w-full">
                 <div class="text-center md:text-start">
                     <h2 class="pb-4 text-2xl font-bold">{{ __('home_str.title_3') }}</h2>
                     <p class="text-xl leading-9">{{ __('home_str.description_3') }}</p>
                     <div class="pt-4">
                         <a href="{{ route('employees') }}"
                             class="animate-pulse text-lg font-bold uppercase text-accent-light hover:underline dark:text-accent-dark">{{ __('str.live_broadcast') }}</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <script src="{{ asset('js/home.js') }}"></script>
 </div>
