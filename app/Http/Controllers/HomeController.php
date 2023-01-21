<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Table;

class HomeController extends Controller
{
    /*
     * Returns an index view for all restaurants
     *
     */
    public function index() {
        $restaurants = Restaurant::all();
        return view('home', ['restaurants' => $restaurants]);
    }
}
