<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    public $title;
    public $users;
    public $stats;
    public $offers;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $users, $stats, $offers)
    {
        $this->title = $title;
        $this->users = $users;
        $this->stats = $stats;
        $this->offers = $offers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}
