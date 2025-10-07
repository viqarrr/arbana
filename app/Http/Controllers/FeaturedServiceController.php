<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeaturedServiceRequest;
use App\Models\FeaturedService;
use Illuminate\Http\Request;

class FeaturedServiceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(FeaturedServiceRequest $request)
    {
        FeaturedService::create($request->validated());

        return redirect()->route('admin.description.index')
            ->with('success', 'Layanan Unggulan berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeaturedServiceRequest $request, FeaturedService $featuredService)
    {
        $data = $request->validated();

        $featuredService->update($data);

        return redirect()->route('admin.description.index')
            ->with('success', 'Layanan Unggulan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeaturedService $featuredService)
    {
        $featuredService->delete();

        return redirect()->route('admin.description.index')
            ->with('success', 'Layanan Unggulan berhasil dihapus.');
    }
}
