<?php

namespace App\Http\Controllers;

use App\Models\AboutExcellence;
use App\Models\AboutHistory;
use App\Models\Contact;
use App\Models\Information;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $aboutHistory = AboutHistory::first();
        $aboutExcellence = AboutExcellence::first();
        $contacts = Contact::all();
        $information = Information::first();

        return view('about', compact('aboutHistory', 'aboutExcellence', 'contacts', 'information'));
    }
}
