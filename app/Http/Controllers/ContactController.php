<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\PostRequest;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Information;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $contacts = Contact::paginate('5');
        $information = Information::first();

        return view('admin.contacts.index', compact('contacts', 'information'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request): RedirectResponse
    {
        Contact::create($request->validated());

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Kontak berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, Contact $contact): RedirectResponse
    {
        $contact->update($request->validated());

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Kontak berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Kontak berhasil dihapus.');
    }
}
