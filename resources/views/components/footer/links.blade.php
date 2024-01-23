<div class="flex w-full flex-wrap justify-center gap-16 md:w-fit">
    {{-- Legal --}}
    <ul class="flex flex-col md:items-start">
        <li class="font-extrabold uppercase p-2 text-center">
            {{ __('str.policy_and_terms') }}
        </li>
        <a  href="{{ route('privacy-policy') }}">
            <x-button type="link"
            text="{{ __('seo.title_privacy_policy') }}"></x-button>
        </a>
        <a   href="{{ route('terms-of-service') }}">
            <x-button type="link" text="{{ __('seo.title_terms_of_service') }}"></x-button>
        </a>
    </ul>

    {{-- Help --}}
    <ul class="flex flex-col md:items-end">
        <li class="font-extrabold uppercase p-2 text-center">
            {{ __('str.connect_us') }}
        </li>
        <a   href="mailto:example@max.com">
            <x-button type="link"  text="{{__('str.email')}}"></x-button>
        </a>
        <a  href="https://wa.me/+9647707309366" >
            <x-button type="link"  text="Whatsapp"></x-button>
        </a>
    </ul>
</div>
</div>
