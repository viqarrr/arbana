 <section class="bg-cover bg-center h-[60vh]"
     style="background-image: url('{{ url('storage/images/volcano-with-mist-sunset.jpg') }}');">
     <div class="bg-black/50 h-full flex items-center justify-center">
         <div class="text-center text-white px-6">
             <h1 class="text-4xl md:text-5xl font-bold mb-4">
                 News
             </h1>
         </div>
     </div>
 </section>

 <section id="berita" class="max-w-7xl mx-auto px-6 py-12">
  <h2 class="flex text-2xl font-bold mb-6 justify-center">New News</h2>

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
        <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum dignissim.</p>
      </div>
    </div>

    <!-- Card 2 -->
    <div>
      <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
        <img src="{{ url('storage/images/berita2.jpeg') }}" alt="Berita 2" class="w-full h-48 object-cover">
      </div>
      <div class="mt-3">
        <h3 class="text-lg font-semibold mb-1">Title</h3>
        <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum dignissim.</p>
      </div>
    </div>

    <!-- Card 3 -->
    <div>
      <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
        <img src="{{ url('storage/images/berita3.jpg') }}" alt="Berita 3" class="w-full h-48 object-cover">
      </div>
      <div class="mt-3">
        <h3 class="text-lg font-semibold mb-1">Title</h3>
        <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum dignissim.</p>
      </div>
    </div>
    <!-- Card 4 -->
    <div>
      <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
        <img src="{{ url('storage/images/berita4.jpg') }}" alt="Berita 3" class="w-full h-48 object-cover">
      </div>
      <div class="mt-3">
        <h3 class="text-lg font-semibold mb-1">Title</h3>
        <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum dignissim.</p>
      </div>
    </div>
    <!-- Card 5 -->
    <div>
      <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
        <img src="{{ url('storage/images/berita5.jpg') }}" alt="Berita 3" class="w-full h-48 object-cover">
      </div>
      <div class="mt-3">
        <h3 class="text-lg font-semibold mb-1">Title</h3>
        <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum dignissim.</p>
      </div>
    </div>
    <!-- Card 6 -->
    <div>
      <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
        <img src="{{ url('storage/images/berita6.webp') }}" alt="Berita 3" class="w-full h-48 object-cover">
      </div>
      <div class="mt-3">
        <h3 class="text-lg font-semibold mb-1">Title</h3>
        <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum dignissim.</p>
      </div>
    </div>

    <!-- Tambahin card lainnya dengan pola sama -->
  </div>
</section>
