<section class="max-w-4xl mx-auto px-6 py-12">
    <!-- Hero -->
    <div class="rounded-xl overflow-hidden shadow-md mb-6">
        <img src="{{ url('storage/images/berita1.jpg') }}" alt="Judul Berita" class="w-full h-72 object-cover">
    </div>

    <!-- Judul & meta -->
    <h1 class="text-3xl md:text-4xl font-bold mb-2">Title News 1</h1>
    <p class="text-gray-500 text-sm mb-6">Dipublikasikan pada 30 September 2025 • Penulis: Admin</p>

    <!-- Isi Berita -->
    <article class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec
            feugiat nisl. Suspendisse potenti. Integer nec nisi sed lacus gravida
            feugiat.
        </p>
        <p>
            Aliquam erat volutpat. Vestibulum pharetra, ligula nec facilisis
            feugiat, magna libero tincidunt erat, nec condimentum risus magna eget
            urna.
        </p>
        <p>
            Curabitur porttitor, nisi in faucibus tempus, urna elit suscipit enim,
            non lacinia est justo ac metus.
        </p>
    </article>

    <!-- Tombol kembali -->
    <div class="mt-8">
        <a href="{{ url('/news') }}"
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
        <!-- Card 1 -->
        <div>
            <!-- Card Gambar -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <img src="{{ url('storage/images/berita1.jpg') }}" alt="Berita 1" class="w-full h-48 object-cover">
            </div>
            <!-- Teks di luar card -->
            <div class="mt-3">
                <h3 class="text-lg font-semibold mb-1">Title</h3>
            </div>
        </div>
        <!-- Card 2 -->
        <div>
            <!-- Card Gambar -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <img src="{{ url('storage/images/berita2.jpeg') }}" alt="Berita 1" class="w-full h-48 object-cover">
            </div>
            <!-- Teks di luar card -->
            <div class="mt-3">
                <h3 class="text-lg font-semibold mb-1">Title</h3>
            </div>
        </div>
        <!-- Card 3 -->
        <div>
            <!-- Card Gambar -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <img src="{{ url('storage/images/berita3.jpg') }}" alt="Berita 1" class="w-full h-48 object-cover">
            </div>
            <!-- Teks di luar card -->
            <div class="mt-3">
                <h3 class="text-lg font-semibold mb-1">Title</h3>
            </div>
        </div>
    </div>
</section>
