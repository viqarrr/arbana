<!-- Footer -->
<footer id="page-footer" class="bg-neutral-900 text-neutral-300">
    <div class="mx-auto max-w-7xl px-6 py-12">
        <!-- Flex Container -->
        <div class="flex flex-col gap-10 md:flex-row md:items-start md:justify-between">
            <!-- Logo & Deskripsi -->
            <div class="footer-logo md:w-1/4">
                <img src="{{ url('storage/images/arbana outdoor real.png') }}" alt="Company Logo" class="mb-4 "
                    style="width: calc(var(--spacing) * 31);" />
                <p class="text-sm leading-relaxed">
                    Explore the beauty of Mount Bromo and its surroundings with us. An exciting adventure, an
                    unforgettable experience.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="footer-links">
                <h3 class="text-white mb-4 text-lg font-semibold">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="/" class="transition hover:text-primary">Home</a></li>
                    <li><a href="/about" class="transition hover:text-primary">About</a></li>
                    <li>
                        <a href="/products" class="transition hover:text-primary">Product</a>
                    </li>
                    <li>
                        <a href="/services" class="transition hover:text-primary">Service</a>
                    </li>
                    <li>
                        <a href="/news" class="transition hover:text-primary">News</a>
                    </li>
                </ul>
            </div>

            <!-- Social Media -->
            <div class="footer-social md:w-1/4">
                <h3 class="text-white mb-4 text-lg font-semibold">Follow Us</h3>
                <div class="social-icons flex space-x-4">
                    <!-- TikTok -->
                    <a href="#"
                        class="bg-neutral-800 inline-flex h-10 w-10 items-center justify-center rounded-full transition"
                        style="transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#000000'"
                        onmouseout="this.style.backgroundColor='#262626'">
                        <i class="fab fa-tiktok text-white"></i>
                    </a>
                    <!-- Instagram -->
                    <a href="#"
                        class="bg-neutral-800 inline-flex h-10 w-10 items-center justify-center rounded-full transition"
                        style="transition: background 0.3s;"
                        onmouseover="this.style.background='linear-gradient(45deg,#feda75,#d62976,#962fbf)'"
                        onmouseout="this.style.background='#262626'">
                        <i class="fab fa-instagram text-white"></i>
                    </a>
                    <!-- YouTube -->
                    <a href="#"
                        class="bg-neutral-800 inline-flex h-10 w-10 items-center justify-center rounded-full transition"
                        style="transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#ff0000'"
                        onmouseout="this.style.backgroundColor='#262626'">
                        <i class="fab fa-youtube text-white"></i>
                    </a>
                    <!-- Twitter (X) -->
                    <a href="#"
                        class="bg-neutral-800 inline-flex h-10 w-10 items-center justify-center rounded-full transition"
                        style="transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#1DA1F2'"
                        onmouseout="this.style.backgroundColor='#262626'">
                        <i class="fab fa-twitter text-white"></i>
                    </a>
                    <!-- Facebook -->
                    <a href="#"
                        class="bg-neutral-800 inline-flex h-10 w-10 items-center justify-center rounded-full transition"
                        style="transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#1877F2'"
                        onmouseout="this.style.backgroundColor='#262626'">
                        <i class="fab fa-facebook text-white"></i>
                    </a>
                </div>
            </div>

        </div>

        <!-- Garis dan Copyright -->
        <div class="border-neutral-700 mt-10 flex flex-col items-center justify-between border-t pt-6 md:flex-row">
            <p class="text-sm">&copy; 2025 Arbana Outdoor. All rights reserved.</p>
            <div class="flex gap-3">
                <button
                    class="feedbackBtn bottom-6 left-6 bg-amber-300 text-neutral-800 shadow-lg 
             hover:bg-amber-400 focus:outline-none rounded-full p-4 z-50 flex items-center justify-center">
                    <i class="fa-solid fa-comment-dots text-xl"></i>
                </button>
                <button
                    class="contact-btn bottom-6 right-6 bg-amber-300 hover:bg-amber-400 text-neutral-800 shadow-lg rounded-full w-14 h-14 flex items-center justify-center z-50">
                    <i class="fas fa-headset text-2xl"></i>
                </button>
            </div>
        </div>
    </div>
    </div>
</footer>

<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

