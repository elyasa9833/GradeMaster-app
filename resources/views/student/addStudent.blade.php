@extends('layouts.main')

@section('container')
<div class="bg-slate-100 p-5 max-w-lg mx-auto">
    <form action="{{ url('/student') }}" method="post" >
        @csrf
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" class="w-full px-1 py-2 mx-2 my-0 inline-block border rounded-md box-border">
        
        <label for="kelas">Kelas</label>
        <input type="text" id="kelas" name="kelas" class="w-full px-1 py-2 mx-2 my-0 inline-block border rounded-md box-border">
    
        <input type="button" value="Submit" class="w-5/6 mx-auto my-8 block bg-green-600 hover:bg-green-700 text-white px-1 py-2">
    </form>
</div>
    
@endsection