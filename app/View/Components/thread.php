<?php

namespace App\View\Components;

use App\Models\thread as ModelsThread;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class thread extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ModelsThread $thread)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.thread');
    }
}
