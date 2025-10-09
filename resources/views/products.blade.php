<x-guest-layout :contacts="$contacts" :information="$information">
    <x-product.hero-product></x-product.hero-product>
    <x-product.filter-gear></x-product.filter-gear>
    <x-product.card-gear :products="$products"></x-product.card-gear>
</x-guest-layout>