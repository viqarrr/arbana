<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $banners = Banner::paginate('5');
        return view('admin.banners', compact('banners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('banner', 'public');
        }

        Banner::create($data);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, Banner $banner): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }
            $data['image'] = $request->file('image')->store('banner', 'public');
        }

        $banner->update($data);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner): RedirectResponse
    {
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner berhasil dihapus.');
    }
}
