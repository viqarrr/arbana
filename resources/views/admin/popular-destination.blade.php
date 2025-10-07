<x-app-layout>
  <x-slot name="header">{{ __('Destinasi Populer') }}</x-slot>

  <div
    class="[&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 flex flex-1 flex-col overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2"
  >
    <div class="flex flex-1 flex-col lg:flex-row">
      <div class="border-gray-200 flex min-w-0 flex-1 flex-col border-e">
        <div class="bg-white border-gray-200 flex flex-col p-4">

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
              @click="$dispatch('open-modal', 'create-popular-destination')"
              type="button"
              class="bg-blue-600 text-white hover:bg-blue-700 rounded-lg px-4 py-2 text-sm font-medium transition"
            >
              <i class="fas fa-plus mr-2"></i>
              Tambah Destinasi Populer
            </button>
          </div>
          <!-- End Header -->

          <!-- Data Loop -->
          @foreach ($popularDestinations as $destination)
            <div class="bg-white border-gray-200 flex flex-col border-b pb-4 last:border-b-0 last:pb-0">
              <div class="flex flex-col gap-5 pt-4 md:flex-row">
                <div class="aspect-4/2 md:aspect-4/3 bg-gray-100 relative w-full rounded-lg md:max-w-80">
                  <img
                    class="absolute inset-0 size-full rounded-lg object-cover object-center"
                    src="{{ asset('storage/' . $destination->image) }}"
                    alt="Image of {{ $destination->city }}"
                  >
                </div>

                <div class="grow">
                  <div class="flex h-full flex-col">
                    <div class="mt-4 grid grid-cols-2 gap-x-2 gap-y-4 xl:grid-cols-3">
                      <div class="flex flex-col gap-y-1">
                        <span class="text-gray-500 text-[13px]">Kota/Kabupaten:</span>
                        <span class="text-gray-800 text-sm font-medium">{{ $destination->city }}</span>
                      </div>

                      <div class="flex flex-col gap-y-1">
                        <span class="text-gray-500 text-[13px]">Provinsi:</span>
                        <span class="text-gray-800 text-sm font-medium">{{ $destination->region }}</span>
                      </div>

                      <div class="flex flex-col gap-y-1">
                        <span class="text-gray-500 text-[13px]">Status:</span>
                        <span class="{{ $destination->show ? 'text-green-800' : 'text-red-600' }} text-sm font-medium">
                          {{ $destination->show ? 'Ditampilkan' : 'Disembunyikan' }}
                        </span>
                      </div>
                    </div>

                    <div class="mt-4">
                      <p class="text-gray-500 text-sm">Deskripsi:</p>
                      <div class="text-gray-800 prose prose-sm max-w-none font-medium">
                        {!! $destination->description !!}
                      </div>
                    </div>

                    <div class="border-gray-200 mt-4 border-t pt-4 xl:mt-auto">
                      <div class="flex flex-wrap items-center justify-end gap-2">
                        <form
                          action="{{ route('admin.popular-destinations.toggle-show', $destination->id) }}"
                          method="POST"
                          class="inline"
                        >
                          @csrf
                          @method('PATCH')
                          <button
                            type="submit"
                            class="text-yellow-700 bg-yellow-50 border-yellow-200 hover:bg-yellow-100 inline-flex flex-1 items-center justify-center rounded-lg border px-3 py-2 text-sm font-medium"
                          >
                            <i class="fa-solid {{ $destination->show ? 'fa-eye-slash' : 'fa-eye' }} mr-1.5"></i>
                            {{ $destination->show ? 'Sembunyikan' : 'Tampilkan' }}
                          </button>
                        </form>


                        <button
                          type="button"
                          @click="$dispatch('open-modal', 'edit-popular-destination-{{ $destination->id }}')"
                          class="text-blue-700 bg-blue-50 border-blue-200 hover:bg-blue-100 inline-flex items-center justify-center rounded-lg border px-3 py-2 text-sm font-medium"
                        >
                          <i class="fa-solid fa-pen-to-square mr-1.5"></i>
                          Edit
                        </button>

                        <form
                          action="{{ route('admin.popular-destinations.destroy', $destination->id) }}"
                          method="POST"
                          onsubmit="return confirm('Apakah anda yakin?')"
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <x-app.modal
              name="edit-popular-destination-{{ $destination->id }}"
              title="Ubah Destinasi Populer"
              max-width="4xl"
            >
              <form
                action="{{ route('admin.popular-destinations.update', $destination) }}"
                method="POST"
                enctype="multipart/form-data"
                x-data="{
                    image: null,
                    file: null,
                    show: {{ $destination->show ? 'true' : 'false' }},
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
                  <div class="grid grid-cols-2 gap-6">
                    <div>
                      <label class="text-gray-700 mb-2 block text-sm font-medium">Provinsi *</label>
                      <input
                        type="text"
                        name="region"
                        value="{{ $destination->region }}"
                        class="border-gray-300 focus:border-blue-500 focus:ring-blue-200 w-full rounded-lg border px-4 py-2.5 text-sm transition focus:ring"
                        required
                      >
                      <x-input-error
                        for="region"
                        class="mt-2"
                      />
                    </div>

                    <div>
                      <label class="text-gray-700 mb-2 block text-sm font-medium">Kota/Kabupaten *</label>
                      <input
                        type="text"
                        name="city"
                        value="{{ $destination->city }}"
                        class="border-gray-300 focus:border-blue-500 focus:ring-blue-200 w-full rounded-lg border px-4 py-2.5 text-sm transition focus:ring"
                        required
                      >
                      <x-input-error
                        for="city"
                        class="mt-2"
                      />
                    </div>
                  </div>

                  <!-- Switch Tampilkan -->
                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Status Tampil</label>
                    <div class="flex items-center space-x-3">
                      <button
                        type="button"
                        @click="show = !show"
                        :class="show ? 'bg-blue-600' : 'bg-gray-300'"
                        class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none"
                      >
                        <span
                          :class="show ? 'translate-x-6' : 'translate-x-1'"
                          class="bg-white inline-block h-4 w-4 transform rounded-full transition-transform"
                        ></span>
                      </button>
                      <input
                        type="hidden"
                        name="show"
                        :value="show ? 1 : 0"
                      >
                      <span
                        class="text-sm"
                        x-text="show ? 'Ditampilkan' : 'Disembunyikan'"
                      ></span>
                    </div>
                  </div>

                  <!-- Deskripsi -->
                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Deskripsi *</label>
                    <div
                      class="border-gray-200 focus-within:ring-blue-200 overflow-hidden rounded-lg border focus-within:ring"
                      x-data
                      x-init="const quill = new Quill($refs.quillEditor, { theme: 'snow' });
                      quill.on('text-change', function() {
                          $refs.hiddenDescription.value = quill.root.innerHTML;
                      });"
                    >
                      <div x-ref="quillEditor" class="min-h-40">{!! $destination->description !!}</div>
                      <input
                        type="hidden"
                        name="description"
                        value="{{ $destination->description }}"
                        x-ref="hiddenDescription"
                      >
                      <x-input-error
                        for="description"
                        class="mt-2"
                      ></x-input-error>
                    </div>
                  </div>

                  <!-- Gambar -->
                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Gambar Destinasi Populer</label>
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
                    />

                    <div
                      class="mt-4"
                      x-show="image"
                    >
                      <div class="group relative w-40">
                        <img
                          :src="image ? image.url : ''"
                          alt=""
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
                    @if ($destination->image)
                      <div
                        class="mt-4"
                        x-show="!image"
                      >
                        <label class="text-gray-700 mb-2 block text-sm font-medium">Gambar Saat Ini</label>
                        <div class="relative w-40">
                          <img
                            src="{{ asset('storage/' . $destination->image) }}"
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
                    @click="$dispatch('close-modal', 'edit-popular-destination-{{ $destination->id }}'); $dispatch('reset-image')"
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

          <x-app.modal
            name="create-popular-destination"
            title="Tambah Destinasi Populer"
            max-width="4xl"
            @show.window="init()"
          >
            <form
              action="{{ route('admin.popular-destinations.store') }}"
              method="POST"
              enctype="multipart/form-data"
              x-data="{
                  image: null,
                  file: null,
                  show: true,
                  editorInstance: null,
                  handleFile(event) {
                      const selected = event.target.files[0];
                      if (!selected) return;
                      this.file = selected;
                      this.image = { url: URL.createObjectURL(selected), name: selected.name };
                  },
                  removeImage() {
                      this.file = null;
                      this.image = null;
                      if ($refs.fileInput) $refs.fileInput.value = null;
                  },
              }"
              @reset-image.window="image = null; file = null"
            >
              @csrf

              <div class="space-y-6">
                <div class="grid grid-cols-2 gap-6">
                  <div> <label class="text-gray-700 mb-2 block text-sm font-medium">Provinsi *</label> <input
                      type="text"
                      name="region"
                      value="{{ old('region') }}"
                      class="border-gray-300 focus:border-blue-500 focus:ring-blue-200 w-full rounded-lg border px-4 py-2.5 text-sm transition focus:ring"
                      required
                    > <x-input-error
                      for="region"
                      class="mt-2"
                    /> </div>
                  <div> <label class="text-gray-700 mb-2 block text-sm font-medium">Kota/Kabupaten *</label> <input
                      type="text"
                      name="city"
                      value="{{ old('city') }}"
                      class="border-gray-300 focus:border-blue-500 focus:ring-blue-200 w-full rounded-lg border px-4 py-2.5 text-sm transition focus:ring"
                      required
                    > <x-input-error
                      for="city"
                      class="mt-2"
                    /> </div>
                </div>
                <!-- Switch Tampilkan -->
                <div>
                  <label class="text-gray-700 mb-2 block text-sm font-medium">Status Tampil</label>
                  <div class="flex items-center space-x-3">
                    <button
                      type="button"
                      @click="show = !show"
                      :class="show ? 'bg-blue-600' : 'bg-gray-300'"
                      class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none"
                    >
                      <span
                        :class="show ? 'translate-x-6' : 'translate-x-1'"
                        class="bg-white inline-block h-4 w-4 transform rounded-full transition-transform"
                      ></span>
                    </button>
                    <input
                      type="hidden"
                      name="show"
                      :value="show ? 1 : 0"
                    > <span
                      class="text-sm"
                      x-text="show ? 'Ditampilkan' : 'Disembunyikan'"
                    >
                    </span>
                  </div>
                </div>

                <!-- Deskripsi -->
                <div>
                  <label class="text-gray-700 mb-2 block text-sm font-medium">Deskripsi *</label>
                  <div
                    class="border-gray-200 focus-within:ring-blue-200 overflow-hidden rounded-lg border focus-within:ring"
                    x-data
                    x-init="const quill = new Quill($refs.quillEditor, { theme: 'snow' });
                    quill.on('text-change', function() {
                        $refs.hiddenDescription.value = quill.root.innerHTML;
                    });"
                  >
                    <div x-ref="quillEditor" class="min-h-40">{!! old('description') !!}</div>
                    <input
                      type="hidden"
                      name="description"
                      value="{{ old('description') }}"
                      x-ref="hiddenDescription"
                    >
                  </div>
                </div>

                <!-- Gambar -->
                <div> <label class="text-gray-700 mb-2 block text-sm font-medium">Gambar Destinasi Populer *</label>
                  <input
                    type="file"
                    name="image"
                    accept="image/*"
                    x-ref="fileInput"
                    @change="handleFile($event)"
                    class="border-gray-200 file:bg-blue-600 file:text-white hover:file:bg-blue-700 focus:border-blue-500 focus:ring-blue-200 w-full cursor-pointer rounded-lg border px-4 py-0.5 text-sm transition file:mr-4 file:rounded-md file:border-0 file:px-4 file:py-2 file:text-sm file:font-medium focus:ring"
                    required
                  > <x-input-error
                    for="image"
                    class="mt-2"
                  /> <!-- Preview Gambar -->
                  <div
                    class="mt-4"
                    x-show="image"
                  >
                    <div class="group relative w-40"> <img
                        :src="image.url"
                        class="border-gray-100 h-28 w-full rounded-lg border object-cover shadow-sm"
                      > <button
                        type="button"
                        @click="removeImage()"
                        class="bg-white border-gray-300 text-gray-700 hover:bg-red-500 hover:text-white absolute -right-2 -top-2 rounded-full border p-1 text-xs transition"
                      > <i class="fas fa-close"></i> </button> </div>
                  </div>
                </div>
              </div>

              <!-- Footer -->
              <!-- Footer Buttons -->
              <div class="mt-6 flex justify-end space-x-3"> <button
                  type="button"
                  @click="$dispatch('close-modal', 'create-popular-destination'); $dispatch('reset-image')"
                  class="border-gray-300 bg-white text-gray-700 hover:bg-gray-50 rounded-lg border px-4 py-2 text-sm font-medium transition"
                > Batal </button> <button
                  type="submit"
                  class="bg-blue-600 text-white hover:bg-blue-700 rounded-lg px-4 py-2 text-sm font-medium transition"
                > <i class="fas fa-plus mr-2"></i> Tambah Destinasi Populer </button> </div>
            </form>
          </x-app.modal>


          <div class="mt-6">{{ $popularDestinations->links() }}</div>
        </div>
      </div>
    </div>
  </div>

  @push('styles')
    <link
      href="https://cdn.quilljs.com/1.3.6/quill.snow.css"
      rel="stylesheet"
    >
  @endpush

  @push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  @endpush

</x-app-layout>
