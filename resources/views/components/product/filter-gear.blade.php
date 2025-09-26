<!-- Kategori Alat -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-2xl md:text-3xl font-bold mb-8 text-center">
       Gear Category
    </h2>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-6">
        <div class="filter-btn bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col items-center text-center"
            data-filter="carrier">
            <i class="fa-solid fa-hiking text-4xl mb-4 text-secondary"></i>
            <h3 class="font-semibold mb-2">Carrier</h3>
            <p class="text-sm text-neutral-500">
                Quality hiking backpacks & carriers.
            </p>
        </div>
        <div class="filter-btn bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col items-center text-center"
            data-filter="tenda">
            <i class="fa-solid fa-mountain-sun text-4xl mb-4 text-secondary"></i>
            <h3 class="font-semibold mb-2">Tend</h3>
            <p class="text-sm text-neutral-500">
                Durable, lightweight, and waterproof tents for every journey.
            </p>
        </div>
        <div class="filter-btn bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col items-center text-center"
            data-filter="kompor">
            <i class="fa-solid fa-fire text-4xl mb-4 text-secondary"></i>
            <h3 class="font-semibold mb-2">Stoves & Cooking Gear</h3>
            <p class="text-sm text-neutral-500">
                Compact and portable cookware for camping adventures.
            </p>
        </div>
        <div class="filter-btn bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col items-center text-center"
            data-filter="hydration">
            <i class="fa-solid fa-mug-saucer text-4xl mb-4 text-secondary"></i>
            <h3 class="font-semibold mb-2">Drinkware & Hydration</h3>
            <p class="text-sm text-neutral-500">
                Water bottles, filters, and hydration gear.
            </p>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const buttons = document.querySelectorAll(".filter-btn");
        const items = document.querySelectorAll(".product-card");

        let activeFilter = "all"; // default semua tampil

        buttons.forEach(btn => {
            btn.addEventListener("click", () => {
                const filter = btn.dataset.filter;

                // kalau tombol sama diklik lagi -> reset ke default
                if (activeFilter === filter) {
                    activeFilter = "all";
                } else {
                    activeFilter = filter;
                }

                items.forEach(item => {
                    const category = item.dataset.category;

                    if (activeFilter === "all" || category === activeFilter) {
                        item.style.display = "block";
                        gsap.to(item, {
                            opacity: 1,
                            scale: 1,
                            duration: 0.4,
                            pointerEvents: "auto"
                        });
                    } else {
                        gsap.to(item, {
                            opacity: 0,
                            scale: 0.8,
                            duration: 0.2,
                            pointerEvents: "none",
                            onComplete: () => {
                                item.style.display = "none";
                            }
                        });
                    }
                });
            });
        });
    });
</script>

