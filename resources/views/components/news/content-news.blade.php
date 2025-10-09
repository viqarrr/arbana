@props(['posts'])

<section class="bg-cover bg-center h-[60vh]"
    style="background-image: url('{{ url('storage/images/volcano-with-mist-sunset.jpg') }}');">
    <div class="bg-black/50 h-full flex items-center justify-center">
        <div class="text-center text-white px-6">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Posts
            </h1>
        </div>
    </div>
</section>

<section id="berita" class="max-w-7xl mx-auto md:px-6 py-12">
    <h2 class="text-2xl font-bold mb-6 text-center">Our Latest Posts</h2>


    <!-- Carousel Wrapper -->
    <div class="relative max-w-7xl md:overflow-x-hidden md:mx-auto p-4 md:px-6">
        <!-- Search -->
        <div class="px-2 md:flex mb-8">
            <input id="searchInput" type="text" placeholder="Cari berita..."
                class="sn:w-full md:w-50% md:w-1/2 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
        </div>
        <!-- Tombol Kiri -->
        <button id="prevBtn"
            class="hidden absolute -left-1 top-1/2 -translate-y-1/2 w-12 h-12 md:flex items-center justify-center text-amber-500 text-4xl z-10 hover:text-amber-400">
            <i class="fa-solid fa-circle-chevron-left"></i>
        </button>

        <!-- Isi Carousel -->
        <div
            class="carousel-wrapper flex gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth scrollbar-hide px-2">
            @foreach ($posts as $item)
                <div class="berita-card min-w-[280px] snap-start">
                    <!-- Card Gambar -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                            class="w-full h-48 object-cover">
                    </div>
                    <!-- Teks di luar card -->
                    <div class="mt-3">
                        <a href="{{ route('public-posts.show', $item->slug) }}"
                            class="berita-title text-lg font-semibold mb-1 block hover:text-amber-500 transition">
                            {{ $item->title }}
                        </a>
                        <p class="text-gray-600 text-sm line-clamp-2">
                            {{ Str::limit(strip_tags($item->content), 100, '...') }}
                        </p>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Tombol Kanan -->
        <button id="nextBtn"
            class="absolute hidden -right-1 top-1/2 -translate-y-1/2 w-12 h-12 md:flex items-center justify-center text-amber-500 text-4xl z-10 hover:text-amber-400">
            <i class="fa-solid fa-circle-chevron-right"></i>
        </button>
    </div>
</section>


<script>
    const wrapper = document.querySelector(".carousel-wrapper");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");

    const cardWidth = 1200; // lebar card + gap
    let autoScroll; // simpan interval

    // Fungsi geser ke kanan (looping)
    function scrollNext() {
        if (
            wrapper.scrollLeft + wrapper.clientWidth >=
            wrapper.scrollWidth - 10
        ) {
            // udah mentok kanan → balik ke kiri
            wrapper.scrollTo({
                left: 0,
                behavior: "smooth"
            });
        } else {
            wrapper.scrollBy({
                left: cardWidth,
                behavior: "smooth"
            });
        }
    }

    // Fungsi geser ke kiri (looping)
    function scrollPrev() {
        if (wrapper.scrollLeft <= 0) {
            // udah mentok kiri → loncat ke kanan
            wrapper.scrollTo({
                left: wrapper.scrollWidth,
                behavior: "smooth"
            });
        } else {
            wrapper.scrollBy({
                left: -cardWidth,
                behavior: "smooth"
            });
        }
    }

    // Tombol manual
    nextBtn.addEventListener("click", scrollNext);
    prevBtn.addEventListener("click", scrollPrev);

    // Auto scroll cuma aktif kalau layar >= 768px
    function initAutoScroll() {
        if (window.innerWidth >= 768) {
            autoScroll = setInterval(scrollNext, 3000); // tiap 3 detik geser
        } else {
            clearInterval(autoScroll);
        }
    }

    // Stop auto scroll
    function stopAutoScroll() {
        clearInterval(autoScroll);
    }

    // Jalankan saat load
    initAutoScroll();

    // Cek ulang kalau resize
    window.addEventListener("resize", () => {
        stopAutoScroll();
        initAutoScroll();
    });

    // Pause kalau hover
    wrapper.addEventListener("mouseenter", stopAutoScroll);
    wrapper.addEventListener("mouseleave", initAutoScroll);

    // =========================
    // SISTEM SEARCH
    // =========================
    const searchInput = document.getElementById("searchInput");
    const cards = document.querySelectorAll(".berita-card");

    searchInput.addEventListener("input", (e) => {
        const keyword = e.target.value.toLowerCase();

        cards.forEach((card) => {
            const title = card.querySelector(".berita-title").textContent.toLowerCase();
            if (title.includes(keyword)) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    });
</script>

<style>
    /* Hilangkan scrollbar biar lebih clean */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
