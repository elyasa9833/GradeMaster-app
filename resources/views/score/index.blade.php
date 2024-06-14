@extends('layouts.main')

@section('container')
<table class="max-w-screen-lg w-full mx-auto border-collapse">
    <tr>
        <th class="border p-2 text-left bg-slate-300 w-1">Kelas</th>
        <th class="border p-2 text-left bg-slate-300">Nama</th>
        <th class="border p-2 text-left bg-slate-300">Nilai</th>
    </tr>

    @foreach ($scores as $score)
    @php
        $nilai = ($score->math + $score->kimia + $score->fisika + $score->biologi) /4
    @endphp
        <tr class="text-center">
            <td class="border p-2">{{ $score->user->kelas }}</td>
            <td class="border p-2">{{ $score->user->nama }}</td>
            <td class="border p-2">{{ $nilai }}</td>
        </tr>
        
    @endforeach

</table>
@endsection