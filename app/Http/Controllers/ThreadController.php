<?php

namespace App\Http\Controllers;

use App\Models\thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $threads = thread::all();
        return view('threads.index', [
            'threads' => thread::with('author', 'medias', 'likes')->latest()->get()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);

        thread::create([
            'body' => $request->body,
            'user_id' => Auth::id()
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(thread $thread)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(thread $thread)
    {
        //
    }
}
