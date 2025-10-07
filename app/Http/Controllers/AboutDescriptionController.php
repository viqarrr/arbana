<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutDescriptionRequest;
use App\Models\AboutDescription;
use App\Models\FeaturedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutDescription = AboutDescription::first();
        $featuredServices = FeaturedService::all();

        return view('admin.description', compact('aboutDescription', 'featuredServices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutDescriptionRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('equipment', 'public');
        }

        AboutDescription::create($data);

        return redirect()->route('admin.description.index')
            ->with('success', 'Deskripsi berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutDescriptionRequest $request, AboutDescription $aboutDescription)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($aboutDescription->image) {
                Storage::disk('public')->delete($aboutDescription->image);
            }
            $data['image'] = $request->file('image')->store('description', 'public');
        }

        $aboutDescription->update($data);

        return redirect()->route('admin.description.index')
            ->with('success', 'Deskripsi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutDescription $aboutDescription)
    {
        if ($aboutDescription->image) {
            Storage::disk('public')->delete($aboutDescription->image);
        }

        $aboutDescription->delete();

        return redirect()->route('admin.description.index')
            ->with('success', 'Deskripsi berhasil dihapus.');
    }
}
