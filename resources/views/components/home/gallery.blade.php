@props(['destinations' => []])

<section>
    <div class="flex items-center">
        <div class="flex flex-col items-start basis-1/2 px-4 sm:px-6 lg:px-24 pb-20">
            <div class="mt-8 max-w-2xl text-start">
                <h1 class="block">
                    <div class="font-semibold text-secondary text-3xl">Popular Destination</div>
                    <div class="font-normal text-xl text-gray-500 mt-2">Lorem ipsum dolor sit amet, consectetur.</div>
                </h1>
            </div>
        </div>
    </div>
</section>

<section class="max-w-7xl mx-4 md:mx-auto">
    <div
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 auto-rows-[200px] lg:auto-rows-[250px] lg:scale-104">
        @foreach ($destinations as $destination)
            <div onclick="openModal('{{ $destination['city'] }}')"
                class="relative rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 group
        {{ $loop->index === 0 ? 'sm:col-span-2 lg:col-span-2 lg:row-span-2 shadow-xl hover:shadow-2xl' : '' }}">
                <img src="{{ asset('storage/' . $destination['image']) }}" alt="{{ $destination['city'] }}"
                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" />
                <div
                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent p-3 text-white group-hover:from-black/80 group-hover:via-black/50 transition-colors duration-500">
                    <p class="text-xs">{{ $destination['region'] }}</p>
                    <h2 class="font-semibold text-base sm:text-xl">{{ $destination['city'] }}</h2>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Modal -->
<div id="destinationModal" class="fixed inset-0 bg-black/70 hidden z-50 flex items-center justify-center p-4">
    <div id="modalContent"
        class="bg-white rounded-xl shadow-xl max-w-3xl w-full relative overflow-hidden opacity-0 translate-y-10">
        <button id="closeModal" class="absolute top-3 right-3 text-gray-600 hover:text-red-500">✕</button>
        <div class="grid md:grid-cols-2">
            <div id="modalImageWrapper" class="h-64 md:h-auto">
                <img id="modalImage" src="" alt="Destination" class="w-full h-full object-cover" />
            </div>
            <div class="p-6 flex flex-col justify-center">
                <p id="modalSubtitle" class="text-sm text-gray-500"></p>
                <h2 id="modalTitle" class="text-2xl font-bold mb-3"></h2>
                <p id="modalDescription" class="text-gray-600 text-sm leading-relaxed"></p>
            </div>
        </div>
    </div>
</div>

<script>
    const storageBase = "{{ asset('storage') }}/";
    const destinations = @json($destinations);

    const modal = document.getElementById("destinationModal");
    const modalContent = document.getElementById("modalContent");
    const modalImage = document.getElementById("modalImage");
    const modalTitle = document.getElementById("modalTitle");
    const modalSubtitle = document.getElementById("modalSubtitle");
    const modalDescription = document.getElementById("modalDescription");
    const closeModal = document.getElementById("closeModal");

    function openModal(city) {
        const data = destinations.find(d => d.city === city);

        modalImage.src = storageBase + data.image;
        modalTitle.textContent = data.city;
        modalSubtitle.textContent = data.region;
        modalDescription.innerHTML = data.description;

        modal.classList.remove("hidden");
        gsap.fromTo(modalContent, {
            opacity: 0,
            y: 50
        }, {
            opacity: 1,
            y: 0,
            duration: 0.5,
            ease: "power3.out"
        });
    }

    function closeModalFn() {
        gsap.to(modalContent, {
            opacity: 0,
            y: 50,
            duration: 0.4,
            ease: "power3.in",
            onComplete: () => modal.classList.add("hidden")
        });
    }

    closeModal.addEventListener("click", closeModalFn);
    modal.addEventListener("click", e => {
        if (e.target === modal) closeModalFn();
    });
</script>
