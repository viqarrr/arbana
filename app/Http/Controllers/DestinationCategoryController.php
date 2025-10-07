<?php

namespace App\Http\Controllers;

use App\Models\DestinationCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DestinationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = DestinationCategory::paginate('5');
        
        return view('admin.destination-categories.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        DestinationCategory::create($validatedData);

        return redirect('admin.destination-categories.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DestinationCategory $destinationCategory): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        DestinationCategory::where('id', $destinationCategory->id)
            ->update($validatedData);

        return redirect('admin.destination-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestinationCategory $destinationCategory): RedirectResponse
    {
        DestinationCategory::destroy($destinationCategory->id);

        return redirect('admin.destination-categories.index');
    }
}
