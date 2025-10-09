@props(['description' => null, 'featuredservices' => []])

<!-- about -->
<div class="lg:py-32 mx-auto max-w-8xl py-16 px-6 lg:px-24">
    <!-- Grid -->
    <div class="grid gap-12 md:grid-cols-2">
        <div class="lg:w-3/4">
            <h2 class="text-3xl font-bold text-secondary lg:text-4xl">
                {{ $description['heading'] }}
            </h2>
            <p class="text-gray-800 dark:text-neutral-500 mt-3">
                {{ $description['paragraph'] }}
            </p>
        </div>
        <!-- End Col -->

        <div class="space-y-6 lg:space-y-10">
            @foreach ($featuredservices as $service)
                <div class="flex gap-x-5 sm:gap-x-8">
                    <!-- Icon -->
                    <span
                        class="border-gray-200 bg-white text-gray-800 shadow-2xs dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-200 mx-auto inline-flex size-11 shrink-0 items-center justify-center rounded-full border">
                        @if ($loop->index === 0)
                            <!-- Gunung -->
                            <svg class="size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 3h20L12 21 2 3z" />
                            </svg>
                        @elseif ($loop->index === 1)
                            <!-- Kompas -->
                            <svg class="size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m16 8-4 9-4-4 9-4z" />
                            </svg>
                        @elseif ($loop->index === 2)
                            <!-- Tenda -->
                            <svg class="size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 22V10l7-6 7 6v12" />
                            </svg>
                        @endif
                    </span>
                    <div class="grow">
                        <h3 class="text-base font-semibold text-secondary sm:text-lg">
                            {{ $service['heading'] }}
                        </h3>
                        <p class="text-gray-600 dark:text-neutral-500 mt-1">
                            {{ $service['description'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- End Col -->
    </div>
    <!-- End Grid -->
</div>
<!-- End Icon Blocks -->
