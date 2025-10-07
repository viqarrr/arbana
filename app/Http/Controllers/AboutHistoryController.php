<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutHistoryRequest;
use App\Models\AboutHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutHistory = AboutHistory::first();

        return view('admin.history', compact('aboutHistory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutHistoryRequest $request)
    {
        $aboutHistory = AboutHistory::firstOrFail(); // ambil data tunggal

        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($aboutHistory->image) {
                Storage::disk('public')->delete($aboutHistory->image);
            }
            $data['image'] = $request->file('image')->store('history', 'public');
        }

        $aboutHistory->update($data);

        return redirect()->route('admin.history.index')
            ->with('success', 'Sejarah berhasil diperbarui.');
    }
}
