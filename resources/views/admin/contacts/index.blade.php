<x-app-layout>
  <x-slot name="header">{{ __('Informasi Kontak') }}</x-slot>

  <div class="[&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 flex flex-1 flex-col overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2">
    <div class="flex flex-1 flex-col lg:flex-row">
      <div class="border-gray-200 flex min-w-0 flex-1 flex-col border-e">
        <div class="bg-white border-gray-200 flex flex-col p-4">

          <!-- Header -->
          <div class="border-gray-200 flex items-center justify-between border-b border-dashed pb-2 mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Kelola Kontak</h3>
            <button @click="$dispatch('open-modal', 'create-contact')" type="button"
              class="bg-blue-600 text-white hover:bg-blue-700 rounded-lg px-4 py-2 text-sm font-medium">
              <i class="fas fa-plus mr-2"></i> Tambah Kontak
            </button>
          </div>

          <!-- Contact List -->
          <div class="space-y-3">
            @foreach ($contacts as $contact)
            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
              <div class="flex items-start justify-between">
                <div class="flex-1">
                  <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                      <i class="fas fa-{{ $contact->label == 'Email' ? 'envelope' : ($contact->label == 'Phone' || $contact->label == 'WhatsApp' ? 'phone' : 'link') }} text-blue-600"></i>
                    </div>
                    <div>
                      <h4 class="font-semibold text-gray-900">{{ $contact->label }}</h4>
                      <p class="text-sm text-gray-600">{{ $contact->value }}</p>
                    </div>
                  </div>

                  @if($contact->url)
                  <a href="{{ $contact->url }}" target="_blank" 
                    class="text-xs text-blue-600 hover:underline flex items-center gap-1 mt-2">
                    <i class="fas fa-external-link-alt"></i>
                    {{ Str::limit($contact->url, 50) }}
                  </a>
                  @endif
                </div>

                <div class="flex gap-2 ml-4">
                  <button @click="$dispatch('open-modal', 'edit-contact-{{ $contact->id }}')" type="button"
                    class="text-blue-600 hover:bg-blue-50 border border-blue-200 rounded-lg px-3 py-1.5 text-xs">
                    <i class="fas fa-edit"></i> Edit
                  </button>
                  <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus kontak ini?')"
                      class="text-red-600 hover:bg-red-50 border border-red-200 rounded-lg px-3 py-1.5 text-xs">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                  </form>
                </div>
              </div>
            </div>

            <!-- Edit Modal -->
            <x-app.modal name="edit-contact-{{ $contact->id }}" title="Edit Kontak" max-width="2xl">
              <form action="{{ route('admin.contacts.update', $contact) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Label *</label>
                    <input type="text" name="label" value="{{ $contact->label }}"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm" 
                      placeholder="Contoh: WhatsApp, Email, Instagram" required>
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">Value *</label>
                    <input type="text" name="value" value="{{ $contact->value }}"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      placeholder="Contoh: 0812-3456-7890" required>
                  </div>

                  <div>
                    <label class="text-gray-700 mb-2 block text-sm font-medium">URL/Link</label>
                    <input type="url" name="url" value="{{ $contact->url }}"
                      class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                      placeholder="https://wa.me/628123456789">
                    <p class="text-xs text-gray-500 mt-1">Opsional, untuk link clickable</p>
                  </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                  <button type="button" @click="$dispatch('close-modal', 'edit-contact-{{ $contact->id }}')"
                    class="border-gray-300 bg-white text-gray-700 rounded-lg border px-4 py-2 text-sm">Batal</button>
                  <button type="submit" class="bg-blue-600 text-white rounded-lg px-4 py-2 text-sm">
                    <i class="fas fa-check mr-2"></i> Simpan
                  </button>
                </div>
              </form>
            </x-app.modal>
            @endforeach
          </div>

          <!-- Create Modal -->
          <x-app.modal name="create-contact" title="Tambah Kontak" max-width="2xl">
            <form action="{{ route('admin.contacts.store') }}" method="POST">
              @csrf

              <div class="space-y-4">
                <div>
                  <label class="text-gray-700 mb-2 block text-sm font-medium">Label *</label>
                  <input type="text" name="label" value="{{ old('label') }}"
                    class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                    placeholder="Contoh: WhatsApp, Email, Instagram" required>
                </div>

                <div>
                  <label class="text-gray-700 mb-2 block text-sm font-medium">Value *</label>
                  <input type="text" name="value" value="{{ old('value') }}"
                    class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                    placeholder="Contoh: 0812-3456-7890" required>
                </div>

                <div>
                  <label class="text-gray-700 mb-2 block text-sm font-medium">URL/Link</label>
                  <input type="url" name="url" value="{{ old('url') }}"
                    class="border-gray-300 focus:border-blue-500 w-full rounded-lg border px-4 py-2.5 text-sm"
                    placeholder="https://wa.me/628123456789">
                  <p class="text-xs text-gray-500 mt-1">Opsional, untuk link clickable</p>
                </div>
              </div>

              <div class="mt-6 flex justify-end space-x-3">
                <button type="button" @click="$dispatch('close-modal', 'create-contact')"
                  class="border-gray-300 bg-white text-gray-700 rounded-lg border px-4 py-2 text-sm">Batal</button>
                <button type="submit" class="bg-blue-600 text-white rounded-lg px-4 py-2 text-sm">
                  <i class="fas fa-plus mr-2"></i> Tambah
                </button>
              </div>
            </form>
          </x-app.modal>

          <div class="mt-6">{{ $contacts->links() }}</div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>