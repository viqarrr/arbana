<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TripRequest;
use App\Models\Destination;
use App\Models\Mountain;
use App\Models\Trip;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TripController extends Controller
{
    public function index(Request $request): View
    {
        $type = $request->query('type');

        $trips = Trip::when($type, function ($query, $type) {
            return $query->where('type', $type);
        })->paginate('10');

        $destinations = Destination::all();

        return view('admin.trips.index', compact('trips', 'destinations'));
    }

    public function create(): View
    {
        $mountains = Mountain::all();
        return view('admin.trips.create', compact('mountains'));
    }

    public function store(TripRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('trips', 'public');
        }

        Trip::create($data);

        return redirect()->route('admin.trips.index')
            ->with('success', 'Trip created successfully.');
    }

    public function show(Trip $trip): View
    {
        $trip->load('mountain', 'bookings');
        return view('admin.trips.show', compact('trip'));
    }

    public function edit(Trip $trip): View
    {
        $mountains = Mountain::all();
        return view('admin.trips.edit', compact('trip', 'mountains'));
    }

    public function update(TripRequest $request, Trip $trip): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('featured_image')) {
            if ($trip->featured_image) {
                Storage::disk('public')->delete($trip->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('trips', 'public');
        }

        $trip->update($data);

        return redirect()->route('admin.trips.index')
            ->with('success', 'Trip updated successfully.');
    }

    public function destroy(Trip $trip): RedirectResponse
    {
        if ($trip->featured_image) {
            Storage::disk('public')->delete($trip->featured_image);
        }

        $trip->delete();

        return redirect()->route('admin.trips.index')
            ->with('success', 'Trip deleted successfully.');
    }
}
