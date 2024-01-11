<?php

namespace App\View\Components;

use Illuminate\View\Component;

class product extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $product;
    public $title;
    public $wish;
    public $count;
    public function __construct($title,$product,$wish,$count)
    {
        $this->product = $product;
        $this->title = $title;
        $this->wish = $wish;
        $this->count = $count;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product');
    }
}
