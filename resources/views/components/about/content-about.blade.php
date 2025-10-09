@props(['history', 'excellence'])

@php
    $html = $excellence->paragraph;

    $html = preg_replace_callback(
        '/<li>(.*?)<\/li>/s',
        function ($matches) {
            $content = trim($matches[1]);
            return '
        <li class="flex items-start gap-3 text-secondary">
            <span class="text-green-400 text-xl">✔</span>
            <span>' .
                $content .
                '</span>
        </li>';
        },
        $html,
    );

    $html = str_replace('<ul>', '<ul class="space-y-4 ps-0">', $html);
@endphp

<!-- Our Story -->
<section class="bg-neutral-100 text-neutral-900 py-16 px-6">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
        <!-- Text -->
        <div>
            <h2 class="text-3xl md:text-4xl font-bold mb-6">{{ $history->heading }}</h2>
            <div class="text-lg prose prose-lg text-neutral-900">
                {!! $history->paragraph !!}
            </div>
        </div>

        <!-- Image -->
        <div class="relative">
            <img src="{{ asset('storage/' . $history->image) }}" alt="{{ $history->heading }}"
                class="rounded-2xl shadow-xl w-full h-[400px] object-cover" />
        </div>
    </div>
</section>

<!-- About Content -->
<section class="max-w-6xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-12 items-center">
    <!-- Image -->
    <div class="relative">
        <img src="{{ asset('storage/' . $excellence->image) }}" alt="{{ $excellence->heading }}"
            class="rounded-2xl shadow-lg w-full h-[400px] object-cover" />
    </div>
    <!-- Text -->
    <div>
        <h2 class="text-3xl md:text-4xl font-bold mb-6 text-secondary">
            {{ $excellence->heading }}
        </h2>
        <div class="text-lg prose prose-lg ps-0 text-secondary leading-relaxed">
            {!! $html !!}
        </div>  
    </div>
</section>

<!-- Call to Action -->
<section class="bg-gradient-to-r bg-primary py-16 text-center text-neutral-900">
    <h2 class="text-3xl md:text-4xl font-bold mb-4">
        Ready Start Journey With Us
    </h2>
    <p class="max-w-2xl mx-auto mb-8 text-lg">
        Be part of the thousands who have witnessed the magic of Mount Bromo. Reserve your journey today and craft
        stories to remember forever.
    </p>
    <a href="/"
        class="bg-neutral-900 text-white px-6 py-3 rounded-full font-medium hover:bg-neutral-800 transition">
        Start Journey
    </a>
</section>
