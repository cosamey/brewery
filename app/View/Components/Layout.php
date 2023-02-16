<?php

namespace App\View\Components;

use Illuminate\View\{Component, View};

class Layout extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View
    {
        return view('layouts.default');
    }
}
