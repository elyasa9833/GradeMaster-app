@extends('layouts.main')

@section('container')

@php
    $totalNilai = ($score->math + $score->kimia + $score->fisika + $score->biologi) /4
    
@endphp

<div class="max-w-screen-lg mx-auto">

    <h3>Nama: {{ $student->nama }}</h3>
    <h3>Kelas: {{ $student->kelas }}</h3>
    <h3>Total Nilai: {{ $totalNilai }}</h3>

    <table class="w-full border-collapse mt-7">
        <tr>
            <th class="border p-2 text-left bg-slate-300 w-1/4">Matematika</th>
            <th class="border p-2 text-left bg-slate-300 w-1/4">Kimia</th>
            <th class="border p-2 text-left bg-slate-300 w-1/4">Fisika</th>
            <th class="border p-2 text-left bg-slate-300 w-1/4">Biologi</th>
        </tr>

        <tr class="text-center">
            <td class="border p-2">{{ $score->math }}</td>
            <td class="border p-2">{{ $score->kimia }}</td>
            <td class="border p-2">{{ $score->fisika }}</td>
            <td class="border p-2">{{ $score->biologi }}</td>
            
        </tr>
            
    </table>
</div>
@endsection