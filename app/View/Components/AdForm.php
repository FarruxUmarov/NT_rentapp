<?php

namespace App\View\Components;

use App\Models\Branch;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdForm extends Component
{
    public $action = '/ads';
    public $branches;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->branches = Branch::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ad-form');
    }
}
