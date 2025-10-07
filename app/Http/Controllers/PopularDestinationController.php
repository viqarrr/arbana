<?php

namespace App\Http\Controllers;

use App\Http\Requests\PopularDestinationRequest;
use App\Models\PopularDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PopularDestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popularDestinations = PopularDestination::paginate('5');
        return view('admin.popular-destination', compact('popularDestinations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PopularDestinationRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('equipment', 'public');
        }

        PopularDestination::create($data);

        return redirect()->route('admin.popular-destinations.index')
            ->with('success', 'Destinasi populer berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PopularDestinationRequest $request, PopularDestination $popularDestination)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($popularDestination->image) {
                Storage::disk('public')->delete($popularDestination->image);
            }
            $data['image'] = $request->file('image')->store('banner', 'public');
        }

        $popularDestination->update($data);

        return redirect()->route('admin.popular-destinations.index')
            ->with('success', 'Destinasi populer berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PopularDestination $popularDestination)
    {
        if ($popularDestination->image) {
            Storage::disk('public')->delete($popularDestination->image);
        }

        $popularDestination->delete();

        return redirect()->route('admin.popular-destinations.index')
            ->with('success', 'Destinasi populer berhasil dihapus.');
    }

    public function toggleShow($id)
    {
        $destination = PopularDestination::findOrFail($id);
        $destination->show = !$destination->show;
        $destination->save();

        return redirect()->back()->with('success', 'Visibility updated.');
    }
}
