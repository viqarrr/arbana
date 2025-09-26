<!-- Footer -->
<footer class="bg-neutral-900 text-neutral-300">
  <div class="mx-auto max-w-7xl px-6 py-12">
    <!-- Flex Container -->
    <div class="flex flex-col gap-10 md:flex-row md:items-start md:justify-between">
      <!-- Logo & Deskripsi -->
      <div class="footer-logo md:w-1/4">
        <img
          src="{{ url('storage/images/arbana outdoor real.png') }}"
          alt="Company Logo"
          class="mb-4 w-24"
        />
        <p class="text-sm leading-relaxed">
          Jelajahi keindahan gunung Bromo dan sekitarnya bersama kami.
          Petualangan seru, pengalaman tak terlupakan.
        </p>
      </div>

      <!-- Quick Links -->
      <div class="footer-links">
        <h3 class="text-white mb-4 text-lg font-semibold">Quick Links</h3>
        <ul class="space-y-2">
          <li><a
              href="/"
              class="transition hover:text-primary"
            >Home</a></li>
          <li><a
              href="/about"
              class="transition hover:text-primary"
            >About</a></li>
          <li>
            <a
              href="/products"
              class="transition hover:text-primary"
            >Product</a>
          </li>
          <li>
            <a
              href="/services"
              class="transition hover:text-primary"
            >Service</a>
          </li>
        </ul>
      </div>

      <!-- Social Media -->
      <div class="footer-social md:w-1/4">
        <h3 class="text-white mb-4 text-lg font-semibold">Follow Us</h3>
        <div class="social-icons flex space-x-4">
          <a
            class="bg-neutral-800 hover:bg-blue-600 inline-flex h-10 w-10 items-center justify-center rounded-full transition">
            <i class="fab fa-facebook-f text-white"></i>
          </a>
          <a
            href="#"
            class="bg-neutral-800 hover:bg-pink-500 inline-flex h-10 w-10 items-center justify-center rounded-full transition"
          >
            <i class="fab fa-instagram text-white"></i>
          </a>
          <a
            href="#"
            class="bg-neutral-800 hover:bg-sky-500 inline-flex h-10 w-10 items-center justify-center rounded-full transition"
          >
            <i class="fab fa-twitter text-white"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Garis dan Copyright -->
    <div class="border-neutral-700 mt-10 flex flex-col items-center justify-between border-t pt-6 md:flex-row">
      <p class="text-sm">&copy; 2025 Arbana Outdoor. All rights reserved.</p>
    </div>
  </div>
</footer>
