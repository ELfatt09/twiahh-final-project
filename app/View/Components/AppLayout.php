<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $recommendedUsers = User::where('id', '!=', Auth::id())
            ->whereDoesntHave('follows', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->inRandomOrder()
            ->limit(5)
            ->get();

        return view('layouts.app')->with('recommendedUsers', $recommendedUsers);
    }
}
