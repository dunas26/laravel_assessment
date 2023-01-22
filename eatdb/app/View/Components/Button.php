<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $label = "", string $boxicon = "", bool $emphasis = null)
    {
        $this->label = $label;
        $this->boxicon = $boxicon;
        $this->emphasis = $emphasis;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.button',
            ['label' => $this->label,
                'boxicon' => $this->boxicon,
                'emphasis' => $this->emphasis,
            ]);
    }
}
