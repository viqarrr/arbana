<x-app-layout>
    <x-slot name="header">{{ __('Tentang Kami - Keunggulan') }}</x-slot>

    <div
        class="[&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 flex flex-1 flex-col overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2">
        <div class="flex flex-1 flex-col lg:flex-row">
            <div class="flex min-w-0 flex-1 flex-col">
                <div class="bg-white flex flex-col p-4">

                    <div class="bg-white overflow-hidden rounded-lg">
                        <div class="bg-white border-gray-200 flex flex-col border-b pb-4 last:border-b-0 last:pb-0">
                            <div class="flex flex-col gap-5 pt-4 md:flex-row">
                                <div class="aspect-4/2 md:aspect-4/3 bg-gray-100 relative w-full rounded-lg md:max-w-80">
                                    <img class="absolute inset-0 size-full rounded-lg object-cover object-center"
                                        src="{{ asset('storage/' . $aboutExcellence->image) }}" alt="Post Image">
                                </div>

                                <div class="grow">
                                    <div class="flex h-full flex-col">
                                        <div>
                                            <p class="text-gray-500 text-sm">
                                                Headline:
                                            </p>
                                            <h3 class="text-gray-800 font-medium">
                                                {{ $aboutExcellence->heading }}
                                            </h3>
                                        </div>
                                        <div class="mt-4">
                                            <p class="text-gray-500 text-sm">
                                                Konten:
                                            </p>
                                            <h3 class="text-gray-700 prose prose-sm max-w-none">
                                                {!! $aboutExcellence->paragraph !!}
                                            </h3>
                                        </div>

                                        <div class="border-gray-200 mt-4 border-t pt-4 xl:mt-auto">
                                            <div class="flex flex-wrap items-center justify-end gap-2">
                                                <button type="button"
                                                    @click="$dispatch('open-modal', 'edit-about-excellence')"
                                                    class="text-blue-700 bg-blue-50 border-blue-200 hover:bg-blue-100 inline-flex items-center justify-center rounded-lg border px-3 py-2 text-sm font-medium">
                                                    <i class="fa-solid fa-pen-to-square mr-1.5"></i>
                                                    Edit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <x-app.modal name="edit-about-excellence" title="Edit Keunggulan" max-width="4xl">
                        <form action="{{ route('admin.excellence.update', $aboutExcellence) }}"
                            enctype="multipart/form-data" method="POST" x-data="{
                                image: null,
                                handleFile(event) {
                                    const file = event.target.files[0];
                                    if (file) this.image = { url: URL.createObjectURL(file), name: file.name };
                                },
                                removeImage() {
                                    this.image = null;
                                    $refs.fileInput.value = null;
                                }
                            }">
                            @csrf
                            @method('PUT')

                            <div class="space-y-6">
                                <div>
                                    <label class="text-gray-700 mb-2 block text-sm font-medium">Judul *</label>
                                    <input type="text" name="heading"
                                        value="{{ old('heading', $aboutExcellence->heading) }}"
                                        class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                                        required>
                                    <x-input-error for="heading" class="mt-2"></x-input-error>
                                </div>

                                <div>
                                    <label class="text-gray-700 mb-2 block text-sm font-medium">Konten *</label>
                                    <div class="border-gray-200 focus-within:ring-blue-200 overflow-hidden rounded-lg border focus-within:ring"
                                        x-data x-init="const quill = new Quill($refs.quillEditor, { theme: 'snow' });
                                        quill.on('text-change', function() {
                                            $refs.hiddenContent.value = quill.root.innerHTML;
                                        });">
                                        <div x-ref="quillEditor" class="min-h-40">{!! old('paragraph', $aboutExcellence->paragraph) !!}</div>
                                        <input type="hidden" name="paragraph" x-ref="hiddenContent"
                                            value="{{ old('paragraph', $aboutExcellence->paragraph) }}">
                                    </div>
                                    <x-input-error for="paragraph" class="mt-2"></x-input-error>
                                </div>

                                <div>
                                    <label class="text-gray-700 mb-2 block text-sm font-medium">Gambar</label>
                                    <input type="file" name="image" accept="image/*" x-ref="fileInput"
                                        @change="handleFile($event)"
                                        class="border-gray-200 file:bg-blue-600 file:text-white w-full rounded-lg border px-4 py-0.5 text-sm file:rounded-lg">
                                    <p class="text-gray-500 mt-1 text-xs">Kosongkan jika tidak ingin mengganti gambar.
                                    </p>
                                    <x-input-error for="image" class="mt-2"></x-input-error>

                                    <div class="mt-4" x-show="image">
                                        <div class="relative w-40">
                                            <img :src="image.url"
                                                class="h-28 w-full rounded-lg border object-cover">
                                            <button type="button" @click="removeImage()"
                                                class="bg-white hover:bg-red-500 hover:text-white absolute -right-2 -top-2 rounded-full border p-1 text-xs">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>

                                    @if ($aboutExcellence->image)
                                        <div class="mt-4" x-show="!image">
                                            <label class="text-gray-700 mb-2 block text-sm font-medium">Gambar Saat
                                                Ini</label>
                                            <img src="{{ asset('storage/' . $aboutExcellence->image) }}"
                                                class="h-28 w-40 rounded-lg border object-cover">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end space-x-3">
                                <button type="button" @click="$dispatch('close-modal', 'edit-about-excellence')"
                                    class="border-gray-300 bg-white text-gray-700 rounded-lg border px-4 py-2 text-sm">Batal</button>
                                <button type="submit" class="bg-blue-600 text-white rounded-lg px-4 py-2 text-sm">
                                    <i class="fas fa-check mr-2"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </x-app.modal>

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
