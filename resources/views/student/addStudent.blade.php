@extends('layouts.main')

@section('container')
<div class="bg-slate-100 p-5 max-w-lg mx-auto">
    <form action="{{ route('student.store') }}" method="post" >
        @csrf
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" class="w-full px-1 py-2 my-2 inline-block border rounded box-border" required>
        
        <label for="kelas">Kelas</label>
        <select name="kelas" id="kelas" class="w-full px-1 py-2 my-2 inline-block border rounded box-border" required>
            <option value="" hidden>Pilih kelas</option>
            <option value="3A">3A</option>
            <option value="3B">3B</option>
            <option value="3C">3C</option>
        </select>
    
        <button type="submit" class="w-full mx-auto my-8 block bg-green-600 hover:bg-green-700 text-white px-1 py-2 rounded">Submit</button>
    </form>
</div>
    
@endsection