@extends('layouts.guest')

<div class="container mx-auto px-4 py-8">
    <div class="max-w-6xl mx-auto">
        <!-- Trip Header -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Image Carousel -->
            @if($trip->mountain->mountainImages->count() > 0)
            <div class="relative h-96 bg-gray-200">
                <div class="carousel-container h-full">
                    @foreach($trip->mountain->mountainImages as $index => $image)
                    <img src="{{ asset('storage/' . $image->image_path) }}" 
                         alt="{{ $trip->mountain->name }}" 
                         class="absolute inset-0 w-full h-full object-cover {{ $index === 0 ? 'block' : 'hidden' }}" 
                         data-slide="{{ $index }}">
                    @endforeach
                </div>
                
                @if($trip->mountain->mountainImages->count() > 1)
                <!-- Navigation buttons -->
                <button onclick="previousSlide()" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full">
                    ←
                </button>
                <button onclick="nextSlide()" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full">
                    →
                </button>
                
                <!-- Dots indicator -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                    @foreach($trip->mountain->mountainImages as $index => $image)
                    <button onclick="currentSlide({{ $index }})" class="w-3 h-3 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-gray-400' }}" data-dot="{{ $index }}">
                    </button>
                    @endforeach
                </div>
                @endif
            </div>
            @endif

            <!-- Trip Info -->
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">{{ $trip->title }}</h1>
                        <p class="text-lg text-gray-600">{{ $trip->mountain->name }} - {{ $trip->mountain->region }}</p>
                        <p class="text-sm text-gray-500">{{ number_format($trip->mountain->mdpl) }} MDPL</p>
                    </div>
                    <div class="text-right">
                        <span class="text-3xl font-bold text-blue-600">Rp {{ number_format($trip->price, 0, ',', '.') }}</span>
                        <p class="text-sm text-gray-500">per person</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-semibold text-gray-900">Duration</h3>
                        <p class="text-gray-600">{{ $trip->duration }} days</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-semibold text-gray-900">Capacity</h3>
                        <p class="text-gray-600">{{ $trip->capacity }} people</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-semibold text-gray-900">Type</h3>
                        <p class="text-gray-600">{{ ucfirst(str_replace('_', ' ', $trip->type)) }}</p>
                    </div>
                </div>

                @if($trip->departure_date)
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                    <h3 class="font-semibold text-yellow-800">Departure Date</h3>
                    <p class="text-yellow-700">{{ $trip->departure_date->format('l, F j, Y') }}</p>
                </div>
                @endif

                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-3">Meeting Point</h2>
                    <p class="text-gray-600">{{ $trip->mountain->meeting_point }}</p>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-3">Description</h2>
                    <p class="text-gray-600">{{ $trip->mountain->description }}</p>
                </div>

                @if($trip->includes)
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-3">What's Included</h2>
                    <ul class="list-disc list-inside text-gray-600">
                        @foreach($trip->includes as $include)
                        <li>{{ $include }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if($trip->excludes)
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-3">What's Not Included</h2>
                    <ul class="list-disc list-inside text-gray-600">
                        @foreach($trip->excludes as $exclude)
                        <li>{{ $exclude }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>

        <!-- Booking Form -->
        <div class="mt-8 bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Book This Trip</h2>
            
            <form action="{{ route('trips.book') }}" method="POST" id="bookingForm">
                @csrf
                <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Contact Information -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Contact Information</h3>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input type="text" name="contact_name" required 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" name="contact_phone" required 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Number of People</label>
                            <input type="number" name="pax_count" min="1" max="{{ $trip->capacity }}" required 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   onchange="calculateTotal()">
                        </div>
                        
                        @if($trip->type === 'open_trip' && $trip->departure_date)
                        <input type="hidden" name="departure_date" value="{{ $trip->departure_date->format('Y-m-d') }}">
                        @elseif($trip->type === 'private_trip')
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Departure Date</label>
                            <input type="date" name="departure_date" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        @endif
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Special Notes (Optional)</label>
                            <textarea name="notes" rows="3" 
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>
                    </div>

                    <!-- Equipment & Services -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Additional Equipment & Services</h3>
                        
                        <!-- Equipment -->
                        @if($equipment->count() > 0)
                        <div class="mb-6">
                            <h4 class="text-md font-medium text-gray-700 mb-3">Rental Equipment</h4>
                            @foreach($equipment as $item)
                            <div class="flex items-center justify-between p-3 border rounded-lg mb-2">
                                <div class="flex-1">
                                    <h5 class="font-medium">{{ $item->name }}</h5>
                                    <p class="text-sm text-gray-600">{{ $item->description }}</p>
                                    <p class="text-sm font-semibold text-blue-600">Rp {{ number_format($item->rental_price_per_day, 0, ',', '.') }}/day</p>
                                    <p class="text-xs text-gray-500">Stock: {{ $item->stock_quantity }}</p>
                                </div>
                                <div class="ml-4">
                                    <input type="number" name="equipment[{{ $loop->index }}][quantity]" min="0" max="{{ $item->stock_quantity }}" value="0"
                                           class="w-16 px-2 py-1 border border-gray-300 rounded text-center equipment-quantity"
                                           data-price="{{ $item->rental_price_per_day }}" data-duration="{{ $trip->duration }}"
                                           onchange="calculateTotal()">
                                    <input type="hidden" name="equipment[{{ $loop->index }}][id]" value="{{ $item->id }}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif

                        <!-- Services -->
                        @if($services->count() > 0)
                        <div class="mb-6">
                            <h4 class="text-md font-medium text-gray-700 mb-3">Additional Services</h4>
                            @foreach($services as $service)
                            <div class="flex items-center justify-between p-3 border rounded-lg mb-2">
                                <div class="flex-1">
                                    <h5 class="font-medium">{{ ucfirst($service->name) }}</h5>
                                    <p class="text-sm text-gray-600">{{ $service->description }}</p>
                                    <p class="text-sm font-semibold text-green-600">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                                </div>
                                <div class="ml-4">
                                    <input type="number" name="services[{{ $loop->index }}][quantity]" min="0" value="0"
                                           class="w-16 px-2 py-1 border border-gray-300 rounded text-center service-quantity"
                                           data-price="{{ $service->price }}" onchange="calculateTotal()">
                                    <input type="hidden" name="services[{{ $loop->index }}][id]" value="{{ $service->id }}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif

                        <!-- Total Calculation -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span>Trip Cost:</span>
                                    <span id="tripCost">Rp 0</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Equipment:</span>
                                    <span id="equipmentCost">Rp 0</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Services:</span>
                                    <span id="servicesCost">Rp 0</span>
                                </div>
                                <div class="border-t pt-2">
                                    <div class="flex justify-between font-bold text-lg">
                                        <span>Total:</span>
                                        <span id="totalCost">Rp 0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg text-lg">
                        Book Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let currentSlideIndex = 0;
const slides = document.querySelectorAll('[data-slide]');
const dots = document.querySelectorAll('[data-dot]');

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.toggle('hidden', i !== index);
    });
    
    dots.forEach((dot, i) => {
        if (i === index) {
            dot.classList.remove('bg-gray-400');
            dot.classList.add('bg-white');
        } else {
            dot.classList.remove('bg-white');
            dot.classList.add('bg-gray-400');
        }
    });
    
    currentSlideIndex = index;
}

