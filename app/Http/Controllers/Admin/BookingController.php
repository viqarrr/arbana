<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\BookingRentalItem;
use App\Models\BookingService;
use App\Models\Equipment;
use App\Models\Service;
use App\Models\Trip;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function index(Request $request): View
    {
        $query = Booking::with(['trip', 'user']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $bookings = $query->latest()->paginate(10);
        
        return view('admin.bookings.index', compact('bookings'));
    }

    public function create(): View
    {
        $trips = Trip::where('status', 'published')->get();
        $equipment = Equipment::where('stock_quantity', '>', 0)->get();
        $services = Service::all();
        
        return view('admin.bookings.create', compact('trips', 'equipment', 'services'));
    }

    public function store(BookingRequest $request): RedirectResponse
    {
        return DB::transaction(function () use ($request) {
            $data = $request->validated();
            $trip = Trip::findOrFail($data['trip_id']);
            
            // Calculate total price
            $totalPrice = $trip->price * $data['pax_count'];
            
            // Check equipment availability and calculate price
            $equipmentTotal = 0;
            if (!empty($data['equipment'])) {
                foreach ($data['equipment'] as $equipmentData) {
                    $equipment = Equipment::findOrFail($equipmentData['id']);
                    if ($equipment->stock_quantity < $equipmentData['quantity']) {
                        return back()->withErrors(['equipment' => "Insufficient stock for {$equipment->name}"]);
                    }
                    $equipmentTotal += $equipment->rental_price_per_day * $equipmentData['quantity'] * $trip->duration;
                }
            }
            
            // Calculate services total
            $servicesTotal = 0;
            if (!empty($data['services'])) {
                foreach ($data['services'] as $serviceData) {
                    $service = Service::findOrFail($serviceData['id']);
                    $servicesTotal += $service->price * $serviceData['quantity'];
                }
            }
            
            $totalPrice += $equipmentTotal + $servicesTotal;
            
            // Create booking
            $booking = Booking::create([
                'trip_id' => $data['trip_id'],
                'booking_type' => $trip->type,
                'departure_date' => $data['departure_date'],
                'total_price' => $totalPrice,
                'contact_name' => $data['contact_name'],
                'contact_phone' => $data['contact_phone'],
                'pax_count' => $data['pax_count'],
                'notes' => $data['notes'] ?? null,
                'status' => 'pending'
            ]);
            
            // Create rental items
            if (!empty($data['equipment'])) {
                foreach ($data['equipment'] as $equipmentData) {
                    $equipment = Equipment::findOrFail($equipmentData['id']);
                    $subtotal = $equipment->rental_price_per_day * $equipmentData['quantity'] * $trip->duration;
                    
                    BookingRentalItem::create([
                        'booking_id' => $booking->id,
                        'equipment_id' => $equipmentData['id'],
                        'quantity' => $equipmentData['quantity'],
                        'price_per_unit' => $equipment->rental_price_per_day,
                        'subtotal' => $subtotal
                    ]);
                    
                    // Update stock
                    $equipment->decrement('stock_quantity', $equipmentData['quantity']);
                }
            }
            
            // Create services
            if (!empty($data['services'])) {
                foreach ($data['services'] as $serviceData) {
                    $service = Service::findOrFail($serviceData['id']);
                    $subtotal = $service->price * $serviceData['quantity'];
                    
                    BookingService::create([
                        'booking_id' => $booking->id,
                        'service_id' => $serviceData['id'],
                        'quantity' => $serviceData['quantity'],
                        'price' => $service->price,
                        'subtotal' => $subtotal
                    ]);
                }
            }
            
            return redirect()->route('admin.bookings.index')
                ->with('success', 'Booking created successfully.');
        });
    }

    public function show(Booking $booking): View
    {
        $booking->load(['trip.mountain', 'user', 'bookingRentalItems.equipment', 'bookingServices.service']);
        return view('admin.bookings.show', compact('booking'));
    }

    public function edit(Booking $booking): View
    {
        $trips = Trip::where('status', 'published')->get();
        $equipment = Equipment::where('stock_quantity', '>', 0)->get();
        $services = Service::all();
        $booking->load(['bookingRentalItems.equipment', 'bookingServices.service']);
        
        return view('admin.bookings.edit', compact('booking', 'trips', 'equipment', 'services'));
    }

    public function updateStatus(Request $request, Booking $booking): RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled'
        ]);

        if ($request->status === 'cancelled' && $booking->status !== 'cancelled') {
            // Restore equipment stock
            foreach ($booking->bookingRentalItems as $item) {
                $item->equipment->increment('stock_quantity', $item->quantity);
            }
        }

        $booking->update(['status' => $request->status]);

        return back()->with('success', 'Booking status updated successfully.');
    }

    public function destroy(Booking $booking): RedirectResponse
    {
        // Restore equipment stock
        foreach ($booking->bookingRentalItems as $item) {
            $item->equipment->increment('stock_quantity', $item->quantity);
        }

        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }
}