<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('score.index', [
            'title' => 'Nilai',
            'scores' => Score::get('user')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('score.addScore', [
            'title' => 'Nilai',
            'students' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputScore = $request->validate([
            'matematika' => 'required',
            'kimia' => 'required',
            'fisika' => 'required',
            'biologi' => 'required'
        ]);

        $inputScore['user_id'] = auth()->user()->id;

        Score::create($inputScore);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Score $score)
    {
        return view('score.edit', [
            'title' => 'Nilai'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updateScore = $request->validate([
            'matematika' => 'required',
            'kimia' => 'required',
            'fisika' => 'required',
            'biologi' => 'required'
        ]);
        Score::where('id', $id)->update($updateScore);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Score $score)
    {
        Score::destroy($score->id);
        return redirect()->back();
    }
}
