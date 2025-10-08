<x-app-layout>
  <x-slot name="header">{{ __('Produk Rental') }}</x-slot>

  <div
    class="[&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 flex flex-1 flex-col overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2"
  >
    <div class="flex flex-1 flex-col lg:flex-row">
      <div class="border-gray-200 flex min-w-0 flex-1 flex-col border-e">
        <div class="bg-white border-gray-200 flex flex-col p-4">

          <!-- Header -->
          <div class="border-gray-200 flex flex-wrap items-center justify-between gap-2 border-b border-dashed pb-2">
            <div class="relative">
              <input
                type="text"
                id="search-product"
                class="border-gray-200 focus:border-blue-500 block w-64 rounded-lg px-3 py-2 ps-11 text-sm"
                placeholder="Cari produk..."
              >
              <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-4">
                <i class="fas fa-search text-gray-400 text-sm"></i>
              </div>
            </div>

            <button
              @click="$dispatch('open-modal', 'create-product')"
              type="button"
              class="bg-blue-600 text-white hover:bg-blue-700 rounded-lg px-4 py-2 text-sm font-medium"
            >
              <i class="fas fa-plus mr-2"></i> Tambah Produk
            </button>
          </div>

          <!-- Data Grid -->
          <div class="mt-4 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products as $product)
              <div class="bg-white border-gray-200 overflow-hidden rounded-lg border transition hover:shadow-lg">
                <div class="bg-gray-100 relative h-48">
                  @if ($product->image)
                    <img
                      src="{{ asset('storage/' . $product->image) }}"
                      class="absolute inset-0 h-full w-full object-cover"
                      alt="{{ $product->name }}"
                    >
                  @else
                    <div class="absolute inset-0 flex items-center justify-center">
                      <i class="fas fa-box text-gray-300 text-5xl"></i>
                    </div>
                  @endif

                  <!-- Stock Badge -->
                  <div
                    class="bg-white/90 {{ $product->stock_quantity > 10 ? 'text-green-700' : ($product->stock_quantity > 0 ? 'text-yellow-700' : 'text-red-700') }} absolute right-3 top-3 rounded-full px-2.5 py-1 text-xs font-medium backdrop-blur-sm"
                  >
                    Stok: {{ $product->stock_quantity }}
                  </div>
                </div>

                <div class="p-4">
                  <h3 class="text-gray-900 mb-2 line-clamp-1 font-semibold">{{ $product->name }}</h3>
                  <p class="text-gray-600 mb-3 line-clamp-2 text-xs">{{ $product->description }}</p>

                  <!-- Pricing -->
                  <div class="bg-gray-50 mb-3 space-y-1 rounded-lg p-3">
                    <div class="flex justify-between text-xs">
                      <span class="text-gray-600">1 Hari:</span>
                      <span class="text-gray-900 font-semibold">Rp
                        {{ number_format($product->price_one_day, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-xs">
                      <span class="text-gray-600">2 Hari:</span>
                      <span class="text-gray-900 font-semibold">Rp
                        {{ number_format($product->price_two_days, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-xs">
                      <span class="text-gray-600">Extra/Hari:</span>
                      <span class="text-gray-900 font-semibold">Rp
                        {{ number_format($product->price_extra_per_day, 0, ',', '.') }}</span>
                    </div>
                  </div>

                  <!-- Actions -->
                  <div class="flex gap-2">
                    <button
                      @click="$dispatch('open-modal', 'edit-product-{{ $product->id }}')"
                      type="button"
                      class="text-blue-600 hover:bg-blue-50 border-blue-200 flex-1 rounded-lg border px-3 py-1.5 text-xs"
                    >
                      <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                    <form
                      action="{{ route('admin.products.destroy', $product) }}"
                      method="POST"
                      class="flex-1"
                    >
                      @csrf
                      @method('DELETE')
                      <button
                        type="submit"
                        onclick="return confirm('Hapus produk ini?')"
                        class="text-red-600 hover:bg-red-50 border-red-200 w-full rounded-lg border px-3 py-1.5 text-xs"
                      >
                        <i class="fas fa-trash mr-1"></i> Hapus
                      </button>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Edit Modal -->
              <x-app.modal
                name="edit-product-{{ $product->id }}"
                title="Edit Produk"
                max-width="3xl"
              >
                <form
                  action="{{ route('admin.products.update', $product) }}"
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

                  <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                      <div class="col-span-2">
                        <label class="text-gray-700 mb-2 block text-sm font-medium">Nama Produk *</label>
                        <input
                          type="text"
                          name="name"
                          value="{{ $product->name }}"
                          class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                          required
                        >
                      </div>

                      <div class="col-span-2">
                        <label class="text-gray-700 mb-2 block text-sm font-medium">Deskripsi *</label>
                        <textarea
                          name="description"
                          rows="3"
                          class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                          required
                        >{{ $product->description }}</textarea>
                      </div>

                      <div>
                        <label class="text-gray-700 mb-2 block text-sm font-medium">Stok *</label>
                        <input
                          type="number"
                          name="stock_quantity"
                          value="{{ $product->stock_quantity }}"
                          min="0"
                          class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                          required
                        >
                      </div>

                      <div>
                        <label class="text-gray-700 mb-2 block text-sm font-medium">Harga 1 Hari *</label>
                        <input
                          type="number"
                          name="price_one_day"
                          value="{{ $product->price_one_day }}"
                          min="0"
                          class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                          required
                        >
                      </div>

                      <div>
                        <label class="text-gray-700 mb-2 block text-sm font-medium">Harga 2 Hari *</label>
                        <input
                          type="number"
                          name="price_two_days"
                          value="{{ $product->price_two_days }}"
                          min="0"
                          class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                          required
                        >
                      </div>

                      <div>
                        <label class="text-gray-700 mb-2 block text-sm font-medium">Harga Extra/Hari *</label>
                        <input
                          type="number"
                          name="price_extra_per_day"
                          value="{{ $product->price_extra_per_day }}"
                          min="0"
                          class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                          required
                        >
                      </div>
                    </div>

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
                      @if ($product->image)
                        <div
                          class="mt-4"
                          x-show="!image"
                        >
                          <label class="text-gray-700 mb-2 block text-sm font-medium">Gambar Saat Ini</label>
                          <div class="relative w-40">
                            <img
                              src="{{ asset('storage/' . $product->image) }}"
                              class="border-gray-200 h-28 w-full rounded-lg border object-cover shadow-sm"
                            >
                          </div>
                        </div>
                      @endif
                    </div>
                  </div>

                  <div class="mt-6 flex justify-end space-x-3">
                    <button
                      type="button"
                      @click="$dispatch('close-modal', 'edit-product-{{ $product->id }}')"
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
          </div>

          <!-- Create Modal -->
          <x-app.modal
            name="create-product"
            title="Tambah Produk"
            max-width="3xl"
          >
            <form
              action="{{ route('admin.products.store') }}"
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

              <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                  <div class="col-span-2">
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Nama Produk *</label>
                    <input
                      type="text"
                      name="name"
                      value="{{ old('name') }}"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >
                  </div>

                  <div class="col-span-2">
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Deskripsi *</label>
                    <textarea
                      name="description"
                      rows="3"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >{{ old('description') }}</textarea>
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Stok *</label>
                    <input
                      type="number"
                      name="stock_quantity"
                      value="{{ old('stock_quantity', 0) }}"
                      min="0"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Harga 1 Hari *</label>
                    <input
                      type="number"
                      name="price_one_day"
                      value="{{ old('price_one_day') }}"
                      min="0"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Harga 2 Hari *</label>
                    <input
                      type="number"
                      name="price_two_days"
                      value="{{ old('price_two_days') }}"
                      min="0"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Harga Extra/Hari *</label>
                    <input
                      type="number"
                      name="price_extra_per_day"
                      value="{{ old('price_extra_per_day') }}"
                      min="0"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >
                  </div>
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

              <div class="mt-6 flex justify-end space-x-3">
                <button
                  type="button"
                  @click="$dispatch('close-modal', 'create-product')"
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

          <div class="mt-6">{{ $products->links() }}</div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
