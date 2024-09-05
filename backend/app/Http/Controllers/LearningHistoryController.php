<?php

namespace App\Http\Controllers;

use App\Models\LearningHistory;
use Illuminate\Http\Request;

class LearningHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $learningHistories = LearningHistory::all();
        return view('learning_histories.index', compact('learningHistories'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LearningHistory $learningHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LearningHistory $learningHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LearningHistory $learningHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LearningHistory $learningHistory)
    {
        //
    }
}
