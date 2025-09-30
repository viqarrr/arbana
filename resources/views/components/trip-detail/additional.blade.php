<div class="bg-white p-6 rounded-xl shadow mt-6">
    <h3 class="text-xl font-bold mb-4">Produk Additional</h3>

    <!-- Trigger Dropdown -->
    <input type="checkbox" id="toggle-products" class="peer hidden">
    <label for="toggle-products" class="flex justify-between items-center p-3 border rounded-lg cursor-pointer">
        <span class="font-semibold text-gray-800">Lihat Daftar Produk</span>
        <span class="transition-transform duration-300 peer-checked:rotate-90">➤</span>
    </label>

    <!-- Isi Dropdown -->
    <div
        class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out peer-checked:max-h-[500px] peer-checked:mt-4 space-y-3">

        <!-- Tripod -->
        <div
            class="border rounded-xl p-4 shadow-sm flex items-center justify-between text-sm font-medium text-gray-700">
            <div class="flex items-center gap-2 w-1/2">
                <input type="checkbox" id="check-tripod" onchange="toggleProduct('tripod')" class="w-5 h-5">
                <label for="check-tripod" class="font-semibold text-gray-800">Tripod</label>
            </div>
            <div id="detail-tripod" class="flex items-center gap-4 hidden">
                <div class="flex items-center gap-2">
                    <button onclick="changeQty('tripod',-1)"
                        class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                    <span id="qty-item-tripod" class="w-6 text-center font-semibold">1</span>
                    <button onclick="changeQty('tripod',1)"
                        class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                </div>
                <span id="price-tripod" class="text-green-600 font-bold text-center">Rp 0</span>
            </div>
        </div>

        <!-- Lampu -->
        <div
            class="border rounded-xl p-4 shadow-sm flex items-center justify-between text-sm font-medium text-gray-700">
            <div class="flex items-center gap-2 w-1/2">
                <input type="checkbox" id="check-lampu" onchange="toggleProduct('lampu')" class="w-5 h-5">
                <label for="check-lampu" class="font-semibold text-gray-800">Lampu</label>
            </div>
            <div id="detail-lampu" class="flex items-center gap-4 hidden">
                <div class="flex items-center gap-2">
                    <button onclick="changeQty('lampu',-1)"
                        class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                    <span id="qty-item-lampu" class="w-6 text-center font-semibold">1</span>
                    <button onclick="changeQty('lampu',1)"
                        class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                </div>
                <span id="price-lampu" class="text-green-600 font-bold text-center">Rp 0</span>
            </div>
        </div>
    </div>
</div>
