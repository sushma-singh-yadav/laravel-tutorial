<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputComponent extends Component
{
    public $type;

    public $name;

    public $title;

    public $image;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $name, $title, $image = '')
    {
        //
        $this->type = $type;
        $this->name = $name;
        $this->title = $title;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-component');
    }
}
