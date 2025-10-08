<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestinationRequest;
use App\Models\Destination;
use App\Models\DestinationCategory;
use App\Models\DestinationImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DestinationController extends Controller
{
    public function index(): View
    {
        $destinations = Destination::with('destinationImages')->paginate(10);
        $categories = DestinationCategory::all();
        return view('admin.destinations.index', compact('destinations', 'categories'));
    }

    public function store(DestinationRequest $request): RedirectResponse
    {
        $destination = Destination::create($request->validated());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('destinations', 'public');
                DestinationImage::create([
                    'destination_id' => $destination->id,
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination created successfully.');
    }

    public function update(DestinationRequest $request, Destination $destination): RedirectResponse
    {
        $destination->update($request->validated());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('destinations', 'public');
                DestinationImage::create([
                    'destination_id' => $destination->id,
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('admin.destinations.index')
            ->with('success', 'destination updated successfully.');
    }

    public function destroy(Destination $destination): RedirectResponse
    {
        // Delete associated images
        foreach ($destination->destinationImages as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $destination->delete();

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination deleted successfully.');
    }

    public function deleteImage(DestinationImage $image): JsonResponse
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();


        return response()->json(['success' => true]);
    }

    public function addCategory(Request $request): RedirectResponse
    {
        $validatedCategory = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        DestinationCategory::create($validatedCategory);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination created successfully.');
    }
}
