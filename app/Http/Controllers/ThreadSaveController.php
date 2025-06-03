<?php

namespace App\Http\Controllers;

use App\Models\threadSave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadSaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function store(Request $request)
    {
    $userID = Auth::id();
        $threadID = $request->thread_id;
        $threadSave = threadSave::where('user_id', $userID)
            ->where('thread_id', $threadID)
            ->first();
        if ($threadSave != null) {
            $threadSave->delete();
        } else {
            threadSave::create([
                'user_id' => $userID,
                'thread_id' => $threadID,
            ]);
        }
        return redirect()->route('threads.show', $threadID);
    }
}
