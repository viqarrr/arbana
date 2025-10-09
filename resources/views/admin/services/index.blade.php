<x-app-layout>
    <x-slot name="header">{{ __('Layanan Tambahan') }}</x-slot>

    <div
        class="[&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 flex flex-1 flex-col overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2">
        <div class="flex flex-1 flex-col lg:flex-row">
            <div class="border-gray-200 flex min-w-0 flex-1 flex-col border-e">
                <div class="bg-white border-gray-200 flex flex-col p-4">

                    <!-- Header -->
                    <div
                        class="border-gray-200 mb-4 flex flex-wrap items-center justify-between gap-2 border-b border-dashed pb-2">
                        <h3 class="text-gray-800 text-lg font-semibold">Kelola Layanan Tambahan</h3>
                        <button @click="$dispatch('open-modal', 'create-service')" type="button"
                            class="bg-blue-600 text-white hover:bg-blue-700 rounded-lg px-4 py-2 text-sm font-medium">
                            <i class="fas fa-plus mr-2"></i> Tambah Layanan
                        </button>
                    </div>

                    <!-- Service Grid -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($services as $service)
                            <div
                                class="bg-white border-gray-200 overflow-hidden rounded-lg border transition hover:shadow-lg">
                                <div class="from-blue-50 to-blue-100 relative h-48 bg-gradient-to-br">
                                    @if ($service->image)
                                        <img src="{{ asset('storage/' . $service->image) }}"
                                            class="absolute inset-0 h-full w-full object-cover"
                                            alt="{{ $service->name }}">
                                    @else
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <i class="fas fa-concierge-bell text-blue-300 text-6xl"></i>
                                        </div>
                                    @endif
                                </div>

                                <div class="p-5">
                                    <h3 class="text-gray-900 mb-2 font-bold">{{ $service->name }}</h3>
                                    <div class="text-gray-600 mb-4 line-clamp-2 text-sm list prose prose-lg">{!! $service->description !!}</div>

                                    <div class="bg-blue-50 mb-4 rounded-lg p-3">
                                        <p class="text-gray-600 mb-1 text-xs">Harga Layanan</p>
                                        <p class="text-blue-600 text-2xl font-bold">Rp
                                            {{ number_format($service->price, 0, ',', '.') }}</p>
                                    </div>

                                    <div class="flex gap-2">
                                        <button @click="$dispatch('open-modal', 'edit-service-{{ $service->id }}')"
                                            type="button"
                                            class="text-blue-600 hover:bg-blue-50 border-blue-200 flex-1 rounded-lg border px-3 py-2 text-sm">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </button>
                                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                                            class="flex-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Hapus layanan ini?')"
                                                class="text-red-600 hover:bg-red-50 border-red-200 w-full rounded-lg border px-3 py-2 text-sm">
                                                <i class="fas fa-trash mr-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Modal -->
                            <x-app.modal name="edit-service-{{ $service->id }}" title="Edit Layanan" max-width="2xl">
                                <form action="{{ route('admin.services.update', $service) }}" method="POST"
                                    enctype="multipart/form-data" x-data="{
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
                                    @reset-image.window="image = null; file = null">
                                    @csrf
                                    @method('PUT')

                                    <div class="space-y-4">
                                        <div>
                                            <label class="text-gray-700 mb-2 block text-sm font-medium">Nama Layanan
                                                *</label>
                                            <input type="text" name="name"
                                                value="{{ old('name', $service->name) }}"
                                                class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                                                required>
                                            <x-input-error for="name" class="mt-2"></x-input-error>
                                        </div>

                                        <div>
                                            <label class="text-gray-700 mb-2 block text-sm font-medium">Deskripsi
                                                *</label>
                                            <div class="border-gray-200 focus-within:ring-blue-200 overflow-hidden rounded-lg border focus-within:ring"
                                                x-data x-init="const quill = new Quill($refs.quillEditor, { theme: 'snow' });
                                                quill.on('text-change', function() {
                                                    $refs.hiddenContent.value = quill.root.innerHTML;
                                                });">
                                                <div x-ref="quillEditor" class="min-h-40">{!! old('description', $service->description) !!}</div>
                                                <input type="hidden" name="description" x-ref="hiddenContent"
                                                    value="{{ old('description', $service->description) }}">
                                            </div>
                                            <x-input-error for="description" class="mt-2"></x-input-error>
                                        </div>

                                        <div>
                                            <label class="text-gray-700 mb-2 block text-sm font-medium">Harga *</label>
                                            <input type="number" name="price"
                                                value="{{ old('price', $service->price) }}" min="0"
                                                class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                                                required>
                                            <x-input-error for="price" class="mt-2"></x-input-error>
                                        </div>

                                        <div>
                                            <label class="text-gray-700 mb-2 block text-sm font-medium">Gambar
                                                Layanan</label>
                                            <input type="file" name="image" accept="image/*" x-ref="fileInput"
                                                @change="handleFile($event)"
                                                class="border-gray-200 file:bg-blue-600 file:text-white hover:file:bg-blue-700 focus:border-blue-500 focus:ring-blue-200 w-full cursor-pointer rounded-lg border px-4 py-0.5 text-sm transition file:mr-4 file:rounded-md file:border-0 file:px-4 file:py-2 file:text-sm file:font-medium focus:ring">
                                            <p class="text-gray-500 mt-1 text-xs">Kosongkan jika tidak ingin mengganti
                                                layanan.</p>
                                            <x-input-error for="image" class="mt-2"></x-input-error>

                                            <!-- Preview Gambar Baru -->
                                            <div class="mt-4" x-show="image">
                                                <div class="group relative w-40">
                                                    <img :src="image.url"
                                                        class="border-gray-100 h-28 w-full rounded-lg border object-cover shadow-sm">
                                                    <button type="button" @click="removeImage()"
                                                        class="bg-white border-gray-300 text-gray-700 hover:bg-red-500 hover:text-white absolute -right-2 -top-2 rounded-full border p-1 text-xs transition">
                                                        <i class="fas fa-close"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Gambar Lama -->
                                            @if ($service->image)
                                                <div class="mt-4" x-show="!image">
                                                    <label class="text-gray-700 mb-2 block text-sm font-medium">Gambar
                                                        Saat Ini</label>
                                                    <div class="relative w-40">
                                                        <img src="{{ asset('storage/' . $service->image) }}"
                                                            class="border-gray-200 h-28 w-full rounded-lg border object-cover shadow-sm">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mt-6 flex justify-end space-x-3">
                                        <button type="button"
                                            @click="$dispatch('close-modal', 'edit-service-{{ $service->id }}')"
                                            class="border-gray-300 bg-white text-gray-700 rounded-lg border px-4 py-2 text-sm">Batal</button>
                                        <button type="submit"
                                            class="bg-blue-600 text-white rounded-lg px-4 py-2 text-sm">
                                            <i class="fas fa-check mr-2"></i> Simpan
                                        </button>
                                    </div>
                                </form>
                            </x-app.modal>
                        @endforeach
                    </div>

                    <!-- Create Modal -->
                    <x-app.modal name="create-service" title="Tambah Layanan" max-width="2xl">
                        <form action="{{ route('admin.services.store') }}" method="POST"
                            enctype="multipart/form-data" x-data="{
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
                            @reset-image.window="image = null; file = null">
                            @csrf

                            <div class="space-y-4">
                                <div>
                                    <label class="text-gray-700 mb-2 block text-sm font-medium">Nama Layanan *</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                                        required>
                                    <x-input-error for="name" class="mt-2"></x-input-error>
                                </div>

                                <div>
                                    <label class="text-gray-700 mb-2 block text-sm font-medium">Deskripsi *</label>
                                    <div class="border-gray-200 focus-within:ring-blue-200 overflow-hidden rounded-lg border focus-within:ring"
                                        x-data x-init="const quill = new Quill($refs.quillEditor, { theme: 'snow' });
                                        quill.on('text-change', function() {
                                            $refs.hiddenContent.value = quill.root.innerHTML;
                                        });">
                                        <div x-ref="quillEditor" class="min-h-40">{!! old('description') !!}</div>
                                        <input type="hidden" name="description" x-ref="hiddenContent"
                                            value="{{ old('description') }}">
                                    </div>
                                    <x-input-error for="description" class="mt-2"></x-input-error>
                                </div>

                                <div>
                                    <label class="text-gray-700 mb-2 block text-sm font-medium">Harga *</label>
                                    <input type="number" name="price" value="{{ old('price') }}" min="0"
                                        class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                                        required>
                                    <x-input-error for="price" class="mt-2"></x-input-error>
                                </div>

                                <div>
                                    <label class="text-gray-700 mb-2 block text-sm font-medium">Gambar Layanan
                                        *</label>
                                    <input type="file" name="image" accept="image/*" x-ref="fileInput"
                                        @change="handleFile($event)"
                                        class="border-gray-200 file:bg-blue-600 file:text-white hover:file:bg-blue-700 focus:border-blue-500 focus:ring-blue-200 w-full cursor-pointer rounded-lg border px-4 py-0.5 text-sm transition file:mr-4 file:rounded-md file:border-0 file:px-4 file:py-2 file:text-sm file:font-medium focus:ring"
                                        required>
                                    <p class="text-gray-500 mt-1 text-xs">Masukkan gambar untuk layanan.
                                    </p>
                                    <x-input-error for="image" class="mt-2"></x-input-error>

                                    <!-- Preview -->
                                    <div class="mt-4" x-show="image">
                                        <div class="group relative w-40">
                                            <img :src="image.url"
                                                class="border-gray-100 h-28 w-full rounded-lg border object-cover shadow-sm">
                                            <button type="button" @click="removeImage()"
                                                class="bg-white border-gray-300 text-gray-700 hover:bg-red-500 hover:text-white absolute -right-2 -top-2 rounded-full border p-1 text-xs transition">
                                                <i class="fas fa-close"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end space-x-3">
                                <button type="button" @click="$dispatch('close-modal', 'create-service')"
                                    class="border-gray-300 bg-white text-gray-700 rounded-lg border px-4 py-2 text-sm">Batal</button>
                                <button type="submit" class="bg-blue-600 text-white rounded-lg px-4 py-2 text-sm">
                                    <i class="fas fa-plus mr-2"></i> Tambah
                                </button>
                            </div>
                        </form>
                    </x-app.modal>

                    <div class="mt-6">{{ $services->links() }}</div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @endpush

    @push('scripts')
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    @endpush

    @if ($errors->any())
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.dispatchEvent(new CustomEvent('open-modal', {
                        detail: 'edit-about-excellence'
                    }));
                });
            </script>
        @endpush
    @endif
</x-app-layout>
