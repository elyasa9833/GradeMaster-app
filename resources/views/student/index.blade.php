@extends('layouts.main')

@section('container')
<table class="max-w-screen-lg w-full mx-auto border-collapse">
    <tr>
        <th class="border p-2 text-left bg-slate-300 w-1">No</th>
        <th class="border p-2 text-left bg-slate-300">Nama</th>
        <th class="border p-2 text-left bg-slate-300">Kelas</th>
        <th class="border p-2 text-left bg-slate-300 w-24">Action</th>
    </tr>

    @foreach ($students as $i => $student)
        <tr>
            <td class="border p-2">{{ $i+1 }}</td>
            <td class="border p-2">{{ $student->nama }}</td>
            <td class="border p-2">{{ $student->kelas }}</td>
            <td class="border p-2">
                <a href="{{ url('/student/'. $student->id) }}"><img src="{{ asset('svg/show-icons.svg') }}" alt="show" class="inline-block"></a>
                
                <form action="{{ url('/student/'. $student->id) }}" method="post" class="inline-block">
                    @csrf @method('delete')
                    <button type="submit">
                        <img src="{{ asset('svg/delete-icons.svg') }}" alt="delete" class="inline-block">
                    </button>
                </form>
            </td>
        </tr>
        
    @endforeach

</table>
@endsection