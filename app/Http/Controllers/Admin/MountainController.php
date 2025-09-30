<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MountainRequest;
use App\Models\Mountain;
use App\Models\MountainImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MountainController extends Controller
{
    public function index(): View
    {
        $mountains = Mountain::with('mountainImages')->paginate(10);
        return view('admin.mountains.index', compact('mountains'));
    }

    public function create(): View
    {
        return view('admin.mountains.create');
    }

    public function store(MountainRequest $request): RedirectResponse
    {
        $mountain = Mountain::create($request->validated());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('mountains', 'public');
                MountainImage::create([
                    'mountain_id' => $mountain->id,
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('admin.mountains.index')
            ->with('success', 'Mountain created successfully.');
    }

    public function show(Mountain $mountain): View
    {
        $mountain->load('mountainImages', 'trips');
        return view('admin.mountains.show', compact('mountain'));
    }

    public function edit(Mountain $mountain): View
    {
        $mountain->load('mountainImages');
        return view('admin.mountains.edit', compact('mountain'));
    }

    public function update(MountainRequest $request, Mountain $mountain): RedirectResponse
    {
        $mountain->update($request->validated());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('mountains', 'public');
                MountainImage::create([
                    'mountain_id' => $mountain->id,
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('admin.mountains.index')
            ->with('success', 'Mountain updated successfully.');
    }

    public function destroy(Mountain $mountain): RedirectResponse
    {
        // Delete associated images
        foreach ($mountain->mountainImages as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $mountain->delete();

        return redirect()->route('admin.mountains.index')
            ->with('success', 'Mountain deleted successfully.');
    }

    public function deleteImage(MountainImage $image): RedirectResponse
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }
}