<x-app-layout>
  <x-slot name="header">{{ __('Tentang Kami - Deskripsi') }}</x-slot>

  <div
    class="[&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 flex flex-1 flex-col overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2"
  >
    <div class="flex flex-1 flex-col lg:flex-row">
      <div class="border-gray-200 flex min-w-0 flex-1 flex-col border-e">
        <div class="bg-white border-gray-200 flex flex-col p-4">

          <!-- Header -->
          <div
            class="border-gray-200 mb-4 flex flex-wrap items-center justify-between gap-2 border-b border-dashed pb-2">
            <h3 class="text-gray-800 text-lg font-semibold">Deskripsi</h3>
          </div>

          <!-- Main Description Section -->
          @if ($aboutDescription)
            <div class="bg-gray-50 border-gray-200 mb-6 rounded-lg border p-6">
              <div class="mb-4 flex items-start justify-between">
                <div class="flex-1">
                  <h4 class="text-gray-900 mb-2 text-base font-semibold">{{ $aboutDescription->heading }}</h4>
                  <p class="text-gray-700 text-sm">{{ $aboutDescription->paragraph }}</p>
                </div>
                <button
                  @click="$dispatch('open-modal', 'edit-about-description')"
                  type="button"
                  class="border-transparent text-blue-500 hover:bg-blue-100 hover:text-blue-800 flex items-center gap-x-1.5 rounded-lg border px-3 py-2 text-sm"
                >
                  <i class="fas fa-edit"></i> Edit
                </button>
              </div>
            </div>

            <!-- Edit About Description Modal -->
            <x-app.modal
              name="edit-about-description"
              title="Edit Deskripsi Utama"
              max-width="3xl"
            >
              <form
                action="{{ route('admin.description.update', $aboutDescription) }}"
                method="POST"
              >
                @csrf
                @method('PUT')

                <div class="space-y-6">
                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Judul Utama *</label>
                    <input
                      type="text"
                      name="heading"
                      value="{{ $aboutDescription->heading }}"
                      class="border-gray-300 focus:border-blue-500 focus:ring-blue-200 w-full rounded-lg border px-4 py-2.5 text-sm transition focus:ring"
                      required
                    >
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Paragraf *</label>
                    <textarea
                      name="paragraph"
                      rows="4"
                      class="border-gray-300 focus:border-blue-500 focus:ring-blue-200 w-full rounded-lg border px-4 py-2.5 text-sm transition focus:ring"
                      required
                    >{{ $aboutDescription->paragraph }}</textarea>
                  </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                  <button
                    type="button"
                    @click="$dispatch('close-modal', 'edit-about-description')"
                    class="border-gray-300 bg-white text-gray-700 hover:bg-gray-50 rounded-lg border px-4 py-2 text-sm font-medium"
                  >
                    Batal
                  </button>
                  <button
                    type="submit"
                    class="bg-blue-600 text-white hover:bg-blue-700 rounded-lg px-4 py-2 text-sm font-medium"
                  >
                    <i class="fas fa-check mr-2"></i> Simpan
                  </button>
                </div>
              </form>
            </x-app.modal>
          @endif

          <!-- Featured Services Section -->
          <div class="border-gray-200 border-t pt-6">
            <div class="mb-4 flex items-center justify-between">
              <h3 class="text-gray-800 text-lg font-semibold">Layanan Unggulan</h3>
              @if ($featuredServices->count() < 3)
                <button
                  @click="$dispatch('open-modal', 'create-featured-service')"
                  type="button"
                  class="bg-blue-600 text-white hover:bg-blue-700 rounded-lg px-4 py-2 text-sm font-medium"
                >
                  <i class="fas fa-plus mr-2"></i> Tambah Layanan
                </button>
              @endif
            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
              @foreach ($featuredServices as $service)
                <div class="bg-white border-gray-200 rounded-lg border p-4">
                  <h4 class="text-gray-900 mb-2 text-sm font-semibold">{{ $service->heading }}</h4>
                  <p class="text-gray-600 mb-3 text-xs">{{ $service->description }}</p>
                  <div class="flex flex-wrap items-center justify-end gap-2">
                    <button
                      @click="$dispatch('open-modal', 'edit-featured-service-{{ $service->id }}')"
                      type="button"
                      class="text-blue-700 bg-blue-50 border-blue-200 hover:bg-blue-100 inline-flex flex-1 items-center justify-center rounded-lg border px-3 py-2 text-sm font-medium"
                    >
                      <i class="fa-solid fa-pen-to-square mr-1.5"></i>
                      Edit
                    </button>
                    <form
                      action="{{ route('admin.featured-services.destroy', $service) }}"
                      method="POST"
                    >
                      @csrf
                      @method('DELETE')
                      <button
                        type="submit"
                        onclick="return confirm('Hapus layanan ini?')"
                        class="text-red-600 hover:bg-red-50 border-gray-300 inline-flex items-center justify-center rounded-lg border p-2"
                      >
                        <i class="fa-solid fa-trash-can text-lg"></i>
                      </button>
                    </form>
                  </div>
                </div>

                <!-- Edit Modal per Service -->
                <x-app.modal
                  name="edit-featured-service-{{ $service->id }}"
                  title="Edit Layanan Unggulan"
                  max-width="2xl"
                >
                  <form
                    action="{{ route('admin.featured-services.update', $service) }}"
                    method="POST"
                  >
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">
                      <div>
                        <label class="text-gray-700 mb-2 block text-sm font-medium">Judul Layanan *</label>
                        <input
                          type="text"
                          name="heading"
                          value="{{ $service->heading }}"
                          class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                          required
                        >
                      </div>
                      <div>
                        <label class="text-gray-700 mb-2 block text-sm font-medium">Deskripsi *</label>
                        <textarea
                          name="description"
                          rows="3"
                          class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                          required
                        >{{ $service->description }}</textarea>
                      </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                      <button
                        type="button"
                        @click="$dispatch('close-modal', 'edit-featured-service-{{ $service->id }}')"
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
          </div>

          <!-- Create Featured Service Modal -->
          <x-app.modal
            name="create-featured-service"
            title="Tambah Layanan Unggulan"
            max-width="2xl"
          >
            <form
              action="{{ route('admin.featured-services.store') }}"
              method="POST"
            >
              @csrf
              <div class="space-y-4">
                <div>
                  <label class="text-gray-700 mb-2 block text-sm font-medium">Judul Layanan *</label>
                  <input
                    type="text"
                    name="heading"
                    value="{{ old('heading') }}"
                    class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                    required
                  >
                </div>
                <div>
                  <label class="text-gray-700 mb-2 block text-sm font-medium">Deskripsi *</label>
                  <textarea
                    name="description"
                    rows="3"
                    class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                    required
                  >{{ old('description') }}</textarea>
                </div>
              </div>

              <div class="mt-6 flex justify-end space-x-3">
                <button
                  type="button"
                  @click="$dispatch('close-modal', 'create-featured-service')"
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

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
