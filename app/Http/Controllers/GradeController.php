<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('grade.index', [
            'title' => 'Nilai',
            'grades' => Grade::get('user')->get()
        ]);
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
        $inputGrade = $request->validate([
            'matematika' => 'required',
            'kimia' => 'required',
            'fisika' => 'required',
            'biologi' => 'required'
        ]);

        $inputGrade['user_id'] = auth()->user()->id;

        Grade::create($inputGrade);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        return view('grade.edit', [
            'title' => 'Nilai'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updateGrade = $request->validate([
            'matematika' => 'required',
            'kimia' => 'required',
            'fisika' => 'required',
            'biologi' => 'required'
        ]);
        Grade::where('id', $id)->update($updateGrade);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        Grade::destroy($grade->id);
        return redirect()->back();
    }
}
