<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $groups = DB::table('tables')
        ->select([
            'tables.*',
            'dining_areas.name as dining_area_name'
        ])
        ->where([
            ['restaurant_id', '=', $id],
            ['active', '=', true]
        ])
        ->leftJoin('dining_areas', 'dining_areas.id', '=', 'dining_area_id')
        ->get()
        ->groupBy('dining_area_name');

        return view('active-tables', compact('restaurant', 'groups'));
    }
}
