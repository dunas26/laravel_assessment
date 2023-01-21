<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function showRestaurants() {
        $restaurants = \App\Restaurant::all();
        return view('restaurants', ['restaurants' => $restaurants]);
    }

    public function showTables(int $id) {
        $restaurant = \App\Restaurant::findOrFail($id);
        $tables = \App\Table::where('restaurant_id', '=', $id)->get();
        return view('tables', compact('restaurant', 'tables'));
    }

    public function showActiveTables(int $id) {
        $restaurant = \App\Restaurant::findOrFail($id);
        $tables = \App\Table::where([
            ['restaurant_id', '=', $id],
            ['active', '=', true]
        ])
        ->get();
        return view('active-tables', compact('restaurant', 'tables'));
    }
}
