<?php

namespace App\Http\Controllers;

use App\Models\thread;
use App\Models\threadMedia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $threads = thread::whereNull('parent_id');
        return view('threads.index', [
            'threads' => $threads->with('author', 'replies', 'media', 'likes', 'reposts')->latest()->get()
        ]);
    }

    public function bookmarks()
    {
        $user = User::find(Auth::id());
        $savedThreads = $user->threadSaves();
        $threads = thread::whereNull('parent_id')->whereIn('id', $savedThreads->pluck('thread_id'));
        return view('threads.index', [
            'threads' => $threads->with('author', 'replies', 'media', 'likes', 'reposts')->latest()->get()
        ]);
    }

    public function following()
    {
        $user = User::find(Auth::id());
        $followedUserIds = $user->follows()->pluck('follow_id');
        $threads = thread::whereNull('parent_id')->whereIn('user_id', $followedUserIds);

        return view('threads.index', [
            'threads' => $threads->with('author', 'replies', 'media', 'likes', 'reposts')->latest()->get()
        ]);
    }

    public function search(Request $request)
    {
        if (!$request->has('search')) {
            return redirect()->route('threads.index')->withErrors(['search' => 'Search term is required']);
        }

        $query = $request->search;
        $threads = thread::whereNull('parent_id')->where(function ($query) use ($request) {
            $query->where('body', 'like', '%' . $request->search . '%')
                ->orWhereHas('author', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                });
        });

        return view('threads.index', [
            'threads' => $threads->with('author', 'replies', 'media', 'likes', 'reposts')->latest()->get()
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
            'media' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'body' => 'required',
            'parent_id' => 'nullable|integer',
            'repost_id' => 'nullable|integer'
        ]);

        $thread = thread::create([
            'body' => $request->body,
            'user_id' => Auth::id(),
            'parent_id' => $request->parent_id,
            'repost_id' => $request->repost_id,
        ]);
        if ($request->hasFile('media')) {
            $path = $request->file('media')->store('uploads/images', 'public');
            threadMedia::create([
                'thread_id' => $thread->id,
                'path' => $path,
            ]);
    }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(int $thread)
    {
        return view('threads.show', [
            'thread' => thread::with('author', 'replies', 'media', 'likes', 'reposts', 'repostedFrom')->findOrFail($thread)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $thread = thread::findOrFail($request->thread_id);
        $thread->delete();
        return redirect()->back();
    }
}
