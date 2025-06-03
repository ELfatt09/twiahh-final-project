<?php

namespace App\Http\Controllers;

use App\Models\threadLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userID = Auth::id();
        $threadID = $request->thread_id;
        $threadLike = threadLike::where('user_id', $userID)
            ->where('thread_id', $threadID)
            ->first();
        if ($threadLike) {
            $threadLike->delete();
        } else {
            threadLike::create([
                'user_id' => $userID,
                'thread_id' => $threadID,
            ]);
        }
        return redirect()->route('threads.show', $threadID);
    }


    /**
     * Remove the specified resource from storage.
     */
}
