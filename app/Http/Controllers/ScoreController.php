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
        $scores = Score::with('user')
        ->selectRaw('id, user_id, (math + kimia + fisika + biologi) / 4 as total_score')
        ->orderBy('total_score', 'desc')
        ->get();

        return view('score.index', [
            'title' => 'Nilai',
            'scores' => $scores
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = User::leftJoin('scores', 'users.id', '=', 'scores.user_id')
        ->select('users.id', 'users.nama', 'scores.user_id as has_score')
        ->get();

        return view('score.addScore', [
            'title' => 'Nilai',
            'students' => $students
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputScore = $request->validate([
            'user_id' => 'required|exists:users,id',
            'math' => 'required|numeric',
            'kimia' => 'required|numeric',
            'fisika' => 'required|numeric',
            'biologi' => 'required|numeric'
        ]);
        Score::create($inputScore);

        return redirect('/score');
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
    public function edit($id)
    {
        $score = Score::with('user')->where('id', $id)->first();
        return view('score.editScore', [
            'title' => 'Nilai',
            'score' => $score
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updateScore = $request->validate([
            'math' => 'required',
            'kimia' => 'required',
            'fisika' => 'required',
            'biologi' => 'required'
        ]);
        Score::where('id', $id)->update($updateScore);

        return redirect('/score');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $score = Score::findOrFail($id);
        $score->delete();
        return redirect()->back();
    }

    public function allScore()
    {
        $students = Score::with('user')
            ->selectRaw('user_id, users.kelas, users.nama as nama_siswa, ((math + kimia + fisika + biologi) /4) as total_nilai')
            ->join('users', 'scores.user_id', '=', 'users.id')
            ->orderBy('total_nilai', 'desc')
            ->get();

        // group student data by class
        $studentsByClass = $students->groupBy('kelas');

        // sum total class scores and sorted by highest score
        $totalNilaiPerKelas = $studentsByClass->map(function ($students) {
            return $students->sum('total_nilai');
        })->sortDesc();

        return view('score.allScore', [
            'title' => 'Nilai',
            'studentsByClass' => $studentsByClass,
            'totalNilaiPerKelas' => $totalNilaiPerKelas
        ]);
    }
}
