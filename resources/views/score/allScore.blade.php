@extends('layouts.main')

@section('container')

<table class="max-w-screen-lg w-full mx-auto border-collapse">
    <tr>
        <th class="p-2 text-left bg-slate-300">Kelas</th>
        <th class="p-2 text-left bg-slate-300">Nama Siswa</th>
        <th class="p-2 text-left bg-slate-300">Nilai</th>
    </tr>
    
    @foreach($totalNilaiPerKelas as $kelas => $totalNilai)

        @foreach($studentsByClass[$kelas] as $student)
        <tr>
            <td class="border p-2">{{ $kelas }}</td>
            <td class="border p-2">{{ $student->nama_siswa }}</td>
            <td class="border p-2">{{ $student->total_nilai }}</td>
        </tr>
        @endforeach

    <tr>
        <td class="border p-2"></td>
        <td class="border p-2"></td>
        <td class="border p-2">{{ $totalNilai }}</td>
    </tr>
    
    @endforeach
</table>

@endsection