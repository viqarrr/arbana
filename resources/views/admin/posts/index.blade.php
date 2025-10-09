<x-app-layout>
  <x-slot name="header">{{ __('Artikel & Berita') }}</x-slot>

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
                id="search-post"
                class="border-gray-200 focus:border-blue-500 block w-64 rounded-lg px-3 py-2 ps-11 text-sm"
                placeholder="Cari artikel..."
              >
              <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-4">
                <i class="fas fa-search text-gray-400 text-sm"></i>
              </div>
            </div>

            <button
              @click="$dispatch('open-modal', 'create-post')"
              type="button"
              class="bg-blue-600 text-white hover:bg-blue-700 rounded-lg px-4 py-2 text-sm font-medium"
            >
              <i class="fas fa-plus mr-2"></i> Tambah Artikel
            </button>
          </div>

          <!-- Data Loop -->
          @foreach ($posts as $post)
            <div class="bg-white border-gray-200 flex flex-col border-b pb-4 pt-4 last:border-b-0">
              <div class="flex flex-col gap-5 md:flex-row">
                <div class="bg-gray-100 relative h-48 w-full rounded-lg md:max-w-80">
                  @if ($post->image)
                    <img
                      class="absolute inset-0 size-full rounded-lg object-cover"
                      src="{{ asset('storage/' . $post->image) }}"
                      alt="{{ $post->title }}"
                    >
                  @else
                    <div class="absolute inset-0 flex items-center justify-center">
                      <i class="fas fa-newspaper text-gray-300 text-5xl"></i>
                    </div>
                  @endif
                </div>

                <div class="grow">
                  <div class="flex h-full flex-col">
                    <div class="mb-3">
                      <h3 class="text-gray-900 text-lg font-semibold">{{ $post->title }}</h3>
                      <p class="text-gray-500 mt-1 text-sm">
                        <i class="fas fa-calendar mr-1"></i>
                        {{ $post->created_at->format('d M Y') }}
                      </p>
                    </div>

                    <div class="text-gray-700 prose prose-sm mb-4 line-clamp-3 max-w-none">
                      {!! $post->content !!}
                    </div>

                    <div class="border-gray-200 border-t pt-3 xl:mt-auto">
                      <div class="flex flex-wrap items-center justify-between gap-2">
                        <div class="text-gray-500 text-xs">
                          Slug: <span class="bg-gray-100 rounded px-2 py-1 font-mono">{{ $post->slug }}</span>
                        </div>

                        <div class="flex gap-2">
                          <button
                            type="button"
                            @click="$dispatch('open-modal', 'show-post-{{ $post->id }}')"
                            class="border-transparent text-gray-600 hover:bg-gray-100 flex items-center gap-x-1.5 rounded-lg border px-2.5 py-1.5 text-[13px]"
                          >
                            <i class="fas fa-eye"></i> Lihat
                          </button>

                          <button
                            type="button"
                            @click="$dispatch('open-modal', 'edit-post-{{ $post->id }}')"
                            class="border-transparent text-blue-500 hover:bg-blue-100 flex items-center gap-x-1.5 rounded-lg border px-2.5 py-1.5 text-[13px]"
                          >
                            <i class="fas fa-edit"></i> Edit
                          </button>

                          <form
                            action="{{ route('admin.posts.destroy', $post) }}"
                            method="POST"
                            onsubmit="return confirm('Hapus artikel ini?')"
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
            </div>

            <!-- Show Modal -->
            <x-app.modal
              name="show-post-{{ $post->id }}"
              title="Detail Artikel"
              max-width="4xl"
            >
              <div class="space-y-6">
                @if ($post->image)
                  <img
                    src="{{ asset('storage/' . $post->image) }}"
                    class="h-64 w-full rounded-lg border object-cover"
                  >
                @endif

                <div>
                  <h2 class="text-gray-900 mb-2 text-2xl font-bold">{{ $post->title }}</h2>
                  <p class="text-gray-500 text-sm">
                    <i class="fas fa-calendar mr-1"></i>
                    {{ $post->created_at->format('d M Y, H:i') }}
                  </p>
                </div>

                <div class="text-gray-700 prose prose-sm max-w-none">
                  {!! $post->content !!}
                </div>
              </div>

              <div class="mt-6 flex justify-end">
                <button
                  type="button"
                  @click="$dispatch('close-modal', 'show-post-{{ $post->id }}')"
                  class="border-gray-300 bg-white text-gray-700 rounded-lg border px-4 py-2 text-sm"
                >Tutup</button>
              </div>
            </x-app.modal>

            <!-- Edit Modal -->
            <x-app.modal
              name="edit-post-{{ $post->id }}"
              title="Edit Artikel"
              max-width="5xl"
            >
              <form
                action="{{ route('admin.posts.update', $post) }}"
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

                <div class="max-h-[70vh] space-y-6 overflow-y-auto pr-2">
                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Judul Artikel *</label>
                    <input
                      type="text"
                      name="title"
                      value="{{ old('title', $post->title) }}"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      required
                    >
                  </div>


                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Konten *</label>
                    <div
                      class="border-gray-200 focus-within:ring-blue-200 overflow-hidden rounded-lg border focus-within:ring"
                      x-data
                      x-init="const quill = new Quill($refs.quillEditor, { theme: 'snow' });
                      quill.on('text-change', () => $refs.hiddenContent.value = quill.root.innerHTML);"
                    >
                      <div x-ref="quillEditor" class="min-h-20">{!! old('content', $post->content) !!}</div>
                      <input
                        type="hidden"
                        name="content"
                        value="{{ old('content', $post->content) }}"
                        x-ref="hiddenContent"
                      >
                    </div>
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Gambar Artikel/Berita</label>
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
                    @if ($post->image)
                      <div
                        class="mt-4"
                        x-show="!image"
                      >
                        <label class="text-gray-700 mb-2 block text-sm font-medium">Gambar Saat Ini</label>
                        <div class="relative w-40">
                          <img
                            src="{{ asset('storage/' . $post->image) }}"
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
                    @click="$dispatch('close-modal', 'edit-post-{{ $post->id }}')"
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
            name="create-post"
            title="Tambah Artikel"
            max-width="5xl"
          >
            <form
              action="{{ route('admin.posts.store') }}"
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

              <div class="max-h-[70vh] space-y-6 overflow-y-auto pr-2">
                <div>
                  <label class="text-gray-700 mb-2 block text-sm font-medium">Judul Artikel *</label>
                  <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                    required
                  >
                </div>

                <div>
                  <label class="text-gray-700 mb-2 block text-sm font-medium">Konten *</label>
                  <div
                    class="border-gray-200 focus-within:ring-blue-200 overflow-hidden rounded-lg border focus-within:ring"
                    x-data
                    x-init="const quill = new Quill($refs.quillEditor, { theme: 'snow' });
                    quill.on('text-change', () => $refs.hiddenContent.value = quill.root.innerHTML);"
                  >
                    <div x-ref="quillEditor" class="min-h-20">{!! old('content') !!}</div>
                    <input
                      type="hidden"
                      name="content"
                      x-ref="hiddenContent"
                    >
                  </div>
                </div>

                <div>
                  <label class="text-gray-700 mb-2 block text-sm font-medium">Gambar Artikel/Berita *</label>
                  <input
                    type="file"
                    name="image"
                    accept="image/*"
                    x-ref="fileInput"
                    @change="handleFile($event)"
                    class="border-gray-200 file:bg-blue-600 file:text-white hover:file:bg-blue-700 focus:border-blue-500 focus:ring-blue-200 w-full cursor-pointer rounded-lg border px-4 py-0.5 text-sm transition file:mr-4 file:rounded-md file:border-0 file:px-4 file:py-2 file:text-sm file:font-medium focus:ring"
                    required
                  >
                  <p class="text-gray-500 mt-1 text-xs">Masukkan gambar untuk artikel/berita.
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
                  @click="$dispatch('close-modal', 'create-post')"
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

          <div class="mt-6">{{ $posts->links() }}</div>
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
