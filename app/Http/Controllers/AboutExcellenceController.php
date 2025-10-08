<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutExcellenceRequest;
use App\Models\AboutExcellence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutExcellenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutExcellence = AboutExcellence::first();

        return view('admin.excellence', compact('aboutExcellence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutExcellenceRequest $request, AboutExcellence $aboutExcellence)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($aboutExcellence->image) {
                Storage::disk('public')->delete($aboutExcellence->image);
            }
            $data['image'] = $request->file('image')->store('excellence', 'public');
        }

        $aboutExcellence->update($data);

        return redirect()->route('admin.excellence.index')
            ->with('success', 'Keunggulan berhasil diperbarui.');
    }
}
