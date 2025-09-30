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
    <!-- BIG CARD (Bromo) -->
    <div onclick="openModal('bromo')"
        class="relative rounded-xl overflow-hidden sm:col-span-2 lg:col-span-2 lg:row-span-2 shadow-xl hover:shadow-2xl transition-all duration-500 group">
        <img src="{{ url('storage/images/volcano-with-mist-sunset.jpg') }}" alt="Bromo"
            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" />
        <div
            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-4 text-white group-hover:from-black/90 group-hover:via-black/60 transition-colors duration-500">
            <p class="text-sm">Mount Bromo</p>
            <h2 class="font-bold text-xl sm:text-2xl">
                Famous for Its Sunrise
            </h2>
        </div>
    </div>

    <!-- Small Card (Lawu) -->
    <div class="relative rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 group"
        onclick="openModal('lawu')">
        <img src="{{ url('storage/images/lawu.webp') }}" alt="Mount Lawu"
            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
        <div
            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent p-3 text-white group-hover:from-black/80 group-hover:via-black/50 transition-colors duration-500">
            <p class="text-xs">Mount Lawu</p>
            <h2 class="font-semibold text-base">Mystical Hiking Trails</h2>
        </div>
    </div>

    <!-- Small Card (Raung) -->
    <div class="relative rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 group"
        onclick="openModal('raung')">
        <img src="{{ url('storage/images/raung.webp') }}" alt="Mount Raung"
            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
        <div
            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent p-3 text-white group-hover:from-black/80 group-hover:via-black/50 transition-colors duration-500">
            <p class="text-xs">Mount Raung</p>
            <h2 class="font-semibold text-base">Extreme Caldera Trek</h2>
        </div>
    </div>

    <!-- Small Card (Argopuro) -->
    <div class="relative rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 group"
        onclick="openModal('argopuro')">
        <img src="{{ url('storage/images/argopuro.webp') }}" alt="Mount Argopuro"
            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
        <div
            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent p-3 text-white group-hover:from-black/80 group-hover:via-black/50 transition-colors duration-500">
            <p class="text-xs">Mount Argopuro</p>
            <h2 class="font-semibold text-base">Java’s Longest Hiking Route</h2>
        </div>
    </div>

    <!-- Small Card (Arjuno) -->
    <div class="relative rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 group"
        onclick="openModal('arjuno')">
        <img src="{{ url('storage/images/arjuno.webp') }}" alt="Mount Arjuno"
            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
        <div
            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent p-3 text-white group-hover:from-black/80 group-hover:via-black/50 transition-colors duration-500">
            <p class="text-xs">Mount Arjuno</p>
            <h2 class="font-semibold text-base">Legendary Mountain Peaks</h2>
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
        title: "Mount Bromo",
        subtitle: "East Java",
        image: "{{ url('storage/images/volcano-with-mist-sunset.jpg') }}",
        description: "Mount Bromo is famous for its epic sunrise, sea of sand, and majestic crater. It is one of the most iconic destinations in East Java."
      },
      lawu: {
        title: "Mount Lawu",
        subtitle: "Central Java & East Java Border",
        image: "{{ url('storage/images/lawu.webp') }}",
        description: "Mount Lawu holds a mystical aura with dense forests and hiking trails rich with history and cultural stories."
      },
      raung: {
        title: "Mount Raung",
        subtitle: "East Java",
        image: "{{ url('storage/images/raung.webp') }}",
        description: "Mount Raung offers extreme adventure with its long caldera trek and wild, stunning landscapes."
      },
      argopuro: {
        title: "Mount Argopuro",
        subtitle: "East Java",
        image: "{{ url('storage/images/argopuro.webp') }}",
        description: "Mount Argopuro is known as the longest trekking route in Java, featuring wide savannas, beautiful lakes, and mystical historical legends."
      },
      arjuno: {
        title: "Mount Arjuno",
        subtitle: "East Java",
        image: "{{ url('storage/images/arjuno.webp') }}",
        description: "Mount Arjuno offers breathtaking mountain panoramas, filled with legends, and is a favorite among hikers in East Java."
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


