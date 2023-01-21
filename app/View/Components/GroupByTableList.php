<?php

namespace App\View\Components;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class GroupByTableList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $groups)
    {
        $this->groups = $groups;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.group-by-table-list', ['groups' => $this->groups]);
    }
}
