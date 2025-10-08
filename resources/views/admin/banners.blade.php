<x-app-layout>
  <x-slot name="header">{{ __('Banner') }}</x-slot>
  <div class="flex flex-1 flex-col overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-0">
    <div class="flex flex-1 flex-col lg:flex-row">
      <div class="border-gray-200 flex min-w-0 flex-1 flex-col border-e">
        <!-- Negative Value Chart in Card -->
        <div class="bg-white border-gray-200 flex flex-col p-4">

          <!-- Featured News Blog -->
          <div class="bg-white flex flex-col p-4">
            <!-- Header -->
            <div class="border-gray-200 flex flex-wrap items-center justify-between gap-2 border-b border-dashed pb-2">
              <div class="sm:col-span-1">
                <label
                  for="hs-as-table-product-review-search"
                  class="sr-only"
                >Search</label>
                <div class="relative">
                  <input
                    type="text"
                    id="hs-as-table-product-review-search"
                    name="hs-as-table-product-review-search"
                    class="border-gray-200 focus:border-blue-500 focus:ring-blue-500 block w-full rounded-lg px-3 py-2 ps-11 text-sm disabled:pointer-events-none disabled:opacity-50"
                    placeholder="Search"
                  >
                  <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-4">
                    <svg
                      class="text-gray-400 size-4 shrink-0"
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
                      <circle
                        cx="11"
                        cy="11"
                        r="8"
                      />
                      <path d="m21 21-4.3-4.3" />
                    </svg>
                  </div>
                </div>
              </div>

              <button
                @click="$dispatch('open-modal', 'create-banner')"
                type="button"
                class="bg-blue-600 text-white hover:bg-blue-700 rounded-lg px-4 py-2 text-sm font-medium transition"
              >
                <i class="fas fa-plus mr-2"></i>
                Tambah Banner
              </button>
            </div>
            <!-- End Header -->

            <!-- Banners List -->
            <div class="bg-white flex flex-col last:border-b-0 last:pb-0">
              @foreach ($banners as $banner)
                <div class="border-gray-200 flex flex-col gap-5 border-b pb-4 pt-4 md:flex-row">
                  <div class="aspect-4/2 md:aspect-4/3 bg-gray-100 relative w-full rounded-lg md:max-w-80">
                    <img
                      class="absolute inset-0 size-full rounded-lg object-cover object-center"
                      src="{{ asset('storage/' . $banner->image) }}"
                      alt="Post Image"
                    >
                  </div>

                  <div class="grow">
                    <div class="flex h-full flex-col">
                      <div>
                        <p class="text-gray-500 text-sm">
                          Headline:
                        </p>
                        <h3 class="text-gray-800 font-medium">
                          {{ $banner->heading }}
                        </h3>
                      </div>
                      <div class="mt-4">
                        <p class="text-gray-500 text-sm">
                          Description:
                        </p>
                        <h3 class="text-gray-800 font-medium">
                          {{ $banner->paragraph }}
                        </h3>
                      </div>

                      <!-- Footer -->
                      <div class="border-gray-200 mt-4 border-t pt-4 xl:mt-auto">
                        <div class="flex flex-wrap items-center justify-end gap-2">
                          <button
                            @click="$dispatch('open-modal', 'edit-banner-{{ $banner->id }}')"
                            class="text-blue-700 bg-blue-50 border-blue-200 hover:bg-blue-100 inline-flex flex-1 items-center justify-center rounded-lg border px-3 py-2 text-sm font-medium"
                          >
                            <i class="fa-solid fa-pen-to-square mr-1.5"></i>
                            Edit
                          </button>
                          <form
                            action="{{ route('admin.banners.destroy', $banner) }}"
                            method="POST"
                            class="inline-block"
                          >
                            @csrf
                            @method('DELETE')
                            <button
                              type="submit"
                              onclick="return confirm('Are you sure?')"
                              class="text-red-600 hover:bg-red-50 border-gray-300 inline-flex items-center justify-center rounded-lg border p-2"
                            >
                              <i class="fa-solid fa-trash-can text-lg"></i>
                            </button>
                          </form>
                        </div>
                        <!-- End Footer -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Edit Modal -->
                <x-app.modal
                  name="edit-banner-{{ $banner->id }}"
                  title="Ubah Banner"
                  max-width="4xl"
                >
                  <form
                    action="{{ route('admin.banners.update', $banner) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    x-data="{
                        image: null,
                        file: null,
                        handleFile(event) {
                            const selected = event.target.files[0];
                            if (!selected) return;
                            this.file = selected;
                            this.image = {
                                url: URL.createObjectURL(selected),
                                name: selected.name
                            };
                        },
                        removeImage() {
                            this.file = null;
                            this.image = null;
                            $refs.fileInput.value = null;
                        }
                    }"
                    @reset-image.window="image = null; file = null"
                  >
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                      <!-- Heading -->
                      <div>
                        <label class="text-gray-700 mb-2 block text-sm font-medium">Heading *</label>
                        <input
                          type="text"
                          name="heading"
                          value="{{ $banner->heading }}"
                          class="border-gray-300 focus:border-blue-500 focus:ring-blue-200 w-full rounded-lg border px-4 py-2.5 text-sm transition focus:ring"
                          required
                        >
                        <x-input-error
                          for="heading"
                          class="mt-2"
                        ></x-input-error>
                      </div>

                      <!-- Paragraph -->
                      <div>
                        <label class="text-gray-700 mb-2 block text-sm font-medium">Paragraf *</label>
                        <input
                          type="text"
                          name="paragraph"
                          value="{{ $banner->paragraph }}"
                          class="border-gray-300 focus:border-blue-500 focus:ring-blue-200 w-full rounded-lg border px-4 py-2.5 text-sm transition focus:ring"
                          required
                        >
                        <x-input-error
                          for="paragraph"
                          class="mt-2"
                        ></x-input-error>
                      </div>

                      <!-- Gambar -->
                      <div>
                        <label class="text-gray-700 mb-2 block text-sm font-medium">Gambar Banner</label>
                        <input
                          type="file"
                          name="image"
                          accept="image/*"
                          x-ref="fileInput"
                          @change="handleFile($event)"
                          class="border-gray-200 file:bg-blue-600 file:text-white hover:file:bg-blue-700 focus:border-blue-500 focus:ring-blue-200 w-full cursor-pointer rounded-lg border px-4 py-0.5 text-sm transition file:mr-4 file:rounded-md file:border-0 file:px-4 file:py-2 file:text-sm file:font-medium focus:ring"
                        >
                        <p class="text-gray-500 mt-1 text-xs">Kosongkan jika tidak ingin mengganti gambar.</p>
                        <x-input-error
                          for="image"
                          class="mt-2"
                        ></x-input-error>

                        <!-- Preview Gambar Baru -->
                        <div
                          class="mt-4"
                          x-show="image"
                        >
                          <div class="group relative w-40">
                            <img
                              :src="image.url"
                              class="border-gray-100 h-28 w-full rounded-lg border object-cover shadow-sm"
                            >
                            <button
                              type="button"
                              @click="removeImage()"
                              class="bg-white border-gray-300 text-gray-700 hover:bg-red-500 hover:text-white absolute -right-2 -top-2 rounded-full border p-1 text-xs transition"
                            >
                              <i class="fas fa-close"></i>
                            </button>
                          </div>
                        </div>

                        <!-- Gambar Lama -->
                        @if ($banner->image)
                          <div
                            class="mt-4"
                            x-show="!image"
                          >
                            <label class="text-gray-700 mb-2 block text-sm font-medium">Gambar Saat Ini</label>
                            <div class="relative w-40">
                              <img
                                src="{{ asset('storage/' . $banner->image) }}"
                                class="border-gray-200 h-28 w-full rounded-lg border object-cover shadow-sm"
                              >
                            </div>
                          </div>
                        @endif
                      </div>
                    </div>

                    <!-- Footer Buttons -->
                    <div class="mt-6 flex justify-end space-x-3">
                      <button
                        type="button"
                        @click="$dispatch('close-modal', 'edit-banner-{{ $banner->id }}'); $dispatch('reset-image')"
                        class="border-gray-300 bg-white text-gray-700 hover:bg-gray-50 rounded-lg border px-4 py-2 text-sm font-medium transition"
                      >
                        Batal
                      </button>
                      <button
                        type="submit"
                        class="bg-blue-600 text-white hover:bg-blue-700 rounded-lg px-4 py-2 text-sm font-medium transition"
                      >
                        <i class="fas fa-check mr-2"></i> Simpan Perubahan
                      </button>
                    </div>
                  </form>
                </x-app.modal>
              @endforeach
            </div>
            <!-- End Banners List -->

            <!-- Create Modal -->
            <x-app.modal
              name="create-banner"
              title="Tambah Banner Baru"
              max-width="4xl"
            >
              <form
                action="{{ route('admin.banners.store') }}"
                method="POST"
                enctype="multipart/form-data"
                x-data="{
                    image: null,
                    file: null,
                    handleFile(event) {
                        const selected = event.target.files[0];
                        if (!selected) return;
                        this.file = selected;
                        this.image = {
                            url: URL.createObjectURL(selected),
                            name: selected.name
                        };
                    },
                    removeImage() {
                        this.file = null;
                        this.image = null;
                        $refs.fileInput.value = null;
                    }
                }"
                @reset-image.window="image = null; file = null"
              >
                @csrf

                <div class="space-y-6">
                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Heading *</label>
                    <input
                      type="text"
                      name="heading"
                      value="{{ old('heading') }}"
                      class="border-gray-300 focus:border-blue-500 focus:ring-blue-200 w-full rounded-lg border px-4 py-2.5 text-sm transition focus:ring"
                      placeholder="Masukkan heading"
                      required
                    >
                    <x-input-error
                      for="heading"
                      class="mt-2"
                    ></x-input-error>
                  </div>

                  <div>
                    <div>
                      <label class="text-gray-700 mb-2 block text-sm font-medium">Paragraf *</label>
                      <input
                        type="text"
                        name="paragraph"
                        value="{{ old('paragraph') }}"
                        class="border-gray-300 focus:border-blue-500 focus:ring-blue-200 w-full rounded-lg border px-4 py-2.5 text-sm transition focus:ring"
                        placeholder="Masukkan paragraf"
                        required
                      >
                      <x-input-error
                        for="paragraph"
                        class="mt-2"
                      ></x-input-error>
                    </div>

                    <div>
                      <label class="text-gray-700 mb-2 block text-sm font-medium">Gambar Banner *</label>
                      <input
                        type="file"
                        name="image"
                        accept="image/*"
                        x-ref="fileInput"
                        @change="handleFile($event)"
                        class="border-gray-200 file:bg-blue-600 file:text-white hover:file:bg-blue-700 focus:border-blue-500 focus:ring-blue-200 w-full cursor-pointer rounded-lg border px-4 py-0.5 text-sm transition file:mr-4 file:rounded-md file:border-0 file:px-4 file:py-2 file:text-sm file:font-medium focus:ring"
                        required
                      >
                      <p class="text-gray-500 mt-1 text-xs">Masukkan gambar untuk banner.
                      </p>
                      <x-input-error
                        for="image"
                        class="mt-2"
                      ></x-input-error>

                      <!-- Preview -->
                      <div
                        class="mt-4"
                        x-show="image"
                      >
                        <div class="group relative w-40">
                          <img
                            :src="image.url"
                            class="border-gray-100 h-28 w-full rounded-lg border object-cover shadow-sm"
                          >
                          <button
                            type="button"
                            @click="removeImage()"
                            class="bg-white border-gray-300 text-gray-700 hover:bg-red-500 hover:text-white absolute -right-2 -top-2 rounded-full border p-1 text-xs transition"
                          >
                            <i class="fas fa-close"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Footer Buttons -->
                  <div class="mt-6 flex justify-end space-x-3">
                    <button
                      type="button"
                      @click="$dispatch('close-modal', 'create-banner'); $dispatch('reset-image')"
                      class="border-gray-300 bg-white text-gray-700 hover:bg-gray-50 rounded-lg border px-4 py-2 text-sm font-medium transition"
                    >
                      Batal
                    </button>
                    <button
                      type="submit"
                      class="bg-blue-600 text-white hover:bg-blue-700 rounded-lg px-4 py-2 text-sm font-medium transition"
                    >
                      <i class="fas fa-check mr-2"></i>
                      Tambah Banner
                    </button>
                  </div>
              </form>
            </x-app.modal>


            <div class="mt-6">
              {{ $banners->links() }}
            </div>
          </div>
          <!-- End Col -->
        </div>
      </div>
      <!-- End Body -->
</x-app-layout>
