<!-- destinasi populer -->
<section>
    <div class="flex items-center">
        <div class="flex flex-col items-start basis-1/2 px-4 sm:px-6 lg:px-24 pb-20 ">
            <!-- Title -->
            <div class="mt-8 max-w-2xl text-start">
                <h1 class="block">
                    <div class="font-semibold text-secondary text-3xl">Populer Destination</div>
                    <div class="font-normal text-xl text-gray-500 mt-2">Lorem ipsum dolor sit amet, consectetur.</div>
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- End about -->

<!-- card kegiatan -->
<section class="max-w-7xl mx-4 md:mx-auto">
    <!-- Bento Grid -->
    <div
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 auto-rows-[200px] lg:auto-rows-[250px] lg:scale-104">
        <!-- BIG CARD (Testimoni) -->
        <div onclick="openModal('bromo')"
            class="relative rounded-xl overflow-hidden sm:col-span-2 lg:col-span-2 lg:row-span-2 shadow-xl hover:shadow-2xl transition-all duration-500 group">
            <img src="{{ url('storage/images/volcano-with-mist-sunset.jpg') }}" alt="Bromo"
                class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" />
            <div
                class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-4 text-white group-hover:from-black/90 group-hover:via-black/60 transition-colors duration-500">
                <p class="text-sm">The beauty of bromo</p>
                <h2 class="font-bold text-xl sm:text-2xl">
                    Country Above The Clouds
                </h2>
                <div class="flex mt-2 space-x-2">
                    <img src="https://randomuser.me/api/portraits/women/1.jpg"
                        class="w-8 h-8 rounded-full border-2 border-white" />
                    <img src="https://randomuser.me/api/portraits/men/2.jpg"
                        class="w-8 h-8 rounded-full border-2 border-white -ml-3" />
                    <img src="https://randomuser.me/api/portraits/women/3.jpg"
                        class="w-8 h-8 rounded-full border-2 border-white -ml-3" />
                </div>
            </div>
        </div>

        <!-- Small Card -->
        <div class="relative rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 group"
        onclick="openModal('lawu')"
        >
            <img src="{{ url('storage/images/lawu.webp') }}" alt="Camping"
                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
            <div
                class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent p-3 text-white group-hover:from-black/80 group-hover:via-black/50 transition-colors duration-500">
                <p class="text-xs">The Challenge of Lawu</p>
                <h2 class="font-semibold text-base">Mystic Peaks Above the Mist</h2>
            </div>
        </div>

        <!-- Small Card 2 -->
        <div class="relative rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 group"
        onclick="openModal('raung')"
        >
            <img src="{{ url('storage/images/raung.webp') }}" alt="Travel"
                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
            <div
                class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent p-3 text-white group-hover:from-black/80 group-hover:via-black/50 transition-colors duration-500">
                <p class="text-xs">The Wild Spirit of Raung</p>
                <h2 class="font-semibold text-base">Untamed Adventure</h2>
            </div>
        </div>

        <!-- Small Card 3 -->
        <div class="relative rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 group"
        onclick="openModal('argopuro')"
        >
            <img src="{{ url('storage/images/argopuro.webp') }}"
                alt="Campfire"
                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
            <div
                class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent p-3 text-white group-hover:from-black/80 group-hover:via-black/50 transition-colors duration-500">
                <p class="text-xs">The Endless Trail of Argopuro</p>
                <h2 class="font-semibold text-base">Journey Above the Wild</h2>
            </div>
        </div>

        <!-- Small Card 4 -->
        <div class="relative rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 group"
        onclick="openModal('arjuno')"
        >
            <img src="{{ url('storage/images/arjuno.webp') }}" alt="Jeep"
                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
            <div
                class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent p-3 text-white group-hover:from-black/80 group-hover:via-black/50 transition-colors duration-500">
                <p class="text-xs">The Majesty of Arjuno</p>
                <h2 class="font-semibold text-base">Legends Above the Horizon</h2>
            </div>
        </div>
    </div>
</section>

