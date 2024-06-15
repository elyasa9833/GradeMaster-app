<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student.index', [
            'title' => 'Student',
            'students' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.addStudent', [
            'title' => 'Student'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createStudent = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        User::create($createStudent);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $score = Score::with('user')
        ->selectRaw('(math + kimia + fisika + biologi) / 4 as total_score')
        ->orderBy('total_score', 'desc');

        return view('student.showStudent', [
            'title' => 'Show Student',
            'student' => User::where('id', $id)->first(),
            'score' => $score->where('user_id', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateStudent = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        User::where('id', $id)->update($updateStudent);

        return redirect('/user/'. $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->back();
    }
}
