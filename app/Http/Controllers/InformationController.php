<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'footer_description' => 'required|string',
            'hiking_rules' => 'required|string',
        ]);

        $info = Information::findOrFail($id);
        $info->update($validated);

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Informasi berhasil diperbarui.');
    }
}
