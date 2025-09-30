<!-- Carousel -->
<div class="flex justify-center my-9">
    <div class="relative w-[1100px] h-[500px]">
        <div class="swiper mySwiper w-full h-full rounded-xl shadow-lg">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="{{ url('storage/images/argopuro.webp') }}"
                        alt="Panorama Gunung Argapuro" class="w-full h-full object-cover rounded-xl" /></div>
                <div class="swiper-slide"><img src="{{ url('storage/images/arjuno.webp') }}" alt="Gunung Argapuro"
                        class="w-full h-full object-cover rounded-xl" /></div>
                <div class="swiper-slide"><img src="{{ url('storage/images/kawi.webp') }}" alt="Gunung Semeru"
                        class="w-full h-full object-cover rounded-xl" /></div>
            </div>
            <div class="swiper-pagination text-amber-400"></div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        new Swiper(".mySwiper", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            }
        });
    });
</script>