<script>
    const chatBox = document.getElementById("chatbot-box");
    const closeChat = document.getElementById("close-chat");
    const waLink = document.getElementById("wa-link");
    const nameInput = document.getElementById("name-input");
    const phoneInput = document.getElementById("phone-input");

    // semua tombol (floating + footer) pake class
    const contactBtns = document.querySelectorAll(".contact-btn");

    contactBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            chatBox.classList.remove("hidden");
            gsap.fromTo(chatBox, {
                opacity: 0,
                y: 50,
                scale: 0.9
            }, {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.5,
                ease: "back.out(1.7)"
            });
        });
    });

    // tutup chatbot dengan GSAP
    closeChat.addEventListener("click", () => {
        gsap.to(chatBox, {
            opacity: 0,
            y: 50,
            scale: 0.9,
            duration: 0.4,
            ease: "power2.in",
            onComplete: () => chatBox.classList.add("hidden")
        });
    });

    // generate link WA
    function updateWaLink() {
        const name = nameInput.value.trim();
        const phone = phoneInput.value.trim();
        if (name && phone) {
            const message = encodeURIComponent(
                `Halo, saya ${name}. Nomor saya: ${phone}. Saya tertarik ikut mendaki!`
            );
            waLink.href = `https://wa.me/6288994300480?text=${message}`;
            waLink.classList.remove("hidden");
        } else {
            waLink.classList.add("hidden");
        }
    }

    nameInput.addEventListener("input", updateWaLink);
    phoneInput.addEventListener("input", updateWaLink);

    // === Hide floating button pas footer keliatan ===
    const footer = document.getElementById("page-footer");
    if (footer) {
        const floatingBtn = contactBtns[0]; // tombol floating aja
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    // footer muncul -> animasi hide
                    gsap.to(floatingBtn, {
                        opacity: 0,
                        y: 50,
                        duration: 0.4,
                        ease: "power2.in",
                        onComplete: () => floatingBtn.classList.add("hidden")
                    });
                } else {
                    // footer ilang -> unhide dulu lalu animasi show
                    floatingBtn.classList.remove("hidden");
                    gsap.fromTo(floatingBtn, {
                        opacity: 0,
                        y: 50
                    }, {
                        opacity: 1,
                        y: 0,
                        duration: 0.5,
                        ease: "back.out(1.7)"
                    });
                }
            });
        }, {
            threshold: 0.1
        });

        observer.observe(footer);
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const feedbackBtn = document.getElementById("feedbackBtn");
        const feedbackModal = document.getElementById("feedbackModal");
        const feedbackBox = document.getElementById("feedbackBox");
        const closeModal = document.getElementById("closeModal");
        const footer = document.getElementById("page-footer"); // pastikan footer punya id ini

        // buka modal dengan GSAP
        feedbackBtn.addEventListener("click", () => {
            feedbackModal.classList.remove("hidden");

            gsap.fromTo(feedbackModal, {
                opacity: 0
            }, {
                opacity: 1,
                duration: 0.3,
                ease: "power2.out"
            });

            gsap.fromTo(feedbackBox, {
                opacity: 0,
                y: 50,
                scale: 0.9
            }, {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.5,
                ease: "back.out(1.7)"
            });
        });

        // fungsi close modal (GSAP animasi)
        function closeFeedback() {
            gsap.to(feedbackBox, {
                opacity: 0,
                y: 50,
                scale: 0.9,
                duration: 0.4,
                ease: "power2.in"
            });
            gsap.to(feedbackModal, {
                opacity: 0,
                duration: 0.3,
                ease: "power2.in",
                onComplete: () => feedbackModal.classList.add("hidden")
            });
        }

        closeModal.addEventListener("click", closeFeedback);

        // klik luar box → tutup
        feedbackModal.addEventListener("click", (e) => {
            if (e.target === feedbackModal) {
                closeFeedback();
            }
        });

        // --- HIDE FEEDBACK BUTTON & MODAL SAAT FOOTER MUNCUL ---
        if (footer) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        // Footer kelihatan → hide button + modal
                        gsap.to(feedbackBtn, {
                            opacity: 0,
                            y: 50,
                            duration: 0.4,
                            ease: "power2.in",
                            onComplete: () => feedbackBtn.classList.add("hidden")
                        });

                        if (!feedbackModal.classList.contains("hidden")) {
                            closeFeedback(); // kalau modal kebuka → tutup juga
                        }
                    } else {
                        // Footer ilang → show button lagi
                        feedbackBtn.classList.remove("hidden");
                        gsap.fromTo(feedbackBtn, {
                            opacity: 0,
                            y: 50
                        }, {
                            opacity: 1,
                            y: 0,
                            duration: 0.5,
                            ease: "back.out(1.7)"
                        });
                    }
                });
            }, {
                threshold: 0.1
            });

            observer.observe(footer);
        }
    });
</script>