<!-- Modal Template -->
<div id="destinationModal" class="fixed inset-0 bg-black/70 hidden z-50 flex items-center justify-center p-4">
  <div id="modalContent"
    class="bg-white rounded-xl shadow-xl max-w-3xl w-full relative overflow-hidden opacity-0 translate-y-10">
    <!-- Close Button -->
    <button id="closeModal" class="absolute top-3 right-3 text-gray-600 hover:text-red-500">
      ✕
    </button>

    <!-- Modal Content -->
    <div class="grid md:grid-cols-2">
      <!-- Image -->
      <div id="modalImageWrapper" class="h-64 md:h-auto">
        <img id="modalImage" src="" alt="Destination" class="w-full h-full object-cover" />
      </div>
      <!-- Text -->
      <div class="p-6 flex flex-col justify-center">
        <p id="modalSubtitle" class="text-sm text-gray-500"></p>
        <h2 id="modalTitle" class="text-2xl font-bold mb-3"></h2>
        <p id="modalDescription" class="text-gray-600 text-sm leading-relaxed"></p>
      </div>
    </div>
  </div>
</div>

<!-- GSAP CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

<script>
  // Data destinasi
  const destinations = {
    bromo: {
      title: "The Beauty of Bromo",
      subtitle: "Country Above The Clouds",
      image: "{{ url('storage/images/volcano-with-mist-sunset.jpg') }}",
      description: "Gunung Bromo terkenal dengan sunrise epiknya, lautan pasir, dan kawah yang megah. Salah satu destinasi paling ikonik di Jawa Timur."
    },
    lawu: {
      title: "The Challenge of Lawu",
      subtitle: "Mystic Peaks Above the Mist",
      image: "{{ url('storage/images/lawu.webp') }}",
      description: "Gunung Lawu menyimpan aura mistis dengan pemandangan hutan lebat dan jalur pendakian penuh cerita sejarah dan budaya."
    },
    raung: {
      title: "The Wild Spirit of Raung",
      subtitle: "Untamed Adventure",
      image: "{{ url('storage/images/raung.webp') }}",
      description: "Gunung Raung menawarkan petualangan ekstrem dengan jalur kaldera yang panjang dan pemandangan liar nan indah."
    },
    argopuro: {
      title: "The Endless Trail of Argopuro",
      subtitle: "Journey Above the Wild",
      image: "{{ url('storage/images/argopuro.webp') }}",
      description: "Pendakian Argopuro dikenal sebagai jalur terpanjang di Jawa, menyuguhkan padang sabana luas, danau cantik, serta cerita sejarah mistis."
    },
    arjuno: {
      title: "The Majesty of Arjuno",
      subtitle: "Legends Above the Horizon",
      image: "{{ url('storage/images/arjuno.webp') }}",
      description: "Gunung Arjuno menghadirkan panorama pegunungan yang megah, penuh legenda, dan menjadi favorit pendaki di Jawa Timur."
    }
  };

  // Elemen modal
  const modal = document.getElementById("destinationModal");
  const modalContent = document.getElementById("modalContent");
  const modalImage = document.getElementById("modalImage");
  const modalTitle = document.getElementById("modalTitle");
  const modalSubtitle = document.getElementById("modalSubtitle");
  const modalDescription = document.getElementById("modalDescription");
  const closeModal = document.getElementById("closeModal");

  // Open modal function
  function openModal(key) {
    const data = destinations[key];
    modalImage.src = data.image;
    modalTitle.textContent = data.title;
    modalSubtitle.textContent = data.subtitle;
    modalDescription.textContent = data.description;

    modal.classList.remove("hidden");
    gsap.fromTo(
      modalContent,
      { opacity: 0, y: 50 },
      { opacity: 1, y: 0, duration: 0.5, ease: "power3.out" }
    );
  }

  // Close modal function
  function closeModalFn() {
    gsap.to(modalContent, {
      opacity: 0,
      y: 50,
      duration: 0.4,
      ease: "power3.in",
      onComplete: () => {
        modal.classList.add("hidden");
      }
    });
  }

  closeModal.addEventListener("click", closeModalFn);
  modal.addEventListener("click", (e) => {
    if (e.target === modal) closeModalFn();
  });
</script>


