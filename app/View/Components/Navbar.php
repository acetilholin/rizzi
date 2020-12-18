<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    public $title;
    public $users;
    public $stats;
    public $offers;
    public $gallery;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $users, $stats, $offers, $gallery)
    {
        $this->title = $title;
        $this->users = $users;
        $this->stats = $stats;
        $this->offers = $offers;
        $this->gallery = $gallery;
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
