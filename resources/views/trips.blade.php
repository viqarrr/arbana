<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="">

    <title>Open Trip Detail</title>

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

    <!-- Carousel -->
    <div class="flex justify-center my-9">
        <div class="relative w-full max-w-5xl">
            <div class="swiper mySwiper w-full rounded-xl shadow-lg overflow-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{Asset('storage/images/kook1.jpg')}}" alt="Panorama Gunung Argapuro"
                            class="w-full h-64 md:h-[450px] object-cover rounded-xl" />
                    </div>
                    <div class="swiper-slide">
                        <img src="{{Asset('storage/images/kook2.jpg')}}" alt="Gunung Argapuro"
                            class="w-full h-64 md:h-[450px] object-cover rounded-xl" />
                    </div>
                    <div class="swiper-slide">
                        <img src="{{Asset('storage/images/kook4.jpg')}}"
                            class="w-full h-64 md:h-[450px] object-cover rounded-xl" />
                    </div>
                </div>

                <!-- Navigation & pagination -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <main class="max-w-screen-xl mx-auto p-4">
        <!-- Container -->
        <div class="w-full flex justify-center">
            <!-- Main Column -->
            <div class="space-y-6 w-full md:w-5/6 lg:w-4/5 mx-auto">
                
                <!-- Title + Schedule -->
                <div class="bg-white p-6 rounded-xl shadow">
                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">Open Trip</span>
                    <h2 class="text-4xl font-bold mt-4 text-center">Mount Kelud</h2>
                    <hr class="my-6 border-gray-300">
                    <div class="bg-white p-6 rounded-xl shadow grid grid-cols-2 md:grid-cols-3 gap-4 text-center">
                        <div><p class="font-semibold">Lokasi</p><p class="text-sm text-gray-600">Jawa Timur</p></div>
                        <div><p class="font-semibold">Titik Kumpul</p><p class="text-sm text-gray-600">Blitar</p></div>
                        <div><p class="font-semibold">MDPL</p><p class="text-sm text-gray-600">1731 mdpl</p></div>
                    </div>
                </div>

                <!-- Detail Info -->
                

                <!-- Destination Overview -->
                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="font-semibold mb-2">Sekilas Destinasi</h3>
                    <p class="text-gray-700 text-sm">
                        Nikmati pengalaman wisata mendaki Gunung Argapuro. Dalam tur sehari ini, Anda akan diajak menjelajahi keindahan alam yang memukau dengan pemandangan spektakuler dan udara segar pegunungan.
                    </p>
                </div>

                <!-- Rules -->
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

                <!-- Facilities -->
                <div class="bg-white p-6 rounded-xl shadow mt-6">
                    <h3 class="text-xl font-bold mb-4">Fasilitas</h3> 
                    <div class="mb-4">
                        <h4 class="font-semibold text-green-600 mb-3">Include</h4>
                        <ul class="space-y-2">
                            <li class="flex items-center gap-2"><span class="flex items-center justify-center w-6 h-6 rounded-full bg-green-100 text-green-600">✓</span>Transportasi PP</li>
                            <li class="flex items-center gap-2"><span class="flex items-center justify-center w-6 h-6 rounded-full bg-green-100 text-green-600">✓</span>Makan 3x</li>
                            <li class="flex items-center gap-2"><span class="flex items-center justify-center w-6 h-6 rounded-full bg-green-100 text-green-600">✓</span>Tiket masuk wisata</li>
                            <li class="flex items-center gap-2"><span class="flex items-center justify-center w-6 h-6 rounded-full bg-green-100 text-green-600">✓</span>Guide berpengalaman</li>
                        </ul>
                    </div>
                    <hr class="my-6 border-gray-300">
                    <div>
                        <h4 class="font-semibold text-red-600 mb-3">Exclude</h4>
                        <ul class="space-y-2">
                            <li class="flex items-center gap-2"><span class="flex items-center justify-center w-6 h-6 rounded-full bg-red-100 text-red-600">✕</span>Pengeluaran pribadi</li>
                            <li class="flex items-center gap-2"><span class="flex items-center justify-center w-6 h-6 rounded-full bg-red-100 text-red-600">✕</span>Sewa perlengkapan pribadi</li>
                            <li class="flex items-center gap-2"><span class="flex items-center justify-center w-6 h-6 rounded-full bg-red-100 text-red-600">✕</span>Tips guide</li>
                        </ul>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-lg mt-6">
                        <h3 class="text-xl font-bold mb-4 text-gray-800">Pilih Tanggal</h3>
                    
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                            
                            <!-- Date inputs -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full md:w-auto">
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
                    
                            <!-- Member count -->
                            <div class="flex flex-col md:flex-row md:items-center md:gap-4 w-full md:w-auto">
                                <span id="summary-member-count" class="font-semibold text-gray-800 text-center md:text-left">5 orang</span>
                                <div class="flex justify-center md:justify-start gap-3 mt-3 md:mt-0">
                                    <button id="decrease-member" style="width: 40px; height: 40px;"
                                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold px-4 py-2 flex justify-center items-center rounded-full transition">
                                        -
                                    </button>
                                    <button id="increase-member" style="width: 40px; height: 40px;"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold px-4 py-2 flex justify-center items-center rounded-full transition">
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- Additional Products -->
                <div class="bg-white p-6 rounded-xl shadow mt-6">
                    <h3 class="text-xl font-bold mb-4">Alat Tambahan</h3>

                    <!-- Trigger Dropdown -->
                    <input type="checkbox" id="toggle-products" class="peer hidden">
                    <label for="toggle-products" 
                        class="flex justify-between items-center p-3 border rounded-lg cursor-pointer">
                        <span class="font-semibold text-gray-800">Lihat Daftar Produk</span>
                        <span class="transition-transform duration-300 peer-checked:rotate-90">➤</span>
                    </label>

                    <!-- Dropdown Content -->
                    <div class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[500px] peer-checked:mt-4 space-y-3">

                        <!-- Tripod -->
                        <div class="border rounded-xl p-4 shadow-sm flex items-center justify-between text-sm font-medium text-gray-700">
                            <div class="flex items-center gap-2 w-1/4">
                                <input type="checkbox" id="check-tripod" class="w-5 h-5 border-2 border-indigo-500">
                                <label for="check-tripod" class="font-semibold text-gray-800">Tripod</label>
                            </div>
                            <div id="detail-tripod" class="flex items-center justify-between w-3/4 gap-4 hidden">
                                <div class="flex items-center justify-center gap-2">
                                    <label class="block text-sm font-medium text-gray-700">Durasi Sewa</label>
                                    <span id="duration-tripod" class="px-3 py-1 bg-gray-100 rounded text-center font-semibold min-w-[60px]">0 hari</span>
                                </div>
                                <div class="flex items-center justify-center gap-2">
                                    <label class="block text-sm font-medium text-gray-700">Total Barang</label>
                                    <button id="decrease-tripod" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                                    <span id="qty-item-tripod" class="w-6 text-center font-semibold">1</span>
                                    <button id="increase-tripod" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                                </div>
                                <span id="price-tripod" class="text-green-600 font-bold text-center">Rp 0</span>
                            </div>
                        </div>

                        <!-- Lampu Camping -->
                        <div class="border rounded-xl p-4 shadow-sm flex items-center justify-between text-sm font-medium text-gray-700">
                            <div class="flex items-center gap-2 w-1/4">
                                <input type="checkbox" id="check-lampu" class="w-5 h-5 border-2 border-indigo-500">
                                <label for="check-lampu" class="font-semibold text-gray-800">Lampu Camping</label>
                            </div>
                            <div id="detail-lampu" class="flex items-center justify-between w-3/4 gap-4 hidden">
                                <div class="flex items-center justify-center gap-2">
                                    <label class="block text-sm font-medium text-gray-700">Durasi Sewa</label>
                                    <span id="duration-lampu" class="px-3 py-1 bg-gray-100 rounded text-center font-semibold min-w-[60px]">0 hari</span>
                                </div>
                                <div class="flex items-center justify-center gap-2">
                                    <label class="block text-sm font-medium text-gray-700">Total Barang</label>
                                    <button id="decrease-lampu" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                                    <span id="qty-item-lampu" class="w-6 text-center font-semibold">1</span>
                                    <button id="increase-lampu" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                                </div>
                                <span id="price-lampu" class="text-green-600 font-bold text-center">Rp 0</span>
                            </div>
                        </div>

                        <!-- Matras -->
                        <div class="border rounded-xl p-4 shadow-sm flex items-center justify-between text-sm font-medium text-gray-700">
                            <div class="flex items-center gap-2 w-1/4">
                                <input type="checkbox" id="check-matras" class="w-5 h-5 border-2 border-indigo-500">
                                <label for="check-matras" class="font-semibold text-gray-800">Matras</label>
                            </div>
                            <div id="detail-matras" class="flex items-center justify-between w-3/4 gap-4 hidden">
                                <div class="flex items-center justify-center gap-2">
                                    <label class="block text-sm font-medium text-gray-700">Durasi Sewa</label>
                                    <span id="duration-matras" class="px-3 py-1 bg-gray-100 rounded text-center font-semibold min-w-[60px]">0 hari</span>
                                </div>
                                <div class="flex items-center justify-center gap-2">
                                    <label class="block text-sm font-medium text-gray-700">Total Barang</label>
                                    <button id="decrease-matras" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                                    <span id="qty-item-matras" class="w-6 text-center font-semibold">1</span>
                                    <button id="increase-matras" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                                </div>
                                <span id="price-matras" class="text-green-600 font-bold text-center">Rp 0</span>
                            </div>
                        </div>

                        <!-- Kompor -->
                        <div class="border rounded-xl p-4 shadow-sm flex items-center justify-between text-sm font-medium text-gray-700">
                            <div class="flex items-center gap-2 w-1/4">
                                <input type="checkbox" id="check-kompor" class="w-5 h-5 border-2 border-indigo-500">
                                <label for="check-kompor" class="font-semibold text-gray-800">Kompor</label>
                            </div>
                            <div id="detail-kompor" class="flex items-center justify-between w-3/4 gap-4 hidden">
                                <div class="flex items-center justify-center gap-2">
                                    <label class="block text-sm font-medium text-gray-700">Durasi Sewa</label>
                                    <span id="duration-kompor" class="px-3 py-1 bg-gray-100 rounded text-center font-semibold min-w-[60px]">0 hari</span>
                                </div>
                                <div class="flex items-center justify-center gap-2">
                                    <label class="block text-sm font-medium text-gray-700">Total Barang</label>
                                    <button id="decrease-kompor" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                                    <span id="qty-item-kompor" class="w-6 text-center font-semibold">1</span>
                                    <button id="increase-kompor" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                                </div>
                                <span id="price-kompor" class="text-green-600 font-bold text-center">Rp 0</span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Additional Services -->
                <div class="bg-white p-6 rounded-xl shadow mt-6">
                    <h3 class="text-xl font-bold mb-4">Services Additional</h3>

                    <!-- Trigger Dropdown -->
                    <input type="checkbox" id="toggle-services" class="peer hidden">
                    <label for="toggle-services" 
                            class="flex justify-between items-center p-3 border rounded-lg cursor-pointer">
                        <span class="font-semibold text-gray-800">Lihat Daftar Service</span>
                        <span class="transition-transform duration-300 peer-checked:rotate-90">➤</span>
                    </label>

                    <!-- Dropdown Content -->
                    <div class="mt-3 space-y-4 max-h-0 overflow-hidden peer-checked:max-h-96 transition-all duration-300">
                        
                        <!-- Porter -->
                        <div class="flex flex-col border p-3 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="check-porter" class="w-5 h-5 border-2 border-indigo-500">
                                    <div class="flex flex-col">
                                        <label for="check-porter" class="font-semibold text-gray-800">Porter</label>
                                        <span class="text-xs text-gray-500">Maksimal barang = 30kg</span>
                                    </div>
                                </div>

                                <div id="detail-porter" class="flex items-center gap-2 hidden">
                                    <span class="text-sm text-gray-500 ml-2">Jumlah Porter:</span>
                                    <button id="decrease-porter" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                                    <span id="qty-item-porter" class="w-6 text-center font-semibold">1</span>
                                    <button id="increase-porter" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                                    <span id="price-porter" class="text-green-600 font-bold">Rp 100.000</span>
                                </div>
                            </div>
                        </div>

                        <!-- Guide -->
                        <div class="flex flex-col border p-3 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="check-guide" class="w-5 h-5 border-2 border-indigo-500">
                                    <div class="flex flex-col">
                                        <label for="check-guide" class="font-semibold text-gray-800">Guide</label>
                                        <span class="text-xs text-gray-500">Minimal = 1 orang, Maksimal = 15 orang</span>
                                    </div>
                                </div>
                                <div id="detail-guide" class="flex items-center gap-2 hidden">
                                    <button id="decrease-guide" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                                    <span id="qty-item-guide" class="w-6 text-center font-semibold">1</span>
                                    <button id="increase-guide" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                                    <span id="price-guide" class="text-green-600 font-bold">Rp 100.000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="bg-white p-6 rounded-xl shadow mt-6">
                    <h3 class="text-xl font-bold mb-4">Ringkasan Pesanan</h3>
                    <div id="summary-list" class="space-y-2 text-sm text-gray-700"></div>
                    <p id="summary" class="text-sm text-gray-600 mt-3">Kamu belum memilih tanggal.</p>
                    <div class="flex justify-between items-center font-semibold mt-4">
                        <span>Total</span>
                        <span id="total-price" class="text-green-600">Rp 250.000</span>
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
        // ==================== GLOBAL VARIABLES ====================
        const basePrices = { 
            tripod: 15000, 
            lampu: 10000, 
            matras: 10000, 
            kompor: 20000,
            porter: 100000,
            guide: 100000
        };
        const pricePerPerson = 50000; // Harga per orang
        let tripDuration = 0;
        let memberCount = 5;
        const maxMembers = 25;

        // DOM Elements
        const summaryEl = document.getElementById("summary");
        const startInput = document.getElementById("startDate");
        const endInput = document.getElementById("endDate");
        const memberCountEl = document.getElementById("summary-member-count");
        const increaseBtn = document.getElementById("increase-member");
        const decreaseBtn = document.getElementById("decrease-member");

        // ==================== MOBILE MENU ====================
        const btn = document.getElementById("menu-btn");
        const menu123 = document.getElementById("mobile-menu");
        if (btn && menu123) {
            btn.addEventListener("click", () => menu123.classList.toggle("hidden"));
        }

        function toggleMobileDropdown() {
            const dropdown = document.getElementById("mobile-dropdown");
            const icon = document.getElementById("mobile-dropdown-icon");
            if (dropdown) dropdown.classList.toggle("hidden");
            if (icon) icon.classList.toggle("rotate-180");
        }

        // ==================== UTILITY FUNCTIONS ====================
        function toggleProduct(product) {
            const checkEl = document.getElementById(`check-${product}`);
            const detailEl = document.getElementById(`detail-${product}`);
            const qtyItemEl = document.getElementById(`qty-item-${product}`);

            if (checkEl.checked) {
                detailEl.classList.remove("hidden");
                qtyItemEl.textContent = "1";
                
                // Set duration for rental products
                if (['tripod', 'lampu', 'matras', 'kompor'].includes(product)) {
                    const durationEl = document.getElementById(`duration-${product}`);
                    if (durationEl) {
                        durationEl.textContent = tripDuration > 0 ? `${tripDuration} hari` : "Pilih tanggal dulu";
                    }
                }
                
                updatePrice(product);
            } else {
                detailEl.classList.add("hidden");
                qtyItemEl.textContent = "1";
                document.getElementById(`price-${product}`).textContent = "Rp 0";
                updateSummary();
            }
        }

        function changeQty(product, amount) {
            const qtyItemEl = document.getElementById(`qty-item-${product}`);
            let qtyItem = parseInt(qtyItemEl.textContent) || 1;

            qtyItem += amount;
            if (qtyItem < 1) qtyItem = 1;
            qtyItemEl.textContent = qtyItem;
            updatePrice(product);
        }

        function updatePrice(product) {
            const qtyItemEl = document.getElementById(`qty-item-${product}`);
            const qtyItem = parseInt(qtyItemEl.textContent) || 1;
            const priceEl = document.getElementById(`price-${product}`);

            let total = 0;

            if (['tripod', 'lampu', 'matras', 'kompor'].includes(product)) {
                // Rental products: price × quantity × duration
                if (tripDuration > 0) {
                    total = basePrices[product] * qtyItem * tripDuration;
                } else {
                    priceEl.textContent = "Pilih tanggal dulu";
                    return;
                }
            } else {
                // Services: price × quantity
                total = basePrices[product] * qtyItem;
            }

            priceEl.textContent = `Rp ${total.toLocaleString("id-ID")}`;
            updateSummary();
        }

        function updateSummary() {
            const summaryList = document.getElementById("summary-list");
            summaryList.innerHTML = "";
            
            // Base trip cost (price per person × member count)
            let baseTripCost = pricePerPerson * memberCount;
            let total = baseTripCost;

            // Add base trip cost to summary
            const baseTripItem = document.createElement("div");
            baseTripItem.textContent = `Trip Kelud - ${memberCount} orang × Rp ${pricePerPerson.toLocaleString("id-ID")} (Rp ${baseTripCost.toLocaleString("id-ID")})`;
            summaryList.appendChild(baseTripItem);

            // Add additional products and services
            for (const product in basePrices) {
                const checkEl = document.getElementById(`check-${product}`);
                const qtyItemEl = document.getElementById(`qty-item-${product}`);
                const priceEl = document.getElementById(`price-${product}`);

                if (checkEl && checkEl.checked) {
                    const qtyItem = parseInt(qtyItemEl.textContent) || 1;
                    const priceText = priceEl.textContent;
                    
                    if (priceText !== "Pilih tanggal dulu" && priceText !== "Rp 0") {
                        const priceNum = parseInt(priceText.replace(/[^\d]/g, "")) || 0;

                        const item = document.createElement("div");
                        if (['tripod', 'lampu', 'matras', 'kompor'].includes(product)) {
                            item.textContent = `${capitalize(product)} - ${qtyItem} barang × ${tripDuration} hari (${priceText})`;
                        } else {
                            item.textContent = `${capitalize(product)} - ${qtyItem} pcs (${priceText})`;
                        }

                        summaryList.appendChild(item);
                        total += priceNum;
                    }
                }
            }

            document.getElementById("total-price").textContent = `Rp ${total.toLocaleString("id-ID")}`;
        }

        function updateMemberSummary() {
            memberCountEl.textContent = `${memberCount} orang`;
            updateSummary(); // Update summary when member count changes
        }

        function capitalize(text) {
            return text.charAt(0).toUpperCase() + text.slice(1);
        }

        // ==================== DATE PICKER FUNCTIONS ====================
        function isWeekend(date) {
            const d = date.getDay();
            return d === 5 || d === 6 || d === 0; // Friday, Saturday, Sunday
        }

        function disableNonWeekend(ui) {
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
        }

        function updateTripDuration(start, end) {
            if (start && end) {
                tripDuration = Math.ceil((end - start) / (1000 * 60 * 60 * 24)) + 1;
                
                // Update duration for all active products
                ['tripod', 'lampu', 'matras', 'kompor'].forEach(product => {
                    const durationEl = document.getElementById(`duration-${product}`);
                    if (durationEl) {
                        durationEl.textContent = `${tripDuration} hari`;
                    }
                    
                    // Update price if product is active
                    const checkEl = document.getElementById(`check-${product}`);
                    if (checkEl && checkEl.checked) {
                        updatePrice(product);
                    }
                });
            }
        }

        // ==================== DATE PICKER INITIALIZATION ====================
        let startPicker, endPicker;

        // Start date picker
        startPicker = new Litepicker({
            element: startInput,
            format: 'DD MMMM YYYY',
            minDate: new Date(),
            setup: (picker) => {
                picker.on('render', e => disableNonWeekend(e));
                picker.on('selected', date => {
                    if (!date || !date.dateInstance) return;
        
                    // Reset end picker
                    if (endPicker) {
                        endPicker.setDate(null);
                    }
                    tripDuration = 0;
        
                    // Set min and max for end date
                    const start = date.dateInstance;
                    if (endPicker) {
                        endPicker.setMinDate(start);
        
                        // Maksimal 2 hari setelah start
                        const max = new Date(start.getTime() + 2 * 24 * 60 * 60 * 1000);
                        endPicker.setMaxDate(max);
                        endPicker.show();
                    }
                });
            }
        });
        // End date picker
        endPicker = new Litepicker({
            element: endInput,
            format: 'DD MMMM YYYY',
            setup: (picker) => {
                picker.on('render', e => {
                    disableNonWeekend(e);
        
                    const startData = startPicker ? startPicker.getDate() : null;
                    if (startData && startData.dateInstance) {
                        const start = startData.dateInstance;
                        e.querySelectorAll('.day-item').forEach(el => {
                            const t = el.dataset.time;
                            if (t) {
                                const d = new Date(parseInt(t));
                                if ((d - start) / (1000 * 60 * 60 * 24) > 2 || d < start) {
                                    el.classList.add('is-locked');
                                    el.style.pointerEvents = "none";
                                    el.style.opacity = "0.3";
                                }
                            }
                        });
                    }
                });
        
                picker.on('selected', date => {
                    if (!date || !date.dateInstance) return;
        
                    const startData = startPicker ? startPicker.getDate() : null;
                    if (!startData || !startData.dateInstance) return;
        
                    const start = startData.dateInstance;
                    const end = date.dateInstance;
        
                    // Update trip duration
                    updateTripDuration(start, end);
        
                    // Update summary text
                    if (start.getTime() === end.getTime()) {
                        summaryEl.innerText = `Booking 1 hari: ${start.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long' })}`;
                    } else {
                        summaryEl.innerText = `Booking dari ${start.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long' })} sampai ${end.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long' })} (${tripDuration} hari)`;
                    }
        
                    updateSummary();
                });
            }
        });
        // ==================== EVENT LISTENERS ====================
        // Member count buttons - TAMBAHKAN INI
        increaseBtn.addEventListener("click", () => {
            if (memberCount < maxMembers) {
                memberCount++;
                updateMemberSummary();
            }
        });
        
        decreaseBtn.addEventListener("click", () => {
            if (memberCount > 1) {
                memberCount--;
                updateMemberSummary();
            }
        });
        
        // Product checkboxes
        ['tripod', 'lampu', 'matras', 'kompor', 'porter', 'guide'].forEach(product => {
            const checkbox = document.getElementById(`check-${product}`);
            if (checkbox) {
                checkbox.addEventListener('change', () => toggleProduct(product));
            }
        
            // Quantity buttons
            const increaseBtnProduct = document.getElementById(`increase-${product}`);
            const decreaseBtnProduct = document.getElementById(`decrease-${product}`);
            
            if (increaseBtnProduct) {
                increaseBtnProduct.addEventListener('click', () => changeQty(product, 1));
            }
            if (decreaseBtnProduct) {
                decreaseBtnProduct.addEventListener('click', () => changeQty(product, -1));
            }
        });

        // ==================== INITIALIZATION ====================
        updateMemberSummary();
        updateSummary(); // Initialize summary with base trip cost

        // ==================== SWIPER INITIALIZATION ====================
        new Swiper(".mySwiper", {
            loop: true,
            pagination: { el: ".swiper-pagination", clickable: true },
            navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
        });

    </script>

</body>
</html>