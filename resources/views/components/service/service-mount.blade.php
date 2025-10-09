@props(['services'])

<!-- Daftar Layanan -->
<section id="layanan" class="max-w-7xl mx-auto px-6 py-16 space-y-24">
    @foreach ($services as $index => $service)
        <div class="grid md:grid-cols-2 gap-12 items-center">

            {{-- Gambar --}}
            <div class="{{ $index % 2 == 1 ? 'md:order-2' : '' }}">
                <img src="{{ asset('storage/' . $service['image']) }}" alt="{{ $service['title'] }}"
                    class="w-full h-80 object-cover rounded-lg shadow-lg">
            </div>

            {{-- Konten --}}
            <div class="{{ $index % 2 == 1 ? 'md:order-1' : '' }}">
                <h2 class="text-3xl font-bold mb-4">{{ $service['name'] }}</h2>
                <div
                    class="mb-4 text-gray-600 prose prose-ul:list-none prose-li:flex prose-li:items-start prose-li:gap-2 prose-li:before:content-['✔'] prose-li:before:text-green-500 prose-li:before:font-bold prose-li:ps-0 prose-ul:ps-0">
                    {!! $service->description !!}
                </div>


                <p class="font-bold text-xl text-amber-400 mb-4">Start from Rp
                    {{ number_format($service['price'], 0, ',', '.') }}</p>
                <a href="https://wa.me/6288994300480"
                    class="bg-amber-400 hover:bg-amber-400 text-white px-5 py-2 rounded-lg">
                    Order Now
                </a>
            </div>

        </div>
    @endforeach
</section>
