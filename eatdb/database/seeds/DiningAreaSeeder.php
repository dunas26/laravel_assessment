<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiningAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            "Outdoors",
            "Indoors",
            "Outdoors Terrace",
            "Indoors Terrace",
            "Outdoors VIP",
            "Indoors VIP",
            "Indoors Events",
            "Outdoors Events"];

        foreach($options as $option) {
            DB::table('dining_areas')->insert([
                "name" => $option
            ]);
        }
    }
}
