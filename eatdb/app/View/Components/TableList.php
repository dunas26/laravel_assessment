<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class TableList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $tables)
    {
        $this->tables = $tables;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.table-list', ['tables' => $this->tables]);
    }
}
