<x-app-layout>
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

  <div class="bg-white mb-4 rounded px-8 pb-8 pt-6 shadow-md">
    <form
      action="{{ route('admin.trips.store') }}"
      method="POST"
      enctype="multipart/form-data"
      id="tripForm"
    >
      @csrf

      <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <div>
          <div class="mb-4">
            <label
              class="text-gray-700 mb-2 block text-sm font-bold"
              for="mountain_id"
            >
              Mountain
            </label>
            <select
              class="text-gray-700 focus:shadow-outline @error('mountain_id') border-red-500 @enderror w-full rounded border px-3 py-2 shadow focus:outline-none"
              id="mountain_id"
              name="mountain_id"
              required
            >
              <option value="">Select Mountain</option>
              @foreach ($mountains as $mountain)
                <option
                  value="{{ $mountain->id }}"
                  {{ old('mountain_id') == $mountain->id ? 'selected' : '' }}
                >
                  {{ $mountain->name }} - {{ $mountain->region }}
                </option>
              @endforeach
            </select>
            @error('mountain_id')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-4">
            <label
              class="text-gray-700 mb-2 block text-sm font-bold"
              for="type"
            >
              Trip Type
            </label>
            <select
              class="text-gray-700 focus:shadow-outline @error('type') border-red-500 @enderror w-full rounded border px-3 py-2 shadow focus:outline-none"
              id="type"
              name="type"
              required
              onchange="toggleTripTypeFields()"
            >
              <option value="">Select Type</option>
              <option
                value="open_trip"
                {{ old('type') == 'open_trip' ? 'selected' : '' }}
              >Open Trip</option>
              <option
                value="private_trip"
                {{ old('type') == 'private_trip' ? 'selected' : '' }}
              >Private Trip</option>
              <option
                value="campground"
                {{ old('type') == 'campground' ? 'selected' : '' }}
              >Campground</option>
            </select>
            @error('type')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-4">
            <label
              class="text-gray-700 mb-2 block text-sm font-bold"
              for="title"
            >
              Trip Title
            </label>
            <input
              class="text-gray-700 focus:shadow-outline @error('title') border-red-500 @enderror w-full appearance-none rounded border px-3 py-2 leading-tight shadow focus:outline-none"
              id="title"
              name="title"
              type="text"
              value="{{ old('title') }}"
              required
            >
            @error('title')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-4">
            <label
              class="text-gray-700 mb-2 block text-sm font-bold"
              for="duration"
            >
              Duration (days)
            </label>
            <input
              class="text-gray-700 focus:shadow-outline @error('duration') border-red-500 @enderror w-full appearance-none rounded border px-3 py-2 leading-tight shadow focus:outline-none"
              id="duration"
              name="duration"
              type="number"
              min="1"
              value="{{ old('duration') }}"
              required
            >
            @error('duration')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-4">
            <label
              class="text-gray-700 mb-2 block text-sm font-bold"
              for="price"
            >
              Price (per person)
            </label>
            <input
              class="text-gray-700 focus:shadow-outline @error('price') border-red-500 @enderror w-full appearance-none rounded border px-3 py-2 leading-tight shadow focus:outline-none"
              id="price"
              name="price"
              type="number"
              step="0.01"
              value="{{ old('price') }}"
              required
            >
            @error('price')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <!-- Package Type (for Private Trip/Campground) -->
          <div
            class="mb-4"
            id="packageTypeField"
            style="display: none;"
          >
            <label
              class="text-gray-700 mb-2 block text-sm font-bold"
              for="package_type"
            >
              Package Type
            </label>
            <select
              class="text-gray-700 focus:shadow-outline @error('package_type') border-red-500 @enderror w-full rounded border px-3 py-2 shadow focus:outline-none"
              id="package_type"
              name="package_type"
            >
              <option value="">Select Package</option>
              <option
                value="basic"
                {{ old('package_type') == 'basic' ? 'selected' : '' }}
              >Basic</option>
              <option
                value="regular"
                {{ old('package_type') == 'regular' ? 'selected' : '' }}
              >Regular</option>
              <option
                value="premium"
                {{ old('package_type') == 'premium' ? 'selected' : '' }}
              >Premium</option>
            </select>
            @error('package_type')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-4">
            <label
              class="text-gray-700 mb-2 block text-sm font-bold"
              for="capacity"
            >
              Capacity (max people)
            </label>
            <input
              class="text-gray-700 focus:shadow-outline @error('capacity') border-red-500 @enderror w-full appearance-none rounded border px-3 py-2 leading-tight shadow focus:outline-none"
              id="capacity"
              name="capacity"
              type="number"
              min="1"
              value="{{ old('capacity') }}"
              required
            >
            @error('capacity')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <!-- Departure Date Field -->
          <div
            class="mb-4"
            id="departureDateField"
          >
            <label
              class="text-gray-700 mb-2 block text-sm font-bold"
              for="departure_date"
            >
              Departure Date
            </label>
            <input
              class="text-gray-700 focus:shadow-outline @error('departure_date') border-red-500 @enderror w-full appearance-none rounded border px-3 py-2 leading-tight shadow focus:outline-none"
              id="departure_date"
              name="departure_date"
              type="date"
              value="{{ old('departure_date') }}"
            >
            <p
              class="text-gray-500 mt-1 text-xs"
              id="departureDateNote"
            ></p>
            @error('departure_date')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-4">
            <label
              class="text-gray-700 mb-2 block text-sm font-bold"
              for="status"
            >
              Status
            </label>
            <select
              class="text-gray-700 focus:shadow-outline @error('status') border-red-500 @enderror w-full rounded border px-3 py-2 shadow focus:outline-none"
              id="status"
              name="status"
              required
            >
              <option
                value="draft"
                {{ old('status') == 'draft' ? 'selected' : '' }}
              >Draft</option>
              <option
                value="published"
                {{ old('status') == 'published' ? 'selected' : '' }}
              >Published</option>
            </select>
            @error('status')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-6">
            <label
              class="text-gray-700 mb-2 block text-sm font-bold"
              for="featured_image"
            >
              Featured Image
            </label>
            <input
              class="text-gray-700 focus:shadow-outline @error('featured_image') border-red-500 @enderror w-full appearance-none rounded border px-3 py-2 leading-tight shadow focus:outline-none"
              id="featured_image"
              name="featured_image"
              type="file"
              accept="image/*"
            >
            @error('featured_image')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div>
          <!-- Rich Text Editor Fields -->
          <div class="mb-6">
            <label
              class="text-gray-700 mb-2 block text-sm font-bold"
              for="includes"
            >
              What's Included
            </label>
            <textarea
              class="@error('includes') border-red-500 @enderror w-full"
              id="includes"
              name="includes"
              rows="8"
            >{{ old('includes') }}</textarea>
            @error('includes')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-6">
            <label
              class="text-gray-700 mb-2 block text-sm font-bold"
              for="excludes"
            >
              What's Not Included
            </label>
            <textarea
              class="@error('excludes') border-red-500 @enderror w-full"
              id="excludes"
              name="excludes"
              rows="8"
            >{{ old('excludes') }}</textarea>
            @error('excludes')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </div>

      <div class="flex items-center justify-between">
        <button
          class="bg-blue-500 hover:bg-blue-700 text-white focus:shadow-outline rounded px-4 py-2 font-bold focus:outline-none"
          type="submit"
        >
          Create Trip
        </button>
        <a
          class="text-blue-500 hover:text-blue-800 inline-block align-baseline text-sm font-bold"
          href="{{ route('admin.trips.index') }}"
        >
          Back to List
        </a>
      </div>
    </form>
  </div>

  <script>
    // Initialize CKEditor
    CKEDITOR.replace('includes');
    CKEDITOR.replace('excludes');

    function toggleTripTypeFields() {
      const tripType = document.getElementById('type').value;
      const packageTypeField = document.getElementById('packageTypeField');
      const departureDateField = document.getElementById('departureDateField');
      const departureDateInput = document.getElementById('departure_date');
      const departureDateNote = document.getElementById('departureDateNote');

      if (tripType === 'open_trip') {
        packageTypeField.style.display = 'none';
        departureDateInput.required = true;
        departureDateNote.textContent = 'Required for open trips. Must be a future date.';
      } else if (tripType === 'private_trip' || tripType === 'campground') {
        packageTypeField.style.display = 'block';
        departureDateInput.required = false;
        departureDateNote.textContent =
        'Optional. If set, must be on a weekend (Friday-Sunday) and in an available week.';
      } else {
        packageTypeField.style.display = 'none';
        departureDateInput.required = false;
        departureDateNote.textContent = '';
      }
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
      toggleTripTypeFields();
    });
  </script>
</x-app-layout>
