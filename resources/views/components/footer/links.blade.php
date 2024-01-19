<div class="flex w-full flex-wrap justify-center gap-16 md:w-fit">
    {{-- Community --}}
    <ul class="text-center md:text-start">
        <li class="font-extrabold uppercase">
            {{ __('str.community') }}
        </li>
        <a href="{{ route('employees') }}">
            <x-button type="link"  text="{{ __('str.employees') }}"></x-button>
        </a>
        <a href="https://www.youtube.com/user/mustafa3dmax">
            <x-button type="link"
                text="Youtube"></x-button>
        </a>
        <a href="https://facebook.com/tuticle/">
            <x-button type="link"   text="Facebook"></x-button>
        </a>
    </ul>

    {{-- Legal --}}
    <ul class="text-center md:text-start">
        <li class="font-extrabold uppercase">
            {{ __('str.legal') }}
        </li>
        <a  href="{{ route('privacy-policy') }}">
            <x-button type="link"
            text="{{ __('str.privacy_policy') }}"></x-button>
        </a>
        <a   href="{{ route('terms-of-service') }}">
            <x-button type="link" text="{{ __('str.terms_of_use') }}"></x-button>
        </a>
    </ul>

    {{-- Help --}}
    <ul class="text-center md:text-start">
        <li class="font-extrabold uppercase">
            {{ __('str.social') }}
        </li>
        <a   href="http://m.me/tuticle">
            <x-button type="link"  text="Massenger"></x-button>
        </a>
        <a  href="https://wa.me/+9647707309366" >
            <x-button type="link"  text="Whatsapp"></x-button>
        </a>
    </ul>
</div>
</div>