function nextSlide() {
    const nextIndex = (currentSlideIndex + 1) % slides.length;
    showSlide(nextIndex);
}

function previousSlide() {
    const prevIndex = (currentSlideIndex - 1 + slides.length) % slides.length;
    showSlide(prevIndex);
}

function currentSlide(index) {
    showSlide(index);
}

function calculateTotal() {
    const paxCount = parseInt(document.querySelector('input[name="pax_count"]').value) || 0;
    const tripPrice = {{ $trip->price }};
    const duration = {{ $trip->duration }};
    
    // Trip cost
    const tripCost = tripPrice * paxCount;
    
    // Equipment cost
    let equipmentCost = 0;
    document.querySelectorAll('.equipment-quantity').forEach(input => {
        const quantity = parseInt(input.value) || 0;
        const pricePerDay = parseFloat(input.dataset.price);
        equipmentCost += quantity * pricePerDay * duration;
    });
    
    // Services cost
    let servicesCost = 0;
    document.querySelectorAll('.service-quantity').forEach(input => {
        const quantity = parseInt(input.value) || 0;
        const price = parseFloat(input.dataset.price);
        servicesCost += quantity * price;
    });
    
    const totalCost = tripCost + equipmentCost + servicesCost;
    
    // Update display
    document.getElementById('tripCost').textContent = 'Rp ' + tripCost.toLocaleString('id-ID');
    document.getElementById('equipmentCost').textContent = 'Rp ' + equipmentCost.toLocaleString('id-ID');
    document.getElementById('servicesCost').textContent = 'Rp ' + servicesCost.toLocaleString('id-ID');
    document.getElementById('totalCost').textContent = 'Rp ' + totalCost.toLocaleString('id-ID');
}

// Auto-advance slides every 5 seconds
setInterval(nextSlide, 5000);

// Initial calculation
calculateTotal();
</script>