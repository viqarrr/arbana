<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Equipment;
use App\Models\Information;
use Illuminate\Http\Request;

class PublicProductController extends Controller
{
    public function index()
    {
        $products = Equipment::all();
        $contacts = Contact::all();
        $information = Information::first();

        return view('products', compact('products', 'contacts', 'information'));
    }
}
