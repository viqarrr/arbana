<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="">

    <title>Private Detail</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Spicy+Rice&display=swap"
        rel="stylesheet" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- CDN Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" />
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js"></script>
    
    <link rel="icon" type="image/png" href="https://arbanaoutdoor.com/storage/images/arbana%20outdoor%20real.png">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-gray-50 font-sans text-gray-800" style="overflow-x: hidden;">
    <!-- Navigation Bar -->
    <x-navbar></x-navbar>
    <x-chat-bot></x-chat-bot>
    <x-feedback></x-feedback>

    <div class="flex justify-center my-9">
    <div class="relative w-[1100px] h-[500px]">
      <div class="swiper mySwiper w-full h-full rounded-xl shadow-lg">
        <div class="swiper-wrapper">
          <div class="swiper-slide"><img src="{{Asset('storage/images/kook2.jpg')}}" alt="Panorama Gunung Argapuro" class="w-full h-full object-cover rounded-xl"/></div>
          <div class="swiper-slide"><img src="{{Asset('storage/images/kook1.jpg')}}" alt="Gunung Argapuro" class="w-full h-full object-cover rounded-xl"/></div>
          <div class="swiper-slide"><img src="{{Asset('storage/images/kook4.jpg')}}" alt="Gunung Semeru" class="w-full h-full object-cover rounded-xl"/></div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>

  <main class="max-w-screen-xl mx-auto p-4">
    <div class="w-full flex justify-center">
      <div class="space-y-6 w-full md:w-5/6 lg:w-4/5 mx-auto">
        
        <!-- Pilih Tipe Tour -->
        <div class="bg-white p-6 rounded-xl shadow">
          <h3 class="text-xl font-bold mb-4 text-gray-800">Pilih Tipe Trip</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="tourTypeContainer">
            <div class="tour-type-card border-2 border-blue-500 p-4 rounded-lg cursor-pointer hover:shadow-lg transition" data-type="private">
              <h4 class="font-semibold text-center">Private Trip</h4>
              <p class="text-sm text-gray-600 text-center mt-2">Eksklusif untuk grup Anda</p>
            </div>
            <div class="tour-type-card border-2 border-gray-200 p-4 rounded-lg cursor-pointer hover:shadow-lg transition" data-type="family">
              <h4 class="font-semibold text-center">Family Gathering</h4>
              <p class="text-sm text-gray-600 text-center mt-2">Cocok untuk acara keluarga</p>
            </div>
            <!--<div class="tour-type-card border-2 border-gray-200 p-4 rounded-lg cursor-pointer hover:shadow-lg transition" data-type="camp">-->
            <!--  <h4 class="font-semibold text-center">Camp Ground</h4>-->
            <!--  <p class="text-sm text-gray-600 text-center mt-2">Camping dengan fasilitas lengkap</p>-->
            <!--</div>-->
          </div>
        </div>

        <!-- Judul + Jadwal -->
        
        <!-- Info Detail -->
        <div class="bg-white p-6 rounded-xl shadow  gap-3 text-center">
            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold" id="tourTypeBadge">Private Trip</span>
          <h2 class="text-4xl font-bold mt-4 text-center">Argapuro</h2>
          <hr class="my-6 border-gray-300">
          <div class="grid grid-cols-2 md:grid-cols-3">
              <div><p class="font-semibold">Lokasi</p><p class="text-sm text-gray-600">Jawa Timur</p></div>
              <div><p class="font-semibold">Titik Kumpul</p><p class="text-sm text-gray-600">Banyuwangi</p></div>
              <div><p class="font-semibold">MDPL</p><p class="text-sm text-gray-600">3.088 mdpl</p></div>
          </div>
        </div>

        <!-- Sekilas Destinasi -->
        <div class="bg-white p-6 rounded-xl shadow">
          <h3 class="font-semibold mb-2">Sekilas Destinasi</h3>
          <p class="text-gray-700 text-sm">
            Nikmati pengalaman wisata mendaki Gunung Argapuro. Dalam tur sehari ini, Anda akan diajak ...
          </p>
        </div>

        <!-- Peraturan -->
        <div class="bg-white p-6 rounded-xl shadow mt-6">
          <h3 class="text-xl font-bold mb-4">Peraturan Pendakian Argopuro</h3>
          <ul class="list-disc pl-6 space-y-2 text-gray-700 text-sm">
            <li>Peserta wajib menjaga kebersihan dan tidak meninggalkan sampah di jalur pendakian.</li>
            <li>Dilarang merusak flora, fauna, atau fasilitas umum di kawasan gunung.</li>
            <li>Wajib mengikuti arahan guide selama pendakian berlangsung.</li>
            <li>Peserta dengan kondisi kesehatan tertentu wajib melapor sebelum keberangkatan.</li>
            <li>Dilarang membawa minuman beralkohol, narkoba, atau senjata tajam yang berbahaya.</li>
            <li>Gunakan perlengkapan pendakian standar untuk keamanan diri.</li>
          </ul>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-lg mt-6">
            <h3 class="text-xl font-bold mb-4 text-gray-800">Pilih Tanggal & Jumlah Orang</h3>
          
            <div class="flex flex-col gap-6">
              
              <!-- Input tanggal -->
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input 
                  type="text" 
                  id="startDate" 
                  placeholder="Tanggal Mulai" 
                  class="border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 px-4 py-2 rounded-lg w-full transition"
                />
                <input 
                  type="text" 
                  id="endDate" 
                  placeholder="Tanggal Berakhir" 
                  class="border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 px-4 py-2 rounded-lg w-full transition"
                />
              </div>
          
              <!-- Jumlah anggota -->
              <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <span class="font-semibold text-gray-800 mb-2 md:mb-0">Jumlah Orang:</span>
                <div class="flex items-center gap-3">
                  <button id="decrease-member" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold w-10 h-10 rounded-full transition">-</button>
                  <span id="member-count" class="font-semibold text-gray-800 min-w-[80px] text-center">1 orang</span>
                  <button id="increase-member" class="bg-blue-500 hover:bg-blue-600 text-white font-bold w-10 h-10 rounded-full transition">+</button>
                </div>
              </div>
            </div>
          </div>
        <h2 class="text-2xl font-bold mb-4">Pilih Paket</h2>
        <div id="paketContainer" class="grid grid-cols-1 md:grid-cols-3 gap-6"></div>

        <!-- Detail Paket -->
        <div id="paketDetail" class="hidden mt-6"></div>
        <!--<div class="bg-white p-6 rounded-xl shadow">-->
        <!--  <div class="bg-white p-6 rounded-2xl shadow-lg mt-6">-->
        <!--    <h3 class="text-xl font-bold mb-4 text-gray-800">Pilih Tanggal & Jumlah Orang</h3>-->
          
        <!--    <div class="flex flex-col gap-6">-->
              
              <!-- Input tanggal -->
        <!--      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">-->
        <!--        <input -->
        <!--          type="text" -->
        <!--          id="startDate" -->
        <!--          placeholder="Tanggal Mulai" -->
        <!--          class="border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 px-4 py-2 rounded-lg w-full transition"-->
        <!--        />-->
        <!--        <input -->
        <!--          type="text" -->
        <!--          id="endDate" -->
        <!--          placeholder="Tanggal Berakhir" -->
        <!--          class="border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 px-4 py-2 rounded-lg w-full transition"-->
        <!--        />-->
        <!--      </div>-->
          
              <!-- Jumlah anggota -->
        <!--      <div class="flex flex-col md:flex-row md:items-center md:justify-between">-->
        <!--        <span class="font-semibold text-gray-800 mb-2 md:mb-0">Jumlah Orang:</span>-->
        <!--        <div class="flex items-center gap-3">-->
        <!--          <button id="decrease-member" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold w-10 h-10 rounded-full transition">-</button>-->
        <!--          <span id="member-count" class="font-semibold text-gray-800 min-w-[80px] text-center">1 orang</span>-->
        <!--          <button id="increase-member" class="bg-blue-500 hover:bg-blue-600 text-white font-bold w-10 h-10 rounded-full transition">+</button>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->

        <!-- Produk Additional -->
        <div class="bg-white p-6 rounded-xl shadow mt-6">
          <h3 class="text-xl font-bold mb-4">Alat Tambahan</h3>

          <input type="checkbox" id="toggle-products" class="peer hidden">
          <label for="toggle-products" class="flex justify-between items-center p-3 border rounded-lg cursor-pointer">
            <span class="font-semibold text-gray-800">Lihat Daftar Produk</span>
            <span class="transition-transform duration-300 peer-checked:rotate-90">➤</span>
          </label>

          <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[500px] peer-checked:mt-4 space-y-3">
            <!-- Tripod -->
            <div class="border rounded-xl p-4 shadow-sm">
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="check-tripod" onchange="BookingSystem.toggleProduct('tripod')" class="w-5 h-5 border-2 border-indigo-500">
                  <label for="check-tripod" class="font-semibold text-gray-800">Tripod</label>
                </div>
                <div id="detail-tripod" class="flex items-center gap-4 hidden">
                  <div class="flex items-center gap-2">
                    <button onclick="BookingSystem.changeQty('tripod',-1)" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                    <span id="qty-item-tripod" class="w-6 text-center font-semibold">1</span>
                    <button onclick="BookingSystem.changeQty('tripod',1)" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                  </div>
                  <span id="price-tripod" class="text-green-600 font-bold">Rp 0</span>
                </div>
              </div>
            </div>

            <!-- Lampu -->
            <div class="border rounded-xl p-4 shadow-sm">
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="check-lampu" onchange="BookingSystem.toggleProduct('lampu')" class="w-5 h-5 border-2 border-indigo-500">
                  <label for="check-lampu" class="font-semibold text-gray-800">Lampu</label>
                </div>
                <div id="detail-lampu" class="flex items-center gap-4 hidden">
                  <div class="flex items-center gap-2">
                    <button onclick="BookingSystem.changeQty('lampu',-1)" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                    <span id="qty-item-lampu" class="w-6 text-center font-semibold">1</span>
                    <button onclick="BookingSystem.changeQty('lampu',1)" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                  </div>
                  <span id="price-lampu" class="text-green-600 font-bold">Rp 0</span>
                </div>
              </div>
            </div>

            <!-- Matras -->
            <div class="border rounded-xl p-4 shadow-sm">
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="check-matras" onchange="BookingSystem.toggleProduct('matras')" class="w-5 h-5 border-2 border-indigo-500">
                  <label for="check-matras" class="font-semibold text-gray-800">Matras</label>
                </div>
                <div id="detail-matras" class="flex items-center gap-4 hidden">
                  <div class="flex items-center gap-2">
                    <button onclick="BookingSystem.changeQty('matras',-1)" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                    <span id="qty-item-matras" class="w-6 text-center font-semibold">1</span>
                    <button onclick="BookingSystem.changeQty('matras',1)" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                  </div>
                  <span id="price-matras" class="text-green-600 font-bold">Rp 0</span>
                </div>
              </div>
            </div>

            <!-- Kompor -->
            <div class="border rounded-xl p-4 shadow-sm">
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <input type="checkbox" id="check-kompor" onchange="BookingSystem.toggleProduct('kompor')" class="w-5 h-5 border-2 border-indigo-500">
                  <label for="check-kompor" class="font-semibold text-gray-800">Kompor</label>
                </div>
                <div id="detail-kompor" class="flex items-center gap-4 hidden">
                  <div class="flex items-center gap-2">
                    <button onclick="BookingSystem.changeQty('kompor',-1)" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                    <span id="qty-item-kompor" class="w-6 text-center font-semibold">1</span>
                    <button onclick="BookingSystem.changeQty('kompor',1)" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                  </div>
                  <span id="price-kompor" class="text-green-600 font-bold">Rp 0</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Ringkasan Pesanan -->
        <div class="bg-white p-6 rounded-xl shadow mt-6" id="ringkasan-pesanan">
          <h3 class="text-xl font-bold mb-4">Ringkasan Pesanan</h3>

          <div id="summary-list" class="flex flex-col space-y-2 text-sm text-gray-700 mb-4">
            <!-- Summary items akan muncul di sini -->
          </div>

          <div class="border-t pt-4 mt-4">
            <div class="flex justify-between items-center text-lg font-bold">
              <span>Total:</span>
              <span id="total-price">Rp 0</span>
            </div>
          </div>

          <div class="flex justify-end mt-4">
            <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Book Now</button>
          </div>
        </div>
      </div>
    </div>
  </main>

    <!-- Footer -->
    <x-footer></x-footer>

    <!-- Swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- GSAP Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <script>
        // ====== BOOKING SYSTEM CLASS ======
        class BookingSystem {
          constructor() {
            this.tourType = 'private';
            this.selectedPaket = 'hemat';
            this.memberCount = 1;
            this.startDate = null;
            this.endDate = null;
            this.selectedProducts = {};
            // Tambahan untuk Porter/Guide selection
            this.selectedService = null; // 'porter' atau 'guide'
            
            this.paketData = {
              private: {
                hemat: {
                  include: ["Transportasi PP", "Makan 3x", "Tiket masuk wisata"],
                  exclude: ["Pengeluaran pribadi", "Sewa perlengkapan pribadi"],
                  price: 250000
                },
                reguler: {
                  include: ["Transportasi PP", "Makan 3x", "Tiket masuk wisata", "Gratis Sewa 1 tenda", "Porter dan Guide tersedia (Pilih Salah  satu)"],
                  exclude: ["Pengeluaran pribadi", "Alat pribadi tambahan diluar paket"],
                  price: 360000
                },
                kombo: {
                  include: ["Transportasi PP", "Makan 3x", "Tiket masuk wisata", "Gratis Sewa 1 tenda", "Porter & Guide termasuk paket"],
                  exclude: ["Pengeluaran pribadi", "Sewa perlengkapan pribadi", "Biaya tambahan diluar paket"],
                  price: 700000
                }
              },
              family: {
                hemat: {
                  include: ["Transportasi PP", "Makan 4x", "Tiket masuk wisata", "Aktivitas keluarga"],
                  exclude: ["Pengeluaran pribadi", "Sewa perlengkapan pribadi"],
                  price: 300000
                },
                reguler: {
                  include: ["Transportasi PP", "Makan 4x", "Tiket masuk wisata", "Aktivitas keluarga", "Guide keluarga", "Dokumentasi"],
                  exclude: ["Pengeluaran pribadi", "Alat pribadi tambahan"],
                  price: 450000
                },
                kombo: {
                  include: ["Transportasi PP", "Makan 4x", "Tiket masuk wisata", "Aktivitas keluarga", "Guide keluarga", "Dokumentasi", "Tenda keluarga", "Peralatan camping"],
                  exclude: ["Pengeluaran pribadi", "Biaya tambahan diluar paket"],
                  price: 800000
                }
              },
              camp: {
                hemat: {
                  include: ["Tempat camping", "Fasilitas MCK", "Api unggun", "Sewa tenda dasar"],
                  exclude: ["Makanan", "Transportasi", "Peralatan pribadi"],
                  price: 150000
                },
                reguler: {
                  include: ["Tempat camping", "Fasilitas MCK", "Api unggun", "Sewa tenda", "Makan 2x", "Peralatan camping"],
                  exclude: ["Transportasi", "Peralatan pribadi tambahan"],
                  price: 280000
                },
                kombo: {
                  include: ["Tempat camping", "Fasilitas MCK", "Api unggun", "Sewa tenda premium", "Makan 3x", "Peralatan camping lengkap", "Guide camping"],
                  exclude: ["Transportasi", "Biaya tambahan diluar paket"],
                  price: 450000
                }
              }
            };
        
            // Harga produk additional per hari dengan diskon untuk hari lebih banyak
            this.productPrices = {
              tripod: { 1: 15000, 2: 12000, 3: 10000 },
              lampu: { 1: 10000, 2: 8000, 3: 6000 },
              matras: { 1: 10000, 2: 8000, 3: 6000 },
              kompor: { 1: 20000, 2: 16000, 3: 13000 }
            };
        
            this.init();
          }
        
          init() {
            this.setupEventListeners();
            this.setupDatePickers();
            this.renderPackages();
            this.showPackageDetail('hemat');
            this.updateSummary();
          }
        
          setupEventListeners() {
            // Menu mobile
            const menuBtn = document.getElementById("menu-btn");
            const mobileMenu = document.getElementById("mobile-menu");
            if (menuBtn && mobileMenu) {
              menuBtn.addEventListener("click", () => mobileMenu.classList.toggle("hidden"));
            }
        
            // Tour type selection
            document.querySelectorAll('.tour-type-card').forEach(card => {
              card.addEventListener('click', () => {
                this.selectTourType(card.dataset.type);
              });
            });
        
            // Member count
            const increaseBtn = document.getElementById('increase-member');
            const decreaseBtn = document.getElementById('decrease-member');
            
            if (increaseBtn) {
              increaseBtn.addEventListener('click', () => {
                if (this.memberCount < 15) {
                  this.memberCount++;
                  this.updateMemberDisplay();
                  this.updateSummary();
                }
              });
            }
        
            if (decreaseBtn) {
              decreaseBtn.addEventListener('click', () => {
                if (this.memberCount > 1) {
                  this.memberCount--;
                  this.updateMemberDisplay();
                  this.updateSummary();
                }
              });
            }
        
            // Event listener untuk Porter/Guide selection
            this.setupPorterGuideListeners();
          }
        
          // Fungsi baru untuk setup event listener Porter/Guide
          setupPorterGuideListeners() {
            const porterCheckbox = document.getElementById('porter-checkbox');
            const guideCheckbox = document.getElementById('guide-checkbox');
        
            if (porterCheckbox) {
              porterCheckbox.addEventListener('change', (e) => {
                if (e.target.checked) {
                  this.selectedService = 'porter';
                  // Uncheck guide jika porter dipilih
                  if (guideCheckbox) guideCheckbox.checked = false;
                } else {
                  this.selectedService = null;
                }
                this.updateSummary();
              });
            }
        
            if (guideCheckbox) {
              guideCheckbox.addEventListener('change', (e) => {
                if (e.target.checked) {
                  this.selectedService = 'guide';
                  // Uncheck porter jika guide dipilih
                  if (porterCheckbox) porterCheckbox.checked = false;
                } else {
                  this.selectedService = null;
                }
                this.updateSummary();
              });
            }
          }
        
          selectTourType(type) {
            this.tourType = type;
            
            // Reset service selection ketika ganti tour type
            this.selectedService = null;
            const porterCheckbox = document.getElementById('porter-checkbox');
            const guideCheckbox = document.getElementById('guide-checkbox');
            if (porterCheckbox) porterCheckbox.checked = false;
            if (guideCheckbox) guideCheckbox.checked = false;
            
            // Update UI
            document.querySelectorAll('.tour-type-card').forEach(card => {
              card.classList.remove('border-blue-500');
              card.classList.add('border-gray-200');
            });
            
            const selectedCard = document.querySelector(`[data-type="${type}"]`);
            if (selectedCard) {
              selectedCard.classList.remove('border-gray-200');
              selectedCard.classList.add('border-blue-500');
            }
        
            // Update badge
            const badges = {
                private: 'Private Trip',
                family: 'Family Gathering',
                camp: 'Camp Ground'
              };
        
              const badgeClasses = {
                private: 'bg-blue-100 text-blue-700',
                family: 'bg-red-100 text-red-700',
                camp: 'bg-green-100 text-green-700'
              };
              
              const badge = document.getElementById('tourTypeBadge');
              if (badge) {
                badge.textContent = badges[type]; 
                badge.className = `px-3 py-1 rounded-full text-sm font-semibold ${badgeClasses[type]}`;
              }
        
            // Re-render packages
            this.renderPackages();
            this.showPackageDetail('hemat');
            this.updateSummary();
          }
        
          updateMemberDisplay() {
            const memberCountEl = document.getElementById('member-count');
            if (memberCountEl) {
              memberCountEl.textContent = `${this.memberCount} orang`;
            }
          }
        
          setupDatePickers() {
            const startDateEl = document.getElementById('startDate');
            const endDateEl = document.getElementById('endDate');
            
            if (!startDateEl || !endDateEl) return;
        
            const isWeekend = (date) => {
              const d = date.getDay();
              return d === 5 || d === 6 || d === 0; // Jumat, Sabtu, Minggu
            };
        
            const disableNonWeekend = (ui) => {
              ui.querySelectorAll('.day-item').forEach(el => {
                const t = el.dataset.time;
                if (t) {
                  const d = new Date(parseInt(t));
                  if (!isWeekend(d)) {
                    el.classList.add('is-locked');
                    el.style.pointerEvents = "none";
                    el.style.opacity = "0.3";
                  }
                }
              });
            };
        
            // Start date picker
            new Litepicker({
              element: startDateEl,
              format: 'DD MMMM YYYY',
              minDate: new Date(),
              setup: (picker) => {
                picker.on('render', e => disableNonWeekend(e));
                picker.on('selected', date => {
                  if (!date.dateInstance) return;
                  
                  this.startDate = date.dateInstance;
                  endDateEl.value = '';
                  this.endDate = null;
                  this.updateSummary();
                });
              }
            });
        
            // End date picker
            new Litepicker({
              element: endDateEl,
              format: 'DD MMMM YYYY',
              setup: (picker) => {
                picker.on('render', e => {
                  disableNonWeekend(e);
                  
                  if (this.startDate) {
                    e.querySelectorAll('.day-item').forEach(el => {
                      const t = el.dataset.time;
                      if (t) {
                        const d = new Date(parseInt(t));
                        // Disable tanggal sebelum start date
                        if (d < this.startDate) {
                          el.classList.add('is-locked');
                          el.style.pointerEvents = "none";
                          el.style.opacity = "0.3";
                        }
                        // Disable tanggal lebih dari 3 hari
                        if ((d - this.startDate) / (1000 * 60 * 60 * 24) > 2) {
                          el.classList.add('is-locked');
                          el.style.pointerEvents = "none";
                          el.style.opacity = "0.3";
                        }
                      }
                    });
                  }
                });
        
                picker.on('selected', date => {
                  if (!date.dateInstance || !this.startDate) return;
                  
                  this.endDate = date.dateInstance;
                  this.updateProductPrices();
                  this.updateSummary();
                });
              }
            });
          }
        
          getDays() {
            if (!this.startDate) return 1;
            if (!this.endDate) return 1;
            
            const timeDiff = this.endDate.getTime() - this.startDate.getTime();
            return Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1;
          }
        
          renderPackages() {
            const container = document.getElementById('paketContainer');
            if (!container) return;
            
            container.innerHTML = '';
        
            const packages = this.paketData[this.tourType];
            
            for (let paket in packages) {
              const card = document.createElement('div');
              card.className = 'bg-white p-6 rounded-xl shadow cursor-pointer hover:scale-[1.02] transition relative';
              card.innerHTML = `
                <h3 class="text-lg font-bold mb-2">${this.capitalize(paket)}</h3>
                <span class="absolute bottom-3 right-3 bg-green-100 text-green-700 px-2 py-1 rounded text-sm font-semibold">
                  Rp ${packages[paket].price.toLocaleString('id-ID')}
                </span>
              `;
              card.onclick = () => this.showPackageDetail(paket);
              container.appendChild(card);
            }
          }
        
          showPackageDetail(paket) {
            this.selectedPaket = paket;
        
            // Reset service selection jika bukan paket reguler
            if (paket !== 'reguler') {
              this.selectedService = null;
              const porterCheckbox = document.getElementById('porter-checkbox');
              const guideCheckbox = document.getElementById('guide-checkbox');
              if (porterCheckbox) porterCheckbox.checked = false;
              if (guideCheckbox) guideCheckbox.checked = false;
            }
        
            // Highlight selected card
            document.querySelectorAll("#paketContainer div").forEach(card => {
              card.classList.remove("border-2", "border-blue-500");
              if(card.textContent.toLowerCase().includes(paket)) {
                card.classList.add("border-2", "border-blue-500");
              }
            });
        
            // Show package details
            const detail = document.getElementById("paketDetail");
            if (!detail) return;
            
            detail.classList.remove("hidden");
        
            const packageData = this.paketData[this.tourType][paket];
            const includeList = packageData.include.map(item => `<li class="text-green-600">✓ ${item}</li>`).join("");
            const excludeList = packageData.exclude.map(item => `<li class="text-red-600">✕ ${item}</li>`).join("");
        
            // Tambahan HTML untuk Porter/Guide selection jika paket reguler
            let porterGuideSection = '';
            if (paket === 'reguler') {
              porterGuideSection = `
                <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                  <h4 class="font-semibold text-blue-800 mb-3">Pilihan Layanan Tambahan (Pilih Salah Satu)</h4>
                  <div class="space-y-2">
                    <label class="flex items-center space-x-2 cursor-pointer">
                      <input type="checkbox" id="porter-checkbox" class="w-4 h-4 text-blue-600">
                      <span class="text-gray-700">Porter (Pembantu angkut barang)</span>
                    </label>
                    <label class="flex items-center space-x-2 cursor-pointer">
                      <input type="checkbox" id="guide-checkbox" class="w-4 h-4 text-blue-600">
                      <span class="text-gray-700">Guide (Pemandu wisata)</span>
                    </label>
                  </div>
                </div>
              `;
            }
        
            detail.innerHTML = `
              <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-xl font-bold mb-4">Fasilitas Paket ${this.capitalize(paket)}</h3>
                <div class="grid md:grid-cols-2 gap-6">
                  <div>
                    <h4 class="font-semibold text-green-600 mb-3">Include</h4>
                    <ul class="space-y-1">${includeList}</ul>
                  </div>
                  <div>
                    <h4 class="font-semibold text-red-600 mb-3">Exclude</h4>
                    <ul class="space-y-1">${excludeList}</ul>
                  </div>
                </div>
                ${porterGuideSection}
              </div>
            `;
        
            // Re-setup event listeners untuk checkbox yang baru dibuat
            if (paket === 'reguler') {
              this.setupPorterGuideListeners();
            }
        
            this.updateSummary();
          }
        
          getProductPrice(product, days) {
            const prices = this.productPrices[product];
            if (days >= 3) return prices[3];
            if (days >= 2) return prices[2];
            return prices[1];
          }
        
          updateProductPrices() {
            const days = this.getDays();
            
            for (let product in this.productPrices) {
              const checkEl = document.getElementById(`check-${product}`);
              if (checkEl && checkEl.checked) {
                const qtyEl = document.getElementById(`qty-item-${product}`);
                const qty = qtyEl ? parseInt(qtyEl.textContent) || 1 : 1;
                const pricePerDay = this.getProductPrice(product, days);
                const total = pricePerDay * qty * days;
                const priceEl = document.getElementById(`price-${product}`);
                if (priceEl) {
                  priceEl.textContent = `Rp ${total.toLocaleString('id-ID')}`;
                }
              }
            }
          }
        
          static toggleProduct(product) {
            const checkEl = document.getElementById(`check-${product}`);
            const detailEl = document.getElementById(`detail-${product}`);
            
            if (checkEl && detailEl) {
              if (checkEl.checked) {
                detailEl.classList.remove("hidden");
                const qtyEl = document.getElementById(`qty-item-${product}`);
                if (qtyEl) qtyEl.textContent = "1";
                bookingSystem.updateProductPrice(product);
              } else {
                detailEl.classList.add("hidden");
                const qtyEl = document.getElementById(`qty-item-${product}`);
                const priceEl = document.getElementById(`price-${product}`);
                if (qtyEl) qtyEl.textContent = "0";
                if (priceEl) priceEl.textContent = "Rp 0";
                bookingSystem.updateSummary();
              }
            }
          }
        
          updateProductPrice(product) {
            const qtyEl = document.getElementById(`qty-item-${product}`);
            const qty = qtyEl ? parseInt(qtyEl.textContent) || 1 : 1;
            const days = this.getDays();
            const pricePerDay = this.getProductPrice(product, days);
            const total = pricePerDay * qty * days;
            const priceEl = document.getElementById(`price-${product}`);
            if (priceEl) {
              priceEl.textContent = `Rp ${total.toLocaleString('id-ID')}`;
            }
            this.updateSummary();
          }
        
          static changeQty(product, amount) {
            const qtyEl = document.getElementById(`qty-item-${product}`);
            if (qtyEl) {
              let qty = parseInt(qtyEl.textContent) || 1;
              qty += amount;
              if (qty < 1) qty = 1;
              qtyEl.textContent = qty;
              bookingSystem.updateProductPrice(product);
            }
          }
        
          updateSummary() {
            const summaryList = document.getElementById("summary-list");
            const totalPriceEl = document.getElementById("total-price");
            
            if (!summaryList || !totalPriceEl) return;
            
            summaryList.innerHTML = "";
            let total = 0;
        
            // 1. Tipe Tour
            const tourTypeNames = {
              private: 'Private Trip',
              family: 'Family Gathering',
              camp: 'Camp Ground'
            };
            
            // Mapping warna/class untuk setiap tipe
            const tourTypeClasses = {
              private: 'bg-blue-100 text-blue-700',
              family: 'bg-red-100 text-red-700',
              camp: 'bg-green-100 text-green-700'
            };
            
            summaryList.innerHTML += `
              <div class="flex justify-between">
                <span>Tipe Trip:</span>
                <span class="${tourTypeClasses[this.tourType]} px-3 py-1 rounded-full text-sm font-semibold">
                  ${tourTypeNames[this.tourType]}
                </span>
              </div>
            `;
        
            // 2. Jumlah Orang
            summaryList.innerHTML += `<div class="flex justify-between"><span>Jumlah Orang:</span><span class="font-semibold">${this.memberCount} orang</span></div>`;
        
            // 3. Tanggal & Durasi
            if (this.startDate && this.endDate) {
              const days = this.getDays();
              const startStr = this.startDate.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' });
              const endStr = this.endDate.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' });
              summaryList.innerHTML += `<div class="flex justify-between"><span>Tanggal:</span><span class="font-semibold">${startStr} - ${endStr} (${days} hari)</span></div>`;
            } else if (this.startDate) {
              const startStr = this.startDate.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' });
              summaryList.innerHTML += `<div class="flex justify-between"><span>Tanggal:</span><span class="font-semibold">${startStr} (1 hari)</span></div>`;
            }
        
            // Add separator
            summaryList.innerHTML += `<hr class="my-2">`;
        
            // 4. Paket
            if (this.selectedPaket && this.paketData[this.tourType][this.selectedPaket]) {
              const packageData = this.paketData[this.tourType][this.selectedPaket];
              const paketPrice = packageData.price * this.memberCount;
              total += paketPrice;
              summaryList.innerHTML += `<div class="flex justify-between"><span>Paket ${this.capitalize(this.selectedPaket)} (${this.memberCount} orang):</span><span class="font-semibold">Rp ${paketPrice.toLocaleString('id-ID')}</span></div>`;
            }
        
            // 5. Porter/Guide Selection (hanya untuk paket reguler)
            if (this.selectedPaket === 'reguler' && this.selectedService) {
              const serviceName = this.selectedService === 'porter' ? 'Porter' : 'Guide';
              summaryList.innerHTML += `<div class="flex justify-between"><span>Layanan ${serviceName}:</span><span class="font-semibold text-blue-600">Tersedia</span></div>`;
            }
        
            // 6. Produk Additional
            const days = this.getDays();
            for (const product in this.productPrices) {
              const checkEl = document.getElementById(`check-${product}`);
              if (checkEl && checkEl.checked) {
                const qtyEl = document.getElementById(`qty-item-${product}`);
                const qty = qtyEl ? parseInt(qtyEl.textContent) || 1 : 1;
                const pricePerDay = this.getProductPrice(product, days);
                const productTotal = pricePerDay * qty * days;
                total += productTotal;
                summaryList.innerHTML += `<div class="flex justify-between"><span>${this.capitalize(product)} (${qty} pcs × ${days} hari):</span><span class="font-semibold">Rp ${productTotal.toLocaleString('id-ID')}</span></div>`;
              }
            }
        
            totalPriceEl.textContent = `Rp ${total.toLocaleString('id-ID')}`;
          }
        
          capitalize(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
          }
        
          // Method untuk mendapatkan data booking lengkap (bisa digunakan untuk submit)
          getBookingData() {
            return {
              tourType: this.tourType,
              selectedPaket: this.selectedPaket,
              memberCount: this.memberCount,
              startDate: this.startDate,
              endDate: this.endDate,
              selectedService: this.selectedService, // Porter atau Guide
              selectedProducts: this.getSelectedProducts(),
              totalPrice: this.calculateTotalPrice()
            };
          }
        
          getSelectedProducts() {
            const products = {};
            for (const product in this.productPrices) {
              const checkEl = document.getElementById(`check-${product}`);
              if (checkEl && checkEl.checked) {
                const qtyEl = document.getElementById(`qty-item-${product}`);
                products[product] = qtyEl ? parseInt(qtyEl.textContent) || 1 : 1;
              }
            }
            return products;
          }
        
          calculateTotalPrice() {
            let total = 0;
            
            // Harga paket
            if (this.selectedPaket && this.paketData[this.tourType][this.selectedPaket]) {
              total += this.paketData[this.tourType][this.selectedPaket].price * this.memberCount;
            }
            
            // Harga produk additional
            const days = this.getDays();
            for (const product in this.productPrices) {
              const checkEl = document.getElementById(`check-${product}`);
              if (checkEl && checkEl.checked) {
                const qtyEl = document.getElementById(`qty-item-${product}`);
                const qty = qtyEl ? parseInt(qtyEl.textContent) || 1 : 1;
                const pricePerDay = this.getProductPrice(product, days);
                total += pricePerDay * qty * days;
              }
            }
            
            return total;
          }
        }
        
        // Mobile dropdown function (outside class)
        function toggleMobileDropdown() {
          const dropdown = document.getElementById("mobile-dropdown");
          const icon = document.getElementById("mobile-dropdown-icon");
          if (dropdown && icon) {
            dropdown.classList.toggle("hidden");
            icon.classList.toggle("rotate-180");
          }
        }
        
        // Initialize the booking system
        let bookingSystem;
        document.addEventListener('DOMContentLoaded', () => {
          bookingSystem = new BookingSystem();
        });
    </script>

  <!-- Swiper CSS & JS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      new Swiper(".mySwiper", {
        loop: true,
        pagination: { el: ".swiper-pagination", clickable: true },
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
      });
    });
  </script>

</body>
</html>