<x-app-layout>
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <form action="{{ route('admin.equipment.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Equipment Name
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" 
                   id="name" name="name" type="text" value="{{ old('name') }}" required>
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                Description
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror" 
                      id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="stock_quantity">
                Stock Quantity
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('stock_quantity') border-red-500 @enderror" 
                   id="stock_quantity" name="stock_quantity" type="number" value="{{ old('stock_quantity') }}" required>
            @error('stock_quantity')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- NEW TIERED PRICING FIELDS -->
        <div class="mb-6 p-4 bg-gray-50 rounded">
            <h3 class="text-lg font-semibold mb-4">Tiered Pricing</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="price_1day">
                        1 Day Price
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('price_1day') border-red-500 @enderror" 
                           id="price_1day" name="price_1day" type="number" step="0.01" value="{{ old('price_1day') }}" required>
                    @error('price_1day')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="price_2days">
                        2 Days Price
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('price_2days') border-red-500 @enderror" 
                           id="price_2days" name="price_2days" type="number" step="0.01" value="{{ old('price_2days') }}" required>
                    @error('price_2days')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="price_extra_per_day">
                        Extra Per Day (3+ days)
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('price_extra_per_day') border-red-500 @enderror" 
                           id="price_extra_per_day" name="price_extra_per_day" type="number" step="0.01" value="{{ old('price_extra_per_day') }}" required>
                    @error('price_extra_per_day')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mt-2 text-sm text-gray-600">
                <p><strong>Pricing Logic:</strong></p>
                <ul class="list-disc list-inside">
                    <li>1 day rental = 1 Day Price</li>
                    <li>2 days rental = 2 Days Price</li>
                    <li>3+ days rental = 2 Days Price + (extra days × Extra Per Day)</li>
                </ul>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                Equipment Image
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror" 
                   id="image" name="image" type="file" accept="image/*">
            @error('image')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Create Equipment
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('admin.equipment.index') }}">
                Back to List
            </a>
        </div>
    </form>
</div>
</x-app-layout>