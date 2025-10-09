<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Information;
use App\Models\Service;
use Illuminate\Http\Request;

class PublicServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $contacts = Contact::all();
        $information = Information::first();

        return view('services', compact('services', 'contacts', 'information'));
    }
}
