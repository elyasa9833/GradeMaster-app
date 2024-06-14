@extends('layouts.main')

@section('container')
<table class="w-full border-collapse">
    <tr>
        <th class="border p-2 text-left bg-slate-300 w-1">No</th>
        <th class="border p-2 text-left bg-slate-300">Nama</th>
        <th class="border p-2 text-left bg-slate-300">Kelas</th>
    </tr>

    @foreach ($students as $i => $student)
        <tr class="text-center">
            <td class="border p-2">{{ $i+1 }}</td>
            <td class="border p-2">{{ $student['nama'] }}</td>
            <td class="border p-2">{{ $student['kelas'] }}</td>
        </tr>
        
    @endforeach

</table>
@endsection