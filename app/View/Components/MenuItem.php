<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuItem extends Component
{

    public $class,$link,$name,$counter;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class="feather-list",$link="#",$name,$counter="")
    {
        $this->class = $class;
        $this->link = $link;
        $this->name = $name;
        $this->counter = $counter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.menu-item');
    }
}
