@extends('errors::layout')

@section('page-title')
    {{ __('not_seo.title_server_rrror') }}
@endsection
@section('page-description')
    {{ __('not_seo.description_server_rrror') }}
@endsection

@section('page')
    <div class="flex flex-col gap-2">
        <img :src="darkMode?'{{ asset('assets/images/error-404-dark.svg') }}':'{{ asset('assets/images/error-404-light.svg') }}'" alt="404 {{ __('not_seo.title_404') }}">

        <x-text.h-one>{{ __('not_seo.title_404') }}</x-text.h-one>
        <x-text.p>{{ __('not_seo.description_404') }}</x-text.p>

        <div class="flex justify-center">
            <a href="{{ route('summaries') }}" class="w-fit">
                <x-button type="fill-accent" text="{{ __('str.home') }}"/>
            </a>
        </div>
    </div>
@endsection
