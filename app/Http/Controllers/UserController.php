<?php

namespace App\Http\Controllers;

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

        return redirect('/student');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('student.show', [
            'title' => 'Show Student',
            'user' => $user,
            'nilai' => $user->grade()
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
            'fullname' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'photo_profile' => 'image|file|max:3072|nullable'
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
