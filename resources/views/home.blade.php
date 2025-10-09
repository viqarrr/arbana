<x-guest-layout :contacts="$contacts" :information="$information">
    <x-home.hero :banners="$banners"></x-home.hero>
    <x-home.about :description="$aboutDescription" :featuredservices="$featuredServices"></x-home.about>
    <x-home.gallery :destinations="$popularDestinations"></x-home.gallery>
    {{-- <x-home.featured-trips :trips="$trips"></x-home.featured-trips> --}}
</x-guest-layout>
