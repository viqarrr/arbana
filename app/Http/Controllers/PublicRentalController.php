<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentalBookingRequest;
use App\Models\Equipment;
use App\Models\RentalBooking;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicRentalController extends Controller
{
    public function index(): View
    {
        $equipment = Equipment::where('stock_quantity', '>', 0)->paginate(12);
        return view('rentals.index', compact('equipment'));
    }

    public function show(Equipment $equipment): View
    {
        return view('rentals.show', compact('equipment'));
    }

    public function calculatePrice(Request $request)
    {
        $equipment = Equipment::findOrFail($request->equipment_id);
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);
        $totalDays = $startDate->diffInDays($endDate) + 1;
        $quantity = $request->quantity;

        $pricePerUnit = $equipment->calculatePrice($totalDays);
        $totalPrice = $pricePerUnit * $quantity;
        $isAvailable = $equipment->isAvailable($request->start_date, $request->end_date, $quantity);

        return response()->json([
            'total_days' => $totalDays,
            'price_per_unit' => $pricePerUnit,
            'total_price' => $totalPrice,
            'is_available' => $isAvailable,
            'formatted_price' => 'Rp ' . number_format($totalPrice, 0, ',', '.')
        ]);
    }

    public function book(RentalBookingRequest $request): RedirectResponse
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

        return redirect()->route('rentals.index')
            ->with('success', 'Rental booking submitted successfully! We will contact you soon.');
    }
}
