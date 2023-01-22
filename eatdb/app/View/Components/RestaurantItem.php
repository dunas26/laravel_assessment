<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RestaurantItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(\App\Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $tables = $this->restaurant->tables;
        $active_table_count = $tables
        ->filter(function ($value, $key) {
            return $value->active;
        })
        ->count();
        $table_count = $tables->count() - $active_table_count;
        $tables_available = $active_table_count > 0;
        return view('components.restaurant-item',
            [
                'restaurant' => $this->restaurant,
                'active_tables' => $active_table_count,
                'tables' => $table_count,
                'tables_available' => $tables_available
            ]);
    }
}
