<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RentalBookingRequest;
use App\Models\Equipment;
use App\Models\RentalBooking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;

class RentalBookingController extends Controller
{
    public function index(): View
    {
        $rentalBookings = RentalBooking::with(['equipment', 'user'])->latest()->paginate(10);
        return view('admin.rental-bookings.index', compact('rentalBookings'));
    }

    public function create(): View
    {
        $equipment = Equipment::where('stock_quantity', '>', 0)->get();
        return view('admin.rental-bookings.create', compact('equipment'));
    }

    public function store(RentalBookingRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $equipment = Equipment::findOrFail($data['equipment_id']);

        // Calculate days and total price
        $startDate = Carbon::parse($data['start_date']);
        $endDate = Carbon::parse($data['end_date']);
        $totalDays = $startDate->diffInDays($endDate) + 1;
        $pricePerUnit = $equipment->calculatePrice($totalDays);
        $totalPrice = $pricePerUnit * $data['quantity'];

        RentalBooking::create([
            'equipment_id' => $data['equipment_id'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'total_days' => $totalDays,
            'quantity' => $data['quantity'],
            'total_price' => $totalPrice,
            'contact_name' => $data['contact_name'],
            'contact_phone' => $data['contact_phone'],
            'notes' => $data['notes'] ?? null,
            'status' => 'pending'
        ]);

        return redirect()->route('admin.rental-bookings.index')
            ->with('success', 'Rental booking created successfully.');
    }

    public function show(RentalBooking $rentalBooking): View
    {
        $rentalBooking->load(['equipment', 'user']);
        return view('admin.rental-bookings.show', compact('rentalBooking'));
    }

    public function updateStatus(Request $request, RentalBooking $rentalBooking): RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled'
        ]);

        $rentalBooking->update(['status' => $request->status]);

        return back()->with('success', 'Rental booking status updated successfully.');
    }

    public function destroy(RentalBooking $rentalBooking): RedirectResponse
    {
        $rentalBooking->delete();

        return redirect()->route('admin.rental-bookings.index')
            ->with('success', 'Rental booking deleted successfully.');
    }
}
