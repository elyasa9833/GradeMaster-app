@extends('layouts.main')

@section('container')
<div class="bg-slate-100 p-5 max-w-lg mx-auto">
    <form action="{{ url('/score/'. $score->id) }}" method="post" >
        @csrf @method('put')
        <label for="siswa">Siswa</label>
        <input type="text" id="siswa" value="{{ $score->user->nama }}" class="w-full px-1 py-2 my-2 inline-block border rounded box-border" disabled>

        <div class="grid grid-cols-2">
            <div class="mr-4">
                <label for="math">Matematika</label>
                <input type="number" id="math" name="math" min="0" max="100" value="{{ $score->math }}" class="w-full px-1 py-2 my-2 inline-block border rounded box-border" required>
            </div>
            <div>
                <label for="kimia">Kimia</label>
                <input type="number" id="kimia" name="kimia" min="0" max="100" value="{{ $score->kimia }}" class="w-full px-1 py-2 my-2 inline-block border rounded box-border" required>
            </div>
            <div class="mr-4">
                <label for="fisika">Fisika</label>
                <input type="number" id="fisika" name="fisika" min="0" max="100" value="{{ $score->fisika }}" class="w-full px-1 py-2 my-2 inline-block border rounded box-border" required>
            </div>
            <div>
                <label for="biologi">Biologi</label>
                <input type="number" id="biologi" name="biologi" min="0" max="100" value="{{ $score->biologi }}" class="w-full px-1 py-2 my-2 inline-block border rounded box-border" required>
            </div>
        </div>
    
        <button type="submit" class="w-full mx-auto my-8 block bg-green-600 hover:bg-green-700 text-white px-1 py-2 rounded">Submit</button>
    </form>
</div>
    
@endsection