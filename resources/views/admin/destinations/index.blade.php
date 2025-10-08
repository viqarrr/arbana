<x-app-layout>
  <x-slot name="header">{{ __('Destinasi') }}</x-slot>

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
                for="search-destination"
                class="sr-only"
              >Search</label>
              <div class="relative">
                <input
                  type="text"
                  id="search-destination"
                  class="border-gray-200 focus:border-blue-500 focus:ring-blue-500 block w-full rounded-lg px-3 py-2 ps-11 text-sm"
                  placeholder="Cari destinasi..."
                >
                <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-4">
                  <i class="fas fa-search text-gray-400 text-sm"></i>
                </div>
              </div>
            </div>

            <div class="flex gap-2">
              <button
                @click="$dispatch('open-modal', 'create-destination')"
                type="button"
                class="bg-blue-600 text-white hover:bg-blue-700 rounded-lg px-4 py-2 text-sm font-medium"
              >
                <i class="fas fa-plus mr-2"></i> Tambah Destinasi
              </button>
              <button
                @click="$dispatch('open-modal', 'create-destination-category')"
                type="button"
                class="bg-blue-600 text-white hover:bg-blue-700 rounded-lg px-4 py-2 text-sm font-medium"
              >
                <i class="fas fa-plus mr-2"></i> Tambah Kategori Destinasi
              </button>
            </div>
          </div>

          <!-- Data Loop -->
          @foreach ($destinations as $destination)
            <div class="bg-white border-gray-200 flex flex-col border-b pb-4 pt-4 last:border-b-0 last:pb-0">
              <div class="flex flex-col gap-5 md:flex-row">
                <div class="bg-gray-100 relative h-48 w-full rounded-lg md:max-w-80">
                  @if ($destination->destinationImages->first())
                    <img
                      class="absolute inset-0 size-full rounded-lg object-cover"
                      src="{{ asset('storage/' . $destination->destinationImages->first()->image_path) }}"
                      alt="{{ $destination->name }}"
                    >
                    <div class="bg-white/90 absolute right-3 top-3 rounded-full px-2.5 py-1 text-xs backdrop-blur-sm">
                      <i class="fas fa-image mr-1"></i> {{ $destination->destinationImages->count() }}
                    </div>
                  @else
                    <div class="absolute inset-0 flex items-center justify-center">
                      <i class="fas fa-mountain text-gray-300 text-5xl"></i>
                    </div>
                  @endif
                </div>

                <div class="grow">
                  <div class="flex h-full flex-col">
                    <div class="mb-3">
                      <h3 class="text-gray-900 text-lg font-semibold">{{ $destination->name }}</h3>
                      <span
                        class="bg-blue-100 text-blue-800 mt-1 inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium"
                      >
                        {{-- {{ $destination->destinationCategory->name }} --}}
                      </span>
                    </div>

                    <div class="mb-4 grid grid-cols-2 gap-x-2 gap-y-3 xl:grid-cols-4">
                      <div class="flex flex-col gap-y-1">
                        <span class="text-gray-500 text-[13px]">Provinsi:</span>
                        <span class="text-gray-800 text-sm font-medium">{{ $destination->region }}</span>
                      </div>

                      @if ($destination->mdpl)
                        <div class="flex flex-col gap-y-1">
                          <span class="text-gray-500 text-[13px]">Ketinggian:</span>
                          <span class="text-gray-800 text-sm font-medium">{{ number_format($destination->mdpl) }}
                            MDPL</span>
                        </div>
                      @endif

                      <div class="flex flex-col gap-y-1">
                        <span class="text-gray-500 text-[13px]">Meeting Point:</span>
                        <span
                          class="text-gray-800 text-sm font-medium">{{ Str::limit($destination->meeting_point, 30) }}</span>
                      </div>

                      <div class="flex flex-col gap-y-1">
                        <span class="text-gray-500 text-[13px]">Total Trip:</span>
                        <span class="text-gray-800 text-sm font-medium">{{ $destination->trips->count() }} trip</span>
                      </div>
                    </div>

                    <div class="text-gray-700 prose prose-sm mb-4 line-clamp-2 max-w-none">
                      {!! $destination->description !!}
                    </div>

                    <div class="border-gray-200 border-t pt-4 xl:mt-auto">
                      <div class="flex flex-wrap items-center justify-end gap-2">
                        <button
                          type="button"
                          @click="$dispatch('open-modal', 'show-destination-{{ $destination->id }}')"
                          class="border-transparent text-gray-600 hover:bg-gray-100 flex items-center gap-x-1.5 rounded-lg border px-2.5 py-1.5 text-[13px]"
                        >
                          <i class="fas fa-eye"></i> Lihat
                        </button>

                        <button
                          type="button"
                          @click="$dispatch('open-modal', 'edit-destination-{{ $destination->id }}')"
                          class="border-transparent text-blue-500 hover:bg-blue-100 flex items-center gap-x-1.5 rounded-lg border px-2.5 py-1.5 text-[13px]"
                        >
                          <i class="fas fa-edit"></i> Edit
                        </button>

                        <form
                          action="{{ route('admin.destinations.destroy', $destination) }}"
                          method="POST"
                          onsubmit="return confirm('Hapus destinasi ini?')"
                        >
                          @csrf
                          @method('DELETE')
                          <button
                            type="submit"
                            class="border-transparent text-red-500 hover:bg-red-100 flex items-center gap-x-1.5 rounded-lg border px-2.5 py-1.5 text-[13px]"
                          >
                            <i class="fas fa-trash"></i> Hapus
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Show Modal -->
            <x-app.modal
              name="show-destination-{{ $destination->id }}"
              title="Detail Destinasi"
              max-width="4xl"
            >
              <div class="space-y-6">
                <!-- Images Gallery -->
                @if ($destination->destinationImages->count() > 0)
                  <div class="grid grid-cols-2 gap-2 md:grid-cols-4">
                    @foreach ($destination->destinationImages as $image)
                      <img
                        src="{{ asset('storage/' . $image->image_path) }}"
                        class="border-gray-200 h-32 w-full rounded-lg border object-cover"
                      >
                    @endforeach
                  </div>
                @endif

                <div class="grid grid-cols-2 gap-4">
                  <div>
                    <label class="text-gray-500 mb-1 block text-sm">Nama Destinasi</label>
                    <p class="text-gray-900 font-semibold">{{ $destination->name }}</p>
                  </div>
                  <div>
                    <label class="text-gray-500 mb-1 block text-sm">Kategori</label>
                    {{-- <p class="text-gray-900 font-semibold">{{ $destination->destinationCategory->name }}</p> --}}
                  </div>
                  <div>
                    <label class="text-gray-500 mb-1 block text-sm">Provinsi</label>
                    <p class="text-gray-900 font-semibold">{{ $destination->region }}</p>
                  </div>
                  @if ($destination->mdpl)
                    <div>
                      <label class="text-gray-500 mb-1 block text-sm">Ketinggian</label>
                      <p class="text-gray-900 font-semibold">{{ number_format($destination->mdpl) }} MDPL</p>
                    </div>
                  @endif
                </div>

                <div>
                  <label class="text-gray-500 mb-1 block text-sm">Meeting Point</label>
                  <p class="text-gray-900">{{ $destination->meeting_point }}</p>
                </div>

                <div>
                  <label class="text-gray-500 mb-1 block text-sm">Deskripsi</label>
                  <div class="text-gray-700 prose prose-sm max-w-none">
                    {!! $destination->description !!}
                  </div>
                </div>
              </div>

              <div class="mt-6 flex justify-end">
                <button
                  type="button"
                  @click="$dispatch('close-modal', 'show-destination-{{ $destination->id }}')"
                  class="border-gray-300 bg-white text-gray-700 rounded-lg border px-4 py-2 text-sm"
                >Tutup</button>
              </div>
            </x-app.modal>

            <!-- Edit Modal -->
            <x-app.modal
              name="edit-destination-{{ $destination->id }}"
              title="Edit Destinasi"
              max-width="5xl"
            >
              <form
                action="{{ route('admin.destinations.update', $destination) }}"
                method="POST"
                enctype="multipart/form-data"
                x-data="{
                    newImages: [],
                    oldImages: @js(
    $destination->destinationImages->map(
        fn($img) => [
            'id' => $img->id,
            'url' => asset('storage/' . $img->image_path),
        ],
    ),
),
                    deleteOldImage(id, index) {
                        if (!confirm('Hapus gambar ini?')) return;
                
                        fetch('{{ route('admin.destination-images.destroy', '') }}/' + id, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                },
                            })
                            .then((res) => {
                                if (res.ok) {
                                    this.oldImages.splice(index, 1);
                                    location.reload();
                                } else {
                                    alert('Gagal menghapus gambar');
                                }
                            })
                            .catch(() => alert('Terjadi kesalahan saat menghapus gambar'));
                    },
                    handleFiles(event) {
                        const files = Array.from(event.target.files);
                        files.forEach(file => {
                            this.newImages.push({
                                url: URL.createObjectURL(file),
                                name: file.name,
                                file: file
                            });
                        });
                    },
                    removeNewImage(index) {
                        this.newImages.splice(index, 1);
                    },
                }"
              >
                @csrf
                @method('PUT')

                <div class="space-y-6">
                  <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                      <label class="text-gray-700 mb-2 block text-sm font-medium">Nama Destinasi *</label>
                      <input
                        type="text"
                        name="name"
                        value="{{ $destination->name }}"
                        class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                        required
                      >
                    </div>

                    <div>
                      <label class="text-gray-700 mb-2 block text-sm font-medium">Kategori *</label>
                      <select
                        name="destination_category_id"
                        class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                        required
                      >
                        @foreach ($categories as $category)
                          <option
                            value="{{ $category->id }}"
                            {{ $destination->destination_category_id == $category->id ? 'selected' : '' }}
                          >
                            {{ $category->name }}
                          </option>
                        @endforeach
                      </select>
                    </div>

                    <div>
                      <label class="text-gray-700 mb-2 block text-sm font-medium">Provinsi *</label>
                      <input
                        type="text"
                        name="region"
                        value="{{ $destination->region }}"
                        class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                        required
                      >
                    </div>

                    <div>
                      <label class="text-gray-700 mb-2 block text-sm font-medium">Ketinggian (MDPL)</label>
                      <input
                        type="number"
                        name="mdpl"
                        value="{{ $destination->mdpl }}"
                        class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                        placeholder="Opsional, untuk gunung"
                      >
                    </div>
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Meeting Point *</label>
                    <textarea
                      name="meeting_point"
                      rows="2"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >{{ $destination->meeting_point }}</textarea>
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Deskripsi *</label>
                    <div
                      class="border-gray-200 focus-within:ring-blue-200 overflow-hidden rounded-lg border focus-within:ring"
                      x-data
                      x-init="const quill = new Quill($refs.quillEditor, { theme: 'snow' });
                      quill.on('text-change', () => $refs.hiddenDescription.value = quill.root.innerHTML);"
                    >
                      <div
                        x-ref="quillEditor"
                        class="min-h-40"
                      >{!! $destination->description !!}</div>
                      <input
                        type="hidden"
                        name="description"
                        x-ref="hiddenDescription"
                        value="{!! $destination->description !!}"
                      >
                    </div>
                  </div>

                  <!-- Add New Images -->
                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Tambah Gambar Baru</label>
                    <input
                      type="file"
                      name="images[]"
                      multiple
                      accept="image/*"
                      @change="handleFiles($event)"
                      class="border-gray-200 file:bg-blue-600 file:text-white hover:file:bg-blue-700 focus:border-blue-500 focus:ring-blue-200 w-full cursor-pointer rounded-lg border px-4 py-0.5 text-sm transition file:mr-4 file:rounded-md file:border-0 file:px-4 file:py-2 file:text-sm file:font-medium focus:ring"
                    >
                    <p class="text-gray-500 mt-1 text-xs">Pilih beberapa gambar sekaligus.</p>
                  </div>

                  <!-- Preview New Images -->
                  <div
                    class="mt-4 grid grid-cols-2 gap-3 md:grid-cols-4"
                    x-show="newImages.length > 0"
                  >
                    <template
                      x-for="(img, index) in newImages"
                      :key="index"
                    >
                      <div class="group relative">
                        <img
                          :src="img.url"
                          class="border-gray-100 h-28 w-full rounded-lg border object-cover shadow-sm"
                        >
                        <button
                          type="button"
                          @click="removeNewImage(index)"
                          class="bg-white border-gray-300 text-gray-700 hover:bg-red-500 hover:text-white absolute -right-2 -top-2 rounded-full border p-1 text-xs transition"
                        >
                          <i class="fas fa-close"></i>
                        </button>
                      </div>
                    </template>
                  </div>

                  <!-- Existing Images -->
                  <template x-if="oldImages.length > 0">
                    <div class="mt-4">
                      <label class="text-gray-700 mb-2 block text-sm font-medium">Gambar Saat Ini</label>
                      <div class="grid grid-cols-2 gap-3 md:grid-cols-4">
                        <template
                          x-for="(img, index) in oldImages"
                          :key="img.id"
                        >
                          <div class="group relative">
                            <img
                              :src="img.url"
                              class="border-gray-100 h-28 w-full rounded-lg border object-cover shadow-sm"
                            >
                            <button
                              type="button"
                              @click="deleteOldImage(img.id, index)"
                              class="bg-white border-gray-300 text-gray-700 hover:bg-red-500 hover:text-white absolute -right-2 -top-2 rounded-full border p-1 text-xs transition"
                            >
                              <i class="fas fa-close"></i>
                            </button>
                            <input
                              type="hidden"
                              name="keep_images[]"
                              :value="img.id"
                            >
                          </div>
                        </template>
                      </div>
                    </div>
                  </template>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                  <button
                    type="button"
                    @click="$dispatch('close-modal', 'edit-destination-{{ $destination->id }}')"
                    class="border-gray-300 bg-white text-gray-700 rounded-lg border px-4 py-2 text-sm"
                  >Batal</button>
                  <button
                    type="submit"
                    class="bg-blue-600 text-white rounded-lg px-4 py-2 text-sm"
                  >
                    <i class="fas fa-check mr-2"></i> Simpan
                  </button>
                </div>
              </form>
            </x-app.modal>
          @endforeach

          <!-- Create Modal -->
          <x-app.modal
            name="create-destination"
            title="Tambah Destinasi"
            max-width="5xl"
          >
            <form
              action="{{ route('admin.destinations.store') }}"
              method="POST"
              enctype="multipart/form-data"
              x-data="{
                  images: [],
                  files: [],
                  handleFiles(event) {
                      const newFiles = Array.from(event.target.files);
                      this.files = [...this.files, ...newFiles];
                      this.images = this.files.map(f => ({
                          url: URL.createObjectURL(f),
                          name: f.name
                      }));
                  },
                  removeImage(index) {
                      this.files.splice(index, 1);
                      this.images.splice(index, 1);
                  }
              }"
              @reset-images.window="images = []; files = []"
            >
              @csrf

              <div class="space-y-6">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Nama Destinasi *</label>
                    <input
                      type="text"
                      name="name"
                      value="{{ old('name') }}"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Kategori *</label>
                    <select
                      name="destination_category_id"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >
                      <option value="">Pilih Kategori</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Provinsi *</label>
                    <input
                      type="text"
                      name="region"
                      value="{{ old('region') }}"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Ketinggian (MDPL)</label>
                    <input
                      type="number"
                      name="mdpl"
                      value="{{ old('mdpl') }}"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      placeholder="Opsional"
                    >
                  </div>
                </div>

                <div>
                  <label class="text-gray-700 mb-2 block text-sm font-medium">Meeting Point *</label>
                  <textarea
                    name="meeting_point"
                    rows="2"
                    class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                    required
                  >{{ old('meeting_point') }}</textarea>
                </div>

                <div>
                  <label class="text-gray-700 mb-2 block text-sm font-medium">Deskripsi *</label>
                  <div
                    class="border-gray-200 focus-within:ring-blue-200 overflow-hidden rounded-lg border focus-within:ring"
                    x-data
                    x-init="const quill = new Quill($refs.quillEditor, { theme: 'snow' });
                    quill.on('text-change', () => $refs.hiddenDescription.value = quill.root.innerHTML);"
                  >
                    <div
                      x-ref="quillEditor"
                      class="min-h-40"
                    >{!! old('description') !!}</div>
                    <input
                      type="hidden"
                      name="description"
                      x-ref="hiddenDescription"
                      value="{!! old('description') !!}"
                    >
                  </div>
                </div>

                <div>
                  <label class="text-gray-700 mb-2 block text-sm font-medium">Destination Images</label>
                  <input
                    type="file"
                    name="images[]"
                    multiple
                    accept="image/*"
                    @change="handleFiles($event)"
                    class="border-gray-200 file:bg-blue-600 file:text-white hover:file:bg-blue-700 focus:border-blue-500 focus:ring-blue-200 w-full cursor-pointer rounded-lg border px-4 py-0.5 text-sm transition file:mr-4 file:rounded-md file:border-0 file:px-4 file:py-2 file:text-sm file:font-medium focus:ring"
                  >
                  <p class="text-gray-500 mt-1 text-xs">You can select multiple images.</p>

                  <!-- Preview -->
                  <div
                    class="mt-4 grid grid-cols-2 gap-3 md:grid-cols-4"
                    x-show="images.length > 0"
                  >
                    <template
                      x-for="(img, index) in images"
                      :key="index"
                    >
                      <div class="group relative">
                        <img
                          :src="img.url"
                          class="border-gray-100 h-28 w-full rounded-lg border object-cover shadow-sm"
                        >
                        <button
                          type="button"
                          @click="removeImage(index)"
                          class="bg-white border-gray-300 text-gray-700 hover:bg-red-500 hover:text-white absolute -right-2 -top-2 rounded-full border p-1 text-xs transition"
                        >
                          <i class="fas fa-close"></i>
                        </button>
                      </div>
                    </template>
                  </div>
                </div>
              </div>

              <div class="mt-6 flex justify-end space-x-3">
                <button
                  type="button"
                  @click="$dispatch('close-modal', 'create-destination')"
                  class="border-gray-300 bg-white text-gray-700 rounded-lg border px-4 py-2 text-sm"
                >Batal</button>
                <button
                  type="submit"
                  class="bg-blue-600 text-white rounded-lg px-4 py-2 text-sm"
                >
                  <i class="fas fa-plus mr-2"></i> Tambah
                </button>
              </div>
            </form>
          </x-app.modal>
          
          <x-app.modal
            name="create-destination-category"
            title="Tambah Kategori Destinasi"
            max-width="5xl"
          >
            <form
              action="{{ route('admin.destination-category.store') }}"
              method="POST"
            >
              @csrf

              <div class="space-y-6">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                </div>
                
                <div>
                  <label class="text-gray-700 mb-2 block text-sm font-medium">Nama Kategori *</label>
                  <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                    required
                  >
                </div>
              </div>

              <div class="mt-6 flex justify-end space-x-3">
                <button
                  type="button"
                  @click="$dispatch('close-modal', 'create-destination-category')"
                  class="border-gray-300 bg-white text-gray-700 rounded-lg border px-4 py-2 text-sm"
                >Batal</button>
                <button
                  type="submit"
                  class="bg-blue-600 text-white rounded-lg px-4 py-2 text-sm"
                >
                  <i class="fas fa-plus mr-2"></i> Tambah
                </button>
              </div>
            </form>
          </x-app.modal>

          <div class="mt-6">{{ $destinations->links() }}</div>
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
