<header
  class="sticky top-4 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full before:absolute before:inset-0 before:max-w-5xl before:mx-2 lg:before:mx-auto before:rounded-[26px] before:bg-secondary before:backdrop-blur-md  -mt-13"
>
  <nav
    class="relative mx-2 flex w-full max-w-5xl basis-full flex-wrap items-center justify-between py-2 px-5 md:flex-nowrap lg:mx-auto"
  >
    <div class="flex items-center">
      <!-- Logo -->
      <a
        href="/"
        class="text-xl font-semibold text-primary"
      >
        <h1>ARBANA</h1>
      </a>
    </div>

    <div class="flex items-center gap-x-3 md:order-3">
      <a
        href="#"
        class="bg-amber-300 text-neutral-800 focus:outline-hidden group inline-flex items-center gap-x-2 text-nowrap rounded-full px-3 py-2 text-sm font-medium"
      >Book Now</a>

      <!-- Mobile menu button -->
      <button
        id="menu-btn"
        class="text-white md:hidden"
      >
        <svg
          class="hs-collapse-open:hidden size-4 shrink-0"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <line
            x1="3"
            x2="21"
            y1="6"
            y2="6"
          />
          <line
            x1="3"
            x2="21"
            y1="12"
            y2="12"
          />
          <line
            x1="3"
            x2="21"
            y1="18"
            y2="18"
          />
        </svg>
        <svg
          class="hs-collapse-open:block hidden size-4 shrink-0"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path d="M18 6 6 18" />
          <path d="m6 6 12 12" />
        </svg>
      </button>
    </div>
    <!-- End Button Group -->

    <!-- Desktop Menu -->
    <ul
      id="menu"
      class="hidden grow basis-full transition-all duration-300 md:block"
    >
      <div class="flex flex-col gap-6 gap-y-3 py-2 md:flex-row md:items-center md:justify-center md:py-0 md:ps-7">
        <li><a
            href="/"
            class="text-white hover:text-amber-300"
          >Home</a></li>

        <li>
          <a
            href="/about"
            class="text-white hover:text-amber-300"
          >About</a>
        </li>

        <li>
          <a
            href="/products"
            class="text-white hover:text-amber-300"
          >Products</a>
        </li>

        <!-- Dropdown -->
        <li class="group relative">
          <a
            href="/services"
            id="services-btn"
            class="text-white hover:text-amber-300 flex w-full items-center justify-between cursor-pointer"
            onclick="toggleMobileService()"
          >
            Services
            <svg
              id="services-icon"
              class="ml-1 h-4 w-4 transition-transform duration-200 group-hover:rotate-180"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7"
              />
            </svg>
          </a>

          <!-- Dropdown Grid -->
          <div
            id="services"
            class="md:-right-45 md:w-150 z-10 mt-2 hidden w-full rounded-2xl bg-secondary transition-all md:invisible md:absolute md:top-8 md:mt-0 md:block md:p-1 md:opacity-0 md:group-hover:visible md:group-hover:opacity-100"
          >
            <div class="flex flex-col gap-y-1">
              <!-- Grid -->
              <div class="grid grid-cols-1 gap-1 md:grid-cols-2">
                <div
                  class="min-h-50 bg-neutral-900 flex flex-col justify-between rounded-t-xl p-5 md:rounded-tl-xl md:rounded-tr-none"
                >
                  <!-- Heading -->
                  <div class="mb-5">
                    <a
                      class="hover:text-amber-300 focus:text-amber-300 focus:outline-hidden group flex items-center gap-x-2 text-sm font-medium text-primary"
                      href="#"
                    >
                      Trip Plans
                      <span
                        class="bg-amber-300 text-black ms-auto flex size-6 shrink-0 items-center justify-center rounded-sm"
                      >
                        <svg
                          class="size-4 shrink-0 transition group-hover:translate-x-0.5 group-focus:translate-x-0.5"
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                          stroke="currentColor"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        >
                          <path d="M5 12h14"></path>
                          <path d="m12 5 7 7-7 7"></path>
                        </svg>
                      </span>
                    </a>
                  </div>
                  <!-- End Heading -->

                  <!-- List -->
                  <ul class="flex flex-col">
                    <li class="border-neutral-800 border-t py-2 first:border-t-0 first:pt-0 last:pb-0">
                      <a
                        class="hover:text-amber-300 focus:text-amber-300 focus:outline-hidden group flex items-center gap-x-2 text-sm font-medium text-primary"
                        href="#"
                      >
                        <span class="bg-amber-300 size-1 rounded-full"></span>
                        Open Trip
                        <span class="ms-auto flex size-6 shrink-0 items-center justify-center">
                          <svg
                            class="size-4 shrink-0 transition group-hover:translate-x-0.5 group-focus:translate-x-0.5"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          >
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                          </svg>
                        </span>
                      </a>
                    </li>

                    <li class="border-neutral-800 border-t py-2 first:border-t-0 first:pt-0 last:pb-0">
                      <a
                        class="hover:text-amber-300 focus:text-amber-300 focus:outline-hidden group flex items-center gap-x-2 text-sm font-medium text-primary"
                        href="#"
                      >
                        <span class="bg-amber-300 size-1 rounded-full"></span>
                        Private Trip
                        <span class="ms-auto flex size-6 shrink-0 items-center justify-center">
                          <svg
                            class="size-4 shrink-0 transition group-hover:translate-x-0.5 group-focus:translate-x-0.5"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          >
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                          </svg>
                        </span>
                      </a>
                    </li>

                    <li class="border-neutral-800 border-t py-2 first:border-t-0 first:pt-0 last:pb-0">
                      <a
                        class="hover:text-amber-300 focus:text-amber-300 focus:outline-hidden group flex items-center gap-x-2 text-sm font-medium text-primary"
                        href="#"
                      >
                        <span class="bg-amber-300 size-1 rounded-full"></span>
                        Family Gathering
                        <span class="ms-auto flex size-6 shrink-0 items-center justify-center">
                          <svg
                            class="size-4 shrink-0 transition group-hover:translate-x-0.5 group-focus:translate-x-0.5"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          >
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                          </svg>
                        </span>
                      </a>
                    </li>

                    <li class="border-neutral-800 border-t py-2 first:border-t-0 first:pt-0 last:pb-0">
                      <a
                        class="hover:text-amber-300 focus:text-amber-300 focus:outline-hidden group flex items-center gap-x-2 text-sm font-medium text-primary"
                        href="#"
                      >
                        <span class="bg-amber-300 size-1 rounded-full"></span>
                        Camp Ground
                        <span class="ms-auto flex size-6 shrink-0 items-center justify-center">
                          <svg
                            class="size-4 shrink-0 transition group-hover:translate-x-0.5 group-focus:translate-x-0.5"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          >
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                          </svg>
                        </span>
                      </a>
                    </li>

                    <li class="border-neutral-800 border-t py-2 first:border-t-0 first:pt-0 last:pb-0">
                      <a
                        class="hover:text-amber-300 focus:text-amber-300 focus:outline-hidden group flex items-center gap-x-2 text-sm font-medium text-primary"
                        href="#"
                      >
                        <span class="bg-amber-300 size-1 rounded-full"></span>
                        Custom Plan
                        <span class="ms-auto flex size-6 shrink-0 items-center justify-center">
                          <svg
                            class="size-4 shrink-0 transition group-hover:translate-x-0.5 group-focus:translate-x-0.5"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          >
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                          </svg>
                        </span>
                      </a>
                    </li>
                  </ul>
                  <!-- End List -->
                </div>
                <!-- End Col -->

                <div class="min-h-50 bg-neutral-900 flex flex-col justify-between p-5 md:rounded-tr-xl">
                  <!-- Heading -->
                  <div class="mb-5">
                    <a
                      class="hover:text-amber-300 focus:text-amber-300 focus:outline-hidden group flex items-center gap-x-3 text-sm font-medium text-primary"
                      href="#"
                    >
                      Others
                      <span
                        class="bg-amber-300 text-black ms-auto flex size-6 shrink-0 items-center justify-center rounded-sm"
                      >
                        <svg
                          class="size-4 shrink-0 transition group-hover:translate-x-0.5 group-focus:translate-x-0.5"
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                          stroke="currentColor"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        >
                          <path d="M5 12h14"></path>
                          <path d="m12 5 7 7-7 7"></path>
                        </svg>
                      </span>
                    </a>
                  </div>
                  <!-- End Heading -->

                  <!-- List -->
                  <ul class="flex flex-col">
                    <li class="border-neutral-800 border-t py-2 first:border-t-0 first:pt-0 last:pb-0">
                      <a
                        class="hover:text-amber-300 focus:text-amber-300 focus:outline-hidden group flex items-center gap-x-2 text-sm font-medium text-primary"
                        href="#"
                      >
                        <span class="bg-amber-300 size-1 rounded-full"></span>
                        Porter
                        <span class="ms-auto flex size-6 shrink-0 items-center justify-center">
                          <svg
                            class="size-4 shrink-0 transition group-hover:translate-x-0.5 group-focus:translate-x-0.5"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          >
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                          </svg>
                        </span>
                      </a>
                    </li>

                    <li class="border-neutral-800 border-t py-2 first:border-t-0 first:pt-0 last:pb-0">
                      <a
                        class="hover:text-amber-300 focus:text-amber-300 focus:outline-hidden group flex items-center gap-x-2 text-sm font-medium text-primary"
                        href="#"
                      >
                        <span class="bg-amber-300 size-1 rounded-full"></span>
                        Guide
                        <span class="ms-auto flex size-6 shrink-0 items-center justify-center">
                          <svg
                            class="size-4 shrink-0 transition group-hover:translate-x-0.5 group-focus:translate-x-0.5"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          >
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                          </svg>
                        </span>
                      </a>
                    </li>

                    <li class="border-neutral-800 border-t py-2 first:border-t-0 first:pt-0 last:pb-0">
                      <a
                        class="hover:text-amber-300 focus:text-amber-300 focus:outline-hidden group flex items-center gap-x-2 text-sm font-medium text-primary"
                        href="#"
                      >
                        <span class="bg-amber-300 size-1 rounded-full"></span>
                        Documentation
                        <span class="ms-auto flex size-6 shrink-0 items-center justify-center">
                          <svg
                            class="size-4 shrink-0 transition group-hover:translate-x-0.5 group-focus:translate-x-0.5"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          >
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                          </svg>
                        </span>
                      </a>
                    </li>
                  </ul>
                  <!-- End List -->
                </div>
                <!-- End Col -->
              </div>
              <!-- End Grid -->

            </div>
          </div>
        </li>

        <li>
          <a
            href="/gallery"
            class="text-white hover:text-amber-300"
          >Gallery</a>
        </li>
      </div>
    </ul>
  </nav>

  <script>
    const menuBtn = document.getElementById("menu-btn");
    const menu = document.getElementById("menu");

    menuBtn.addEventListener("click", () => {
      menu.classList.toggle("hidden");
    });

    function toggleMobileService() {
      const services = document.getElementById("services");
      const icon = document.getElementById("services-icon");
      services.classList.toggle("hidden");
      icon.classList.toggle("rotate-180");
    }
  </script>
</header>
