<?php

namespace App\Http\Controllers;

use App\Models\follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        if ($userId == $request->follow_id) {
            return redirect()->back();
        }

        $follow = follow::where('user_id', $userId)->where('follow_id', $request->follow_id)->first();
        if ($follow) {
            $follow->delete();
        } else {
            follow::create([
                'user_id' => $userId,
                'follow_id' => $request->follow_id,
            ]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(follow $follow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(follow $follow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, follow $follow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(follow $follow)
    {
        //
    }
}
