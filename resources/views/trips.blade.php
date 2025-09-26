<x-guest-layout>
    <main class="max-w-screen-xl mx-auto p-4">
        <div class="w-full flex justify-center">
            <div class="space-y-6 w-full md:w-5/6 lg:w-4/5 mx-auto">
                <x-trip-detail.hero></x-trip-detail.hero>
                <x-trip-detail.title></x-trip-detail.title>
                <x-trip-detail.info></x-trip-detail.info>
                <x-trip-detail.overview></x-trip-detail.overview>
                <x-trip-detail.package></x-trip-detail.package>
                <x-trip-detail.additional></x-trip-detail.additional>
                <x-trip-detail.summary></x-trip-detail.summary>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            /* =========================
               DATA & STATE
               ========================= */
            const paketData = {
                reguler: {
                    include: ["Transportasi PP", "Makan 3x", "Tiket masuk wisata"],
                    exclude: ["Pengeluaran pribadi", "Sewa perlengkapan pribadi"]
                },
                premium: {
                    include: ["Transportasi PP", "Makan 3x", "Tiket masuk wisata", "Gratis Sewa 1 tenda"],
                    exclude: ["Pengeluaran pribadi", "Alat pribadi tambahan diluar paket"]
                },
                exclusive: {
                    include: ["Transportasi PP", "Makan 3x", "Tiket masuk wisata", "Gratis Sewa 1 tenda",
                        "Porter & Guide otomatis termasuk paket"
                    ],
                    exclude: ["Pengeluaran pribadi", "Sewa perlengkapan pribadi", "Biaya tambahan diluar paket"]
                }
            };
            const paketHarga = {
                reguler: 250000,
                premium: 360000,
                exclusive: 700000
            };
            const basePrices = {
                tripod: 15000,
                lampu: 10000,
                matras: 10000,
                kompor: 20000
            };

            let selectedPaket = "reguler";
            const bookedDates = []; // tanggal yang dipilih (YYYY-MM-DD)
            let memberCount = 1;

            /* =========================
               HELPERS
               ========================= */
            function capitalize(s) {
                return s.charAt(0).toUpperCase() + s.slice(1);
            }

            function getDurationNights() {
                return bookedDates.length > 1 ? bookedDates.length - 1 : 1;
            }

            function toIDDateStr(d) {
                return d.toISOString().split("T")[0];
            }

            /* =========================
               CACHE DOM
               ========================= */
            const jadwalContainer = document.getElementById("jadwal");
            const paketContainer = document.getElementById("paketContainer");
            const paketDetail = document.getElementById("paketDetail");
            const summaryList = document.getElementById("summary-list");
            const ringkasanEl = document.getElementById("ringkasan-pesanan");
            const memberCountEl = document.getElementById("summary-member-count");
            const increaseBtn = document.getElementById("increase-member");
            const decreaseBtn = document.getElementById("decrease-member");

            /* =========================
               JADWAL (generate 3 tanggal berikutnya sesuai allowedDays)
               ========================= */
            (function generateJadwal() {
                if (!jadwalContainer) return;
                jadwalContainer.innerHTML = "";
                const options = {
                    day: "numeric",
                    month: "short",
                    year: "numeric"
                };
                const today = new Date();
                const allowedDays = [5, 6, 0]; // Fri, Sat, Sun
                let added = 0,
                    i = 0;
                while (added < 3) {
                    const date = new Date(today);
                    date.setDate(today.getDate() + i);
                    if (allowedDays.includes(date.getDay())) {
                        const span = document.createElement("span");
                        span.textContent = date.toLocaleDateString("id-ID", options);
                        span.className =
                            "px-3 py-1 rounded-full bg-pink-100 text-pink-800 text-sm font-medium cursor-pointer transition";
                        const dateStr = toIDDateStr(date);
                        span.dataset.date = dateStr;
                        span.addEventListener("click", () => {
                            const idx = bookedDates.indexOf(dateStr);
                            if (idx !== -1) {
                                bookedDates.splice(idx, 1);
                                span.classList.remove("bg-pink-600", "text-white");
                                span.classList.add("bg-pink-100", "text-pink-800");
                            } else {
                                bookedDates.push(dateStr);
                                bookedDates.sort();
                                span.classList.remove("bg-pink-100", "text-pink-800");
                                span.classList.add("bg-pink-600", "text-white");
                            }
                            updateSummary();
                        });
                        jadwalContainer.appendChild(span);
                        added++;
                    }
                    i++;
                }
            })();

            /* =========================
               PAKET (generate cards + detail)
               ========================= */
            function generatePaketCards() {
                if (!paketContainer) return;
                paketContainer.innerHTML = "";
                for (const key in paketData) {
                    const card = document.createElement("div");
                    card.className =
                        "bg-white p-6 rounded-xl shadow cursor-pointer hover:scale-[1.02] transition relative";
                    card.innerHTML = `
        <h3 class="text-lg font-bold mb-2">${capitalize(key)}</h3>
        <span class="absolute bottom-3 right-3 bg-green-100 text-green-700 px-2 py-1 rounded text-sm font-semibold">
          Rp ${paketHarga[key].toLocaleString("id-ID")}
        </span>
      `;
                    card.addEventListener("click", () => showDetail(key));
                    paketContainer.appendChild(card);
                }
            }

            function showDetail(paket) {
                selectedPaket = paket;
                // highlight
                Array.from(paketContainer.children).forEach(card => {
                    card.classList.remove("border-2", "border-blue-500");
                    if (card.textContent.toLowerCase().includes(paket)) card.classList.add("border-2",
                        "border-blue-500");
                });

                paketDetail.classList.remove("hidden");
                const includeList = paketData[paket].include.map(i => `<li>✓ ${i}</li>`).join("");
                const excludeList = paketData[paket].exclude.map(i => `<li>✕ ${i}</li>`).join("");
                let porterGuideHtml = "";

                if (paket === "premium") {
                    porterGuideHtml = `
        <div class="mt-4 flex gap-4">
          <label class="flex items-center gap-2"><input type="checkbox" id="check-porter"> Porter</label>
          <label class="flex items-center gap-2"><input type="checkbox" id="check-guide"> Guide</label>
        </div>
      `;
                } else if (paket === "exclusive") {
                    porterGuideHtml =
                        `<div class="mt-4 flex gap-4"><span class="px-2 py-1 bg-gray-200 rounded">Porter & Guide termasuk paket</span></div>`;
                }

                paketDetail.innerHTML = `
      <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-xl font-bold mb-4">Fasilitas</h3>
        <div class="mb-4">
          <h4 class="font-semibold text-green-600 mb-3">Include</h4>
          <ul>${includeList}</ul>
        </div>
        <hr class="my-6 border-gray-300">
        <div>
          <h4 class="font-semibold text-red-600 mb-3">Exclude</h4>
          <ul>${excludeList}</ul>
        </div>
        ${porterGuideHtml}
      </div>
    `;

                // attach listeners (jika ada)
                document.getElementById("check-porter")?.addEventListener("change", updateSummary);
                document.getElementById("check-guide")?.addEventListener("change", updateSummary);

                updateSummary();
            }

            /* =========================
               PRODUK TAMBAHAN (toggle, qty, price)
               HTML sudah punya struktur check-* dan detail-* serta qty-item-* dan price-*
               ========================= */
            function toggleProduct(product) {
                const checkEl = document.getElementById(`check-${product}`);
                const detailEl = document.getElementById(`detail-${product}`);
                const qtyEl = document.getElementById(`qty-item-${product}`);
                const priceEl = document.getElementById(`price-${product}`);
                if (!checkEl) return;
                if (checkEl.checked) {
                    detailEl?.classList.remove("hidden");
                    if (qtyEl) qtyEl.textContent = "1";
                    updatePrice(product);
                } else {
                    detailEl?.classList.add("hidden");
                    if (qtyEl) qtyEl.textContent = "0";
                    if (priceEl) priceEl.textContent = "Rp 0";
                    updateSummary();
                }
            }
            // expose untuk atribut onchange inline
            window.toggleProduct = toggleProduct;

            function changeQty(product, amount) {
                const qtyEl = document.getElementById(`qty-item-${product}`);
                if (!qtyEl) return;
                let qty = parseInt(qtyEl.textContent) || 1;
                qty = Math.max(1, qty + amount);
                qtyEl.textContent = qty;
                updatePrice(product);
            }
            // expose untuk onclick inline
            window.changeQty = changeQty;

            function updatePrice(product) {
                const qty = parseInt(document.getElementById(`qty-item-${product}`)?.textContent) || 1;
                const nights = getDurationNights();
                const total = basePrices[product] * qty * nights;
                const priceEl = document.getElementById(`price-${product}`);
                if (priceEl) priceEl.textContent = `Rp ${total.toLocaleString("id-ID")}`;
                updateSummary();
            }

            /* =========================
               RINGKASAN (single source of truth)
               ========================= */
            function updateSummary() {
                if (!summaryList) return;
                summaryList.innerHTML = "";
                let total = 0;

                // Tanggal & durasi
                if (bookedDates.length > 0) {
                    bookedDates.sort();
                    const start = new Date(bookedDates[0]);
                    const end = new Date(bookedDates[bookedDates.length - 1]);
                    const startStr = start.toLocaleDateString("id-ID", {
                        day: "numeric",
                        month: "numeric"
                    });
                    const endStr = end.toLocaleDateString("id-ID", {
                        day: "numeric",
                        month: "numeric"
                    });
                    const durationDays = bookedDates.length;
                    const durationNights = Math.max(durationDays - 1, 1);
                    summaryList.innerHTML +=
                        `<div>${startStr}-${endStr} ${durationDays} hari ${durationNights} malam</div>`;
                } else {
                    summaryList.innerHTML += `<div>Belum pilih tanggal</div>`;
                }

                // Paket
                if (selectedPaket && paketHarga[selectedPaket] !== undefined) {
                    const paketPrice = paketHarga[selectedPaket];
                    total += paketPrice;
                    summaryList.innerHTML +=
                        `<div>Paket: ${capitalize(selectedPaket)} (Rp ${paketPrice.toLocaleString("id-ID")})</div>`;
                } else {
                    summaryList.innerHTML += `<div>Belum pilih paket</div>`;
                }

                // Porter & Guide
                const porterCheckbox = document.getElementById("check-porter");
                const guideCheckbox = document.getElementById("check-guide");
                if (selectedPaket === "premium") {
                    if (porterCheckbox?.checked) summaryList.innerHTML += `<div>Porter - 1</div>`;
                    if (guideCheckbox?.checked) summaryList.innerHTML += `<div>Guide - 1</div>`;
                } else if (selectedPaket === "exclusive") {
                    summaryList.innerHTML += `<div>Porter - 1</div><div>Guide - 1</div>`;
                }

                // Produk tambahan
                const nights = getDurationNights();
                for (const product in basePrices) {
                    const checkEl = document.getElementById(`check-${product}`);
                    if (checkEl && checkEl.checked) {
                        const qty = parseInt(document.getElementById(`qty-item-${product}`)?.textContent) || 1;
                        const priceNum = basePrices[product] * qty * nights;
                        total += priceNum;
                        summaryList.innerHTML +=
                            `<div>${capitalize(product)} - ${qty} pcs × ${nights} malam (Rp ${priceNum.toLocaleString("id-ID")})</div>`;
                    }
                }

                // Anggota (display)
                summaryList.innerHTML += `<div>Anggota: ${memberCount} orang</div>`;

                // Total
                let totalPriceEl = document.getElementById("total-price");
                if (!totalPriceEl) {
                    totalPriceEl = document.createElement("div");
                    totalPriceEl.id = "total-price";
                    totalPriceEl.className = "text-right font-bold mt-4 text-lg";
                    ringkasanEl?.appendChild(totalPriceEl);
                }
                totalPriceEl.textContent = `Rp ${total.toLocaleString("id-ID")}`;
            }

            /* =========================
               MEMBER COUNT
               ========================= */
            function updateMemberSummary() {
                if (memberCountEl) memberCountEl.textContent = `${memberCount} orang`;
                updateSummary();
            }
            increaseBtn?.addEventListener("click", () => {
                if (memberCount < 15) {
                    memberCount++;
                    updateMemberSummary();
                }
            });
            decreaseBtn?.addEventListener("click", () => {
                if (memberCount > 1) {
                    memberCount--;
                    updateMemberSummary();
                }
            });
            updateMemberSummary();

            /* =========================
               HEADER MOBILE (menu + dropdown)
               ========================= */
            const menuBtn = document.getElementById("menu-btn");
            const mobileMenu = document.getElementById("mobile-menu");
            menuBtn?.addEventListener("click", () => mobileMenu?.classList.toggle("hidden"));

            window.toggleMobileDropdown = function() {
                const dropdown = document.getElementById("mobile-dropdown");
                const icon = document.getElementById("mobile-dropdown-icon");
                dropdown?.classList.toggle("hidden");
                icon?.classList.toggle("rotate-180");
            };

            /* =========================
               ATTACH CHECKBOX LISTENERS (produk)
               ========================= */
            ["tripod", "lampu", "matras", "kompor"].forEach(p => {
                const ch = document.getElementById(`check-${p}`);
                if (ch) ch.addEventListener("change", () => toggleProduct(p));
            });

            /* =========================
               INIT
               ========================= */
            generatePaketCards();
            showDetail(selectedPaket);
            updateSummary();
        });
    </script>

</x-guest-layout>
