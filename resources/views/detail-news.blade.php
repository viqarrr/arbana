<x-guest-layout :contacts="$contacts" :information="$information">
    <section class="max-w-4xl mx-auto px-6 pt-24 pb-12">
        <!-- Hero -->
        <div class="rounded-xl overflow-hidden shadow-md mb-6">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full object-cover">
        </div>

        <!-- Judul & meta -->
        <h1 class="text-3xl md:text-4xl font-bold mb-2">{{ $post->title }}</h1>
        <p class="text-gray-500 text-sm mb-6">
            Dipublikasikan pada {{ $post->created_at->translatedFormat('d F Y') }}
            • Penulis: {{ $post->author ?? 'Admin' }}
        </p>

        <!-- Isi Berita -->
        <article class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
            {!! $post->content !!}
        </article>

        <!-- Tombol kembali -->
        <div class="mt-8">
            <a href="{{ url('/posts') }}"
                class="inline-flex items-center gap-2 bg-amber-400 px-5 py-2 rounded-full shadow-lg hover:bg-amber-600 hover:scale-105 transition duration-300 ease-in-out">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Kembali ke daftar berita</span>
            </a>
        </div>

    </section>

    <!-- Rekomendasi Berita -->
    <section class="max-w-4xl px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto py-3">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Berita Lainnya</h2>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach ($otherPosts as $other)
                <a href="{{ route('public-posts.show', $other->slug) }}" class="block">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="{{ asset('storage/' . $other->image) }}" alt="{{ $other->title }}"
                            class="w-full h-48 object-cover">
                    </div>
                    <div class="mt-3">
                        <h3 class="text-lg font-semibold mb-1">{{ $other->title }}</h3>
                        <p class="text-gray-600 text-sm line-clamp-2">
                            {{ Str::limit(strip_tags($other->content), 100, '...') }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
</x-guest-layout>
