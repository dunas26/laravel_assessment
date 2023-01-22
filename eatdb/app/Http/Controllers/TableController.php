<?php

namespace App\Http\Controllers;

use App\DiningArea;
use App\Restaurant;
use App\Table;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function requestCreateTable(Request $request) {
        $name = $request->restaurant_name;
        $restaurant = Restaurant::where('name', '=', $name)->first();
        $return_url = '/table/create?name=' . urlencode($name);
        if (!$restaurant) return view('notify', ['url' => $return_url, 'msg' => "Restaurant '$name' not found."]);
        $table_found = Table::where('name', '=', $request->name)->first();
        if ($table_found) return view('notify', ['url' => $return_url, 'msg' => "A table with name '$request->name' has been found. Please choose another name."]);
        if (!$request->name) return view('notify', ['url' => $return_url, 'msg' => "The name of the table is required. Please input a proper table name so we can continue."]);

        $table = new Table;
        $table->name = $request->name;
        $table->minimum_capacity = $request->minimum_capacity;
        $table->maximum_capacity = $request->maximum_capacity;
        $table->dining_area_id = $request->area;
        $table->restaurant_id = $restaurant->id ?? -1;
        $table->active = $request->active == "on";
        try {
            $table->save();
        }
        catch(\Throwable $th) {
            return view('notify', ['url' => $return_url, 'msg' => "An error has been caught while trying to save a table: " . $th->getMessage()]);
        }

        return redirect($request->next);
    }

    public function createTableForm(Request $req) {
        if ($req->name == null) return redirect('/');
        $dining_areas = DiningArea::all();
        return view('create-table', ['dining_areas' => $dining_areas, 'name' => $req->name]);
    }
}
