  @props(['products'])

  <section class="max-w-7xl mx-auto px-6 py-10">
      <!-- Large Modal -->
      <div id="large-modal" tabindex="-1"
          class="fixed inset-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto bg-black/40 backdrop-blur-sm">
          <div class="relative w-full max-w-4xl mx-auto my-8">
              <!-- Modal content -->
              <div class="relative bg-white rounded-lg shadow-md overflow-hidden">

                  <!-- Tombol Close di pojok kanan atas -->
                  <button type="button"
                      class="absolute top-4 right-4 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center z-10"
                      data-modal-hide="large-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>

                  <!-- Modal body -->
                  <div class="max-w-screen px-4 py-8 md:mx-8">
                      <div class="flex flex-col lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16 items-center">
                          <!-- Gambar -->
                          <div class="w-full max-w-md lg:max-w-lg mx-auto mb-6 lg:mb-0">
                              <div class="py-4 md:py-5">
                                  <img id="modal-image" src="{{ url('storage/images/carir l.jpg') }}"
                                      class="w-full h-64 sm:h-72 md:h-80 object-contain rounded-lg" alt="carir">
                              </div>
                          </div>

                          <!-- Detail Produk -->
                          <div class="w-full text-left">
                              <h1 class="text-xl font-semibold text-black sm:text-2xl modal-name">
                                  Carrier
                              </h1>

                              <div class="mt-4 mb-6">
                                  <p class="text-2xl font-extrabold text-black sm:text-3xl" id="modal-price">
                                      Rp1.249.999
                                  </p>
                              </div>

                              <p id="modal-description" class="mb-8 text-gray-500 dark:text-gray-400 max-w-sm">
                                  Studio quality three mic array for crystal clear calls and voice recordings.
                                  Six-speaker sound system for a remarkably robust and high-quality audio experience.
                                  Up to 256GB of ultrafast SSD storage.
                              </p>

                              <!-- Tombol Order -->
                              <button
                                  class="bg-amber-400 hover:bg-amber-500  text-white font-semibold px-6 py-3 rounded-lg shadow-md transition-all duration-200">
                                  Order Sekarang
                              </button>
                          </div>
                      </div>
                  </div>
                  <!-- End Modal body -->
              </div>
          </div>
      </div>


      <div id="product-list" class="grid grid-cols-1 md:grid-cols-4 gap-6 grid-flow-row-dense">
          @foreach ($products as $product)
              <div class="product-card" data-category="tenda">
                  <div
                      class="w-full md:max-w-xs mx-auto mb-20 relative rounded-3xl overflow-hidden shadow-lg group border-black">
                      <!-- Background image -->
                      @if ($product->image)
                          <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                              class="w-full h-92 md:h-72 object-cover transform group-hover:scale-110 transition duration-500" />
                      @else
                          <div
                              class="w-full h-92 md:h-72 flex justify-center items-center transform group-hover:scale-110 transition duration-500">
                              <i class="fas fa-box text-gray-300 text-5xl"></i>
                          </div>
                      @endif

                      <!-- Gradient overlay bawah -->
                      <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

                      <!-- Content -->
                      <div class="absolute bottom-0 p-4 text-white w-full">
                          <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                          <p class="text-sm text-gray-200">{{ Str::limit(strip_tags($product->description), 100) }}</p>

                          <!-- Price -->
                          <div class="mt-3 flex items-center">
                              <span
                                  class="text-xl font-bold text-amber-400">Rp{{ number_format($product->price_one_day, 0, ',', '.') }}</span>
                          </div>
                          <div class="mt-4 flex gap-2">
                              <button
                                  class="inline-flex gap-1.5 justify-center items-center bg-gray-100 text-amber-400 basis-1/2 px-2 py-1 rounded-lg hover:bg-gray-200"
                                  data-modal-target="large-modal" data-modal-toggle="large-modal"
                                  data-product='@json($product)'>
                                  <svg class="w-5 h-5 text-amber-400" aria-hidden="true"
                                      xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                      viewBox="0 0 24 24">
                                      <path stroke="currentColor" stroke-width="2"
                                          d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                      <path stroke="currentColor" stroke-width="2"
                                          d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                  </svg>
                                  View</button>
                              <button
                                  class="order-btn inline-flex gap-1.5 justify-center items-center bg-amber-400 hover:bg-amber-500 basis-1/2 px-2 py-1 rounded-lg"
                                  data-product='@json($product)'>
                                  <svg class="w-5 h-5 text-gray-100" aria-hidden="true"
                                      xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                      viewBox="0 0 24 24">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                  </svg>
                                  Order
                              </button>
                          </div>
                      </div>
                  </div>
              </div>
          @endforeach
          <!-- Card Item -->
          <div class="product-card" data-category="tenda">
              <div
                  class="w-full md:max-w-xs mx-auto mb-20 relative rounded-3xl overflow-hidden shadow-lg group border-black">
                  <!-- Background image -->
                  <img src="{{ url('storage/images/kursi lipat.webp') }}" alt="Product"
                      class="w-full h-92 md:h-72 object-cover transform group-hover:scale-110 transition duration-500" />

                  <!-- Gradient overlay bawah -->
                  <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

                  <!-- Content -->
                  <div class="absolute bottom-0 p-4 text-white w-full">
                      <h3 class="text-lg font-semibold">Folding Chair</h3>
                      <p class="text-sm text-gray-200">Durable folding chair</p>

                      <!-- Price -->
                      <div class="mt-3 flex items-center">
                          <span class="text-xl font-bold text-amber-400">Rp 13.000</span>
                          <span class="text-md font-normal text-amber-400"></span>
                      </div>
                      <div class="mt-4 flex gap-2">
                          <button
                              class="inline-flex gap-1.5 justify-center items-center bg-gray-100 text-amber-400 basis-1/2 px-2 py-1 rounded-lg hover:bg-gray-200"
                              data-modal-target="large-modal" data-modal-toggle="large-modal">
                              <svg class="w-5 h-5 text-amber-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                  width="24" height="24" fill="none" viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-width="2"
                                      d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                  <path stroke="currentColor" stroke-width="2"
                                      d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                              </svg>
                              View</button>
                          <button
                              class="order-btn inline-flex gap-1.5 justify-center items-center bg-amber-400 hover:bg-amber-500 basis-1/2 px-2 py-1 rounded-lg"
                              data-title="Portable Chair" data-price1="13000" data-price2="18000"
                              data-priceplus="5000">
                              <svg class="w-5 h-5 text-gray-100" aria-hidden="true"
                                  xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                  viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                              </svg>
                              Order
                          </button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Floating Order Card -->
  <div id="floating-order-card"
      class="fixed bottom-6 right-6 w-96 bg-white shadow-2xl rounded-xl p-4 border border-gray-200 z-80 hidden">
      <h3 class="text-lg font-bold mb-2">Your Order</h3>

      <!-- List item pesanan -->
      <div id="order-list" class="space-y-3 max-h-64 overflow-y-auto"></div>

      <hr class="my-3">

      <!-- Total -->
      <div class="flex justify-between font-bold text-lg">
          <span>Total</span>
          <span id="order-total">Rp 0</span>
      </div>

      <!-- Tombol -->
      <button class="w-full mt-3 bg-amber-600 hover:bg-amber-700 text-white py-2 px-4 rounded-lg font-semibold">
          Order Now
      </button>
  </div>

  <script>
      const orderCard = document.getElementById("floating-order-card");
      const orderList = document.getElementById("order-list");
      const orderTotal = document.getElementById("order-total");

      let totalPrice = 0;

      document.querySelectorAll(".order-btn").forEach((btn) => {
          btn.addEventListener("click", () => {
              const product = JSON.parse(btn.dataset.product);
              const title = product.name;

              const price1 = parseInt(product.price_one_day);
              const price2 = parseInt(product.price_two_days);
              const pricePlus = parseInt(product.price_extra_per_day);

              let existingItem = orderList.querySelector(`[data-title="${title}"]`);
              if (!existingItem) {
                  const today = new Date();
                  const tomorrow = new Date();
                  tomorrow.setDate(today.getDate() + 1);
                  const formatDate = (d) => d.toISOString().split("T")[0];
                  const minDate = formatDate(today);

                  const item = document.createElement("div");
                  item.className = "flex flex-col border-b pb-3";
                  item.dataset.title = title;
                  item.dataset.price1 = price1;
                  item.dataset.price2 = price2;
                  item.dataset.priceplus = pricePlus;
                  item.dataset.days = 1;


                  item.innerHTML = `
              <div class="flex justify-between items-center">
                <span class="font-medium">${title}</span>
                <span class="item-subtotal font-semibold">Rp ${price1.toLocaleString()}</span>
              </div>
              <div class="flex justify-between items-center text-xs text-gray-600 mt-1">
                <div>
                  <span class="item-qty">1</span> x Rp ${price1.toLocaleString()}
                </div>
                <div class="flex items-center gap-2">
                  <button class="decrease-btn bg-amber-500 text-white w-6 h-6 rounded-full flex items-center justify-center">-</button>
                  <button class="increase-btn bg-amber-500 text-white w-6 h-6 rounded-full flex items-center justify-center">+</button>
                </div>
              </div>
              <div class="flex justify-between items-center text-xs text-gray-700 mt-2 gap-2">
                <div class="flex flex-col flex-1">
                  <label class="text-[10px]">Start</label>
                  <input type="date" min="${minDate}" value="${formatDate(today)}" class="start-date border rounded px-1 text-xs">
                </div>
                <div class="flex flex-col flex-1">
                  <label class="text-[10px]">End</label>
                  <input type="date" min="${minDate}" value="${formatDate(tomorrow)}" class="end-date border rounded px-1 text-xs">
                </div>
              </div>
              <div class="text-xs text-gray-500 mt-1 flex justify-between">
                <span class="item-days">Durasi: 1 hari</span>
              </div>
          `;
                  orderList.appendChild(item);

                  // qty btns
                  item.querySelector(".decrease-btn").addEventListener("click", () => {
                      let qty = parseInt(item.querySelector(".item-qty").textContent);
                      if (qty > 1) {
                          qty--;
                          item.querySelector(".item-qty").textContent = qty;
                          updateSubtotal(item);
                      } else {
                          orderList.removeChild(item);
                      }
                      recalcTotal();
                  });

                  item.querySelector(".increase-btn").addEventListener("click", () => {
                      let qty = parseInt(item.querySelector(".item-qty").textContent);
                      qty++;
                      item.querySelector(".item-qty").textContent = qty;
                      updateSubtotal(item);
                  });

                  // date pickers
                  const startInput = item.querySelector(".start-date");
                  const endInput = item.querySelector(".end-date");

                  function updateDays() {
                      const startDate = new Date(startInput.value);
                      const endDate = new Date(endInput.value);

                      // 🔥 atur minimal end date harus +1 dari start
                      if (startInput.value) {
                          let minEnd = new Date(startDate);
                          minEnd.setDate(startDate.getDate() + 1);
                          endInput.min = minEnd.toISOString().split("T")[0];
                      }

                      if (startInput.value && endInput.value && endDate >= startDate) {
                          // hitung hari (exclusive start, jadi 25 → 26 = 1 hari)
                          const days = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
                          item.dataset.days = days;
                          item.querySelector(".item-days").textContent = `Duration: ${days} day`;
                          updateSubtotal(item);
                      } else {
                          item.querySelector(".item-days").textContent = "Durasi: -";
                          item.querySelector(".item-subtotal").textContent = "Rp 0";
                      }
                  }

                  startInput.addEventListener("change", () => {
                      updateDays();
                      // reset end date kalau lebih kecil dari min
                      if (endInput.value < endInput.min) {
                          endInput.value = endInput.min;
                      }
                      updateDays();
                  });
                  endInput.addEventListener("change", updateDays);

                  updateDays();


                  startInput.addEventListener("change", updateDays);
                  endInput.addEventListener("change", updateDays);

                  updateSubtotal(item);
              }

              orderCard.classList.remove("hidden");
          });
      });

      // custom price rules
      function getCustomPrice(item) {
          const days = parseInt(item.dataset.days) || 1;
          const qty = parseInt(item.querySelector(".item-qty").textContent);

          const price1 = parseInt(item.dataset.price1);
          const price2 = parseInt(item.dataset.price2);
          const pricePlus = parseInt(item.dataset.priceplus);

          let total = 0;
          if (days === 1) total = price1;
          else if (days === 2) total = price2;
          else if (days > 2) total = price2 + (days - 2) * pricePlus;

          return total * qty;
      }

      function updateSubtotal(item) {
          const subtotal = getCustomPrice(item);
          item.querySelector(".item-subtotal").textContent = "Rp " + subtotal.toLocaleString();
          recalcTotal();
      }

      function recalcTotal() {
          totalPrice = 0;
          orderList.querySelectorAll("[data-title]").forEach((item) => {
              totalPrice += getCustomPrice(item);
          });
          orderTotal.textContent = "Rp " + totalPrice.toLocaleString();
          if (totalPrice === 0) orderCard.classList.add("hidden");
      }
  </script>
  <script>
      document.addEventListener("DOMContentLoaded", () => {
          const storageBase = "{{ asset('storage') }}/";
          const modalImage = document.getElementById("modal-image");
          const modalName = document.querySelectorAll(".modal-name");
          const modalDescription = document.getElementById("modal-description");
          const modalPrice = document.getElementById("modal-price");

          document.querySelectorAll("[data-modal-target='large-modal']").forEach(button => {
              button.addEventListener("click", () => {
                  const product = JSON.parse(button.dataset.product);

                  modalImage.src = storageBase + product.image;
                  modalName.forEach(name => name.textContent = product.name);
                  modalDescription.innerHTML = product.description;
                  modalPrice.textContent =
                      `Rp${parseInt(product.price_one_day).toLocaleString('id-ID')}`;
              });
          });
      });
  </script>
