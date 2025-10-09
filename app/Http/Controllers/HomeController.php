<?php

namespace App\Http\Controllers;

use App\Models\AboutDescription;
use App\Models\AboutHistory;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\FeaturedService;
use App\Models\Information;
use App\Models\PopularDestination;
use App\Models\Trip;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $aboutDescription = AboutDescription::first();
        $featuredServices = FeaturedService::all();
        $popularDestinations = PopularDestination::take(5)->get();
        $trips = Trip::all();
        $contacts = Contact::all();
        $information = Information::first();

        return view('home', compact('banners', 'aboutDescription', 'featuredServices', 'popularDestinations', 'trips', 'contacts'));
    }
}
