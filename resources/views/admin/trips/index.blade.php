<x-app-layout>
  <x-slot name="header">{{ __('Paket Trip') }}</x-slot>

  <div
    class="[&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 flex flex-1 flex-col overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2"
  >
    <div class="flex flex-1 flex-col lg:flex-row">
      <div class="border-gray-200 flex min-w-0 flex-1 flex-col border-e">
        <div class="bg-white border-gray-200 flex flex-col p-4">

          <!-- Header -->
          <div class="border-gray-200 flex flex-wrap items-center justify-between gap-2 border-b border-dashed pb-2">
            <div class="flex gap-2">
              <div class="relative">
                <input
                  type="text"
                  id="search-trip"
                  class="border-gray-200 focus:border-blue-500 block w-64 rounded-lg px-3 py-2 ps-11 text-sm"
                  placeholder="Cari trip..."
                >
                <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-4">
                  <i class="fas fa-search text-gray-400 text-sm"></i>
                </div>
              </div>

              <select class="border-gray-200 focus:border-blue-500 rounded-lg px-3 py-2 text-sm">
                <option value="">Semua Tipe</option>
                <option value="open_trip">Open Trip</option>
                <option value="private_trip">Private Trip</option>
                <option value="family_gathering">Family Gathering</option>
              </select>
            </div>

            <button
              @click="$dispatch('open-modal', 'create-trip')"
              type="button"
              class="bg-blue-600 text-white hover:bg-blue-700 rounded-lg px-4 py-2 text-sm font-medium"
            >
              <i class="fas fa-plus mr-2"></i> Tambah Trip
            </button>
          </div>

          <!-- Data Loop -->
          @foreach ($trips as $trip)
            <div class="bg-white border-gray-200 flex flex-col border-b pb-4 pt-4 last:border-b-0">
              <div class="flex flex-col gap-5 md:flex-row">
                <div class="bg-gray-100 relative h-48 w-full rounded-lg md:max-w-80">

                  <!-- Type Badge -->
                  <div class="absolute bottom-3 left-3">
                    <span
                      class="{{ $trip->type === 'open_trip'
                          ? 'bg-green-100 text-green-800'
                          : ($trip->type === 'private_trip'
                              ? 'bg-blue-100 text-blue-800'
                              : 'bg-purple-100 text-purple-800') }} inline-flex rounded-full px-2.5 py-1 text-xs font-medium"
                    >
                      {{ str_replace('_', ' ', ucfirst($trip->type)) }}
                    </span>
                  </div>
                </div>

                <div class="grow">
                  <div class="flex h-full flex-col">
                    <div class="mb-3 flex items-start justify-between">
                      <div>
                        <h3 class="text-gray-900 text-lg font-semibold">{{ $trip->title }}</h3>
                        <p class="text-gray-600 text-sm">{{ $trip->destination->name }}</p>
                      </div>
                    </div>

                    <div class="mb-3 grid grid-cols-2 gap-x-2 gap-y-3 xl:grid-cols-4">
                      <div class="flex flex-col gap-y-1">
                        <span class="text-gray-500 text-[13px]">Durasi:</span>
                        <span class="text-gray-800 text-sm font-medium">{{ $trip->duration }} hari</span>
                      </div>

                      <div class="flex flex-col gap-y-1">
                        <span class="text-gray-500 text-[13px]">Harga/Pax:</span>
                        <span class="text-gray-800 text-sm font-medium">Rp
                          {{ number_format($trip->price, 0, ',', '.') }}</span>
                      </div>

                      <div class="flex flex-col gap-y-1">
                        <span class="text-gray-500 text-[13px]">Kapasitas:</span>
                        <span class="text-gray-800 text-sm font-medium">{{ $trip->capacity }} orang</span>
                      </div>

                      <div class="flex flex-col gap-y-1">
                        <span class="text-gray-500 text-[13px]">Paket:</span>
                        <span class="text-gray-800 text-sm font-medium">{{ $trip->packages->count() }} paket</span>
                      </div>
                    </div>

                    @if ($trip->type === 'open_trip')
                      <div class="mb-3">
                        <span class="text-gray-500 text-xs">Tanggal Keberangkatan:</span>
                        <div class="mt-1 flex flex-wrap gap-1">
                          <span class="bg-blue-50 text-blue-700 rounded px-2 py-0.5 text-xs">
                            {{ $trip->departure_date }}
                          </span>
                        </div>
                      </div>
                    @endif

                    <div class="border-gray-200 border-t pt-3 xl:mt-auto">
                      <div class="flex flex-wrap items-center justify-end gap-2">
                        <button
                          type="button"
                          @click="$dispatch('open-modal', 'show-trip-{{ $trip->id }}')"
                          class="border-transparent text-gray-600 hover:bg-gray-100 flex items-center gap-x-1.5 rounded-lg border px-2.5 py-1.5 text-[13px]"
                        >
                          <i class="fas fa-eye"></i> Lihat
                        </button>

                        <button
                          type="button"
                          @click="$dispatch('open-modal', 'edit-trip-{{ $trip->id }}')"
                          class="border-transparent text-blue-500 hover:bg-blue-100 flex items-center gap-x-1.5 rounded-lg border px-2.5 py-1.5 text-[13px]"
                        >
                          <i class="fas fa-edit"></i> Edit
                        </button>

                        <form
                          action="{{ route('admin.trips.destroy', $trip) }}"
                          method="POST"
                          onsubmit="return confirm('Hapus trip ini?')"
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
              name="show-trip-{{ $trip->id }}"
              title="Detail Trip"
              max-width="5xl"
            >
              <div class="space-y-6">

                <div class="grid grid-cols-2 gap-4">
                  <div>
                    <label class="text-gray-500 mb-1 block text-sm">Judul Trip</label>
                    <p class="text-gray-900 font-semibold">{{ $trip->title }}</p>
                  </div>
                  <div>
                    <label class="text-gray-500 mb-1 block text-sm">Destinasi</label>
                    <p class="text-gray-900 font-semibold">{{ $trip->destination->name }}</p>
                  </div>
                  <div>
                    <label class="text-gray-500 mb-1 block text-sm">Tipe Trip</label>
                    <p class="text-gray-900 font-semibold">{{ str_replace('_', ' ', ucfirst($trip->type)) }}</p>
                  </div>
                  <div>
                    <label class="text-gray-500 mb-1 block text-sm">Durasi</label>
                    <p class="text-gray-900 font-semibold">{{ $trip->duration }} hari</p>
                  </div>
                </div>

                <!-- Packages -->
                @if ($trip->packages->count() > 0)
                  <div>
                    <label class="text-gray-500 mb-2 block text-sm">Paket Tersedia</label>
                    <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
                      @foreach ($trip->packages as $package)
                        <div class="border-gray-200 rounded-lg border p-4">
                          <h4 class="text-gray-900 mb-1 font-semibold">{{ ucfirst($package->package_type) }}</h4>
                          <p class="text-blue-600 mb-2 font-bold">Rp {{ number_format($package->price, 0, ',', '.') }}
                          </p>
                          <div class="text-gray-700 prose prose-sm">
                            {!! $package->benefits !!}
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                @endif

                <!-- Departure Dates (for open trip) -->
                @if ($trip->type === 'open_trip')
                  <div>
                    <label class="text-gray-500 mb-2 block text-sm">Tanggal Keberangkatan</label>
                    <div class="flex flex-wrap gap-2">
                      <span class="bg-blue-50 text-blue-700 rounded-lg px-3 py-1 text-sm">
                        {{ $trip->departure_date }}
                      </span>
                    </div>
                  </div>
                @endif

                <div>
                  <label class="text-gray-500 mb-1 block text-sm">Benefit</label>
                  <div class="text-gray-700 prose prose-sm max-w-none">
                    {!! $trip->benefit !!}
                  </div>
                </div>
              </div>

              <div class="mt-6 flex justify-end">
                <button
                  type="button"
                  @click="$dispatch('close-modal', 'show-trip-{{ $trip->id }}')"
                  class="border-gray-300 bg-white text-gray-700 rounded-lg border px-4 py-2 text-sm"
                >Tutup</button>
              </div>
            </x-app.modal>

            <!-- Edit Modal -->
            <x-app.modal
              name="edit-trip-{{ $trip->id }}"
              title="Edit Trip"
              max-width="5xl"
            >
              <form
                action="{{ route('admin.trips.update', $trip) }}"
                method="POST"
                enctype="multipart/form-data"
              >
                @csrf
                @method('PUT')

                <div class="max-h-[70vh] space-y-6 overflow-y-auto pr-2">
                  <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                      <label class="text-gray-700 mb-2 block text-sm font-medium">Judul Trip *</label>
                      <input
                        type="text"
                        name="title"
                        value="{{ $trip->title }}"
                        class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                        required
                      >
                    </div>

                    <div>
                      <label class="text-gray-700 mb-2 block text-sm font-medium">Destinasi *</label>
                      <select
                        name="destination_id"
                        class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                        required
                      >
                        @foreach ($destinations as $destination)
                          <option
                            value="{{ $destination->id }}"
                            {{ $trip->destination_id == $destination->id ? 'selected' : '' }}
                          >
                            {{ $destination->name }}
                          </option>
                        @endforeach
                      </select>
                    </div>

                    <div>
                      <label class="text-gray-700 mb-2 block text-sm font-medium">Tipe Trip *</label>
                      <select
                        name="type"
                        class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                        required
                      >
                        <option
                          value="open_trip"
                          {{ $trip->type == 'open_trip' ? 'selected' : '' }}
                        >Open Trip</option>
                        <option
                          value="private_trip"
                          {{ $trip->type == 'private_trip' ? 'selected' : '' }}
                        >Private Trip</option>
                        <option
                          value="family_gathering"
                          {{ $trip->type == 'family_gathering' ? 'selected' : '' }}
                        >Family Gathering</option>
                      </select>
                    </div>

                    <div>
                      <label class="text-gray-700 mb-2 block text-sm font-medium">Durasi (hari) *</label>
                      <input
                        type="number"
                        name="duration"
                        value="{{ $trip->duration }}"
                        min="1"
                        class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                        required
                      >
                    </div>

                    <div>
                      <label class="text-gray-700 mb-2 block text-sm font-medium">Harga per Pax *</label>
                      <input
                        type="number"
                        name="price"
                        value="{{ $trip->price }}"
                        min="0"
                        class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                        required
                      >
                    </div>

                    <div>
                      <label class="text-gray-700 mb-2 block text-sm font-medium">Kapasitas *</label>
                      <input
                        type="number"
                        name="capacity"
                        value="{{ $trip->capacity }}"
                        min="1"
                        class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                        required
                      >
                    </div>
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Benefit *</label>
                    <div
                      class="border-gray-200 focus-within:ring-blue-200 overflow-hidden rounded-lg border focus-within:ring"
                      x-data
                      x-init="const quill = new Quill($refs.quillEditor, { theme: 'snow' });
                      quill.on('text-change', () => $refs.hiddenBenefit.value = quill.root.innerHTML);"
                    >
                      <div x-ref="quillEditor">{!! $trip->benefit !!}</div>
                      <input
                        type="hidden"
                        name="benefit"
                        x-ref="hiddenBenefit"
                      >
                    </div>
                  </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                  <button
                    type="button"
                    @click="$dispatch('close-modal', 'edit-trip-{{ $trip->id }}')"
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
            name="create-trip"
            title="Tambah Trip"
            max-width="5xl"
          >
            <form
              action="{{ route('admin.trips.store') }}"
              method="POST"
              enctype="multipart/form-data"
            >
              @csrf

              <div class="max-h-[70vh] space-y-6 overflow-y-auto pr-2">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Judul Trip *</label>
                    <input
                      type="text"
                      name="title"
                      value="{{ old('title') }}"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Destinasi *</label>
                    <select
                      name="destination_id"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >
                      <option value="">Pilih Destinasi</option>
                      @foreach ($destinations as $destination)
                        <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Tipe Trip *</label>
                    <select
                      name="type"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >
                      <option value="">Pilih Tipe</option>
                      <option value="open_trip">Open Trip</option>
                      <option value="private_trip">Private Trip</option>
                      <option value="family_gathering">Family Gathering</option>
                    </select>
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Durasi (hari) *</label>
                    <input
                      type="number"
                      name="duration"
                      value="{{ old('duration') }}"
                      min="1"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Harga per Pax *</label>
                    <input
                      type="number"
                      name="price"
                      value="{{ old('price') }}"
                      min="0"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Kapasitas *</label>
                    <input
                      type="number"
                      name="capacity"
                      value="{{ old('capacity') }}"
                      min="1"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >
                  </div>
                </div>

                <div>
                  <label class="text-gray-700 mb-2 block text-sm font-medium">Benefit *</label>
                  <div
                    class="border-gray-200 focus-within:ring-blue-200 overflow-hidden rounded-lg border focus-within:ring"
                    x-data
                    x-init="const quill = new Quill($refs.quillEditor, { theme: 'snow' });
                    quill.on('text-change', () => $refs.hiddenBenefit.value = quill.root.innerHTML);"
                  >
                    <div x-ref="quillEditor">{!! old('benefit') !!}</div>
                    <input
                      type="hidden"
                      name="benefit"
                      x-ref="hiddenBenefit"
                    >
                  </div>
                </div>
              </div>

              <div class="mt-6 flex justify-end space-x-3">
                <button
                  type="button"
                  @click="$dispatch('close-modal', 'create-trip')"
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

          <div class="mt-6">{{ $trips->links() }}</div>
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
