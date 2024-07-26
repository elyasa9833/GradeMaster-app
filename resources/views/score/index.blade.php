@extends('layouts.main')

@section('container')
<table class="max-w-screen-lg w-full mx-auto border-collapse">
    <tr>
        <th class="border p-2 text-left bg-slate-300 w-1">No</th>
        <th class="border p-2 text-left bg-slate-300">Nama</th>
        <th class="border p-2 text-left bg-slate-300">Kelas</th>
        <th class="border p-2 text-left bg-slate-300">Nilai</th>
        <th class="border p-2 text-left bg-slate-300 w-24">Action</th>
    </tr>

    @foreach ($scores as $i => $score)
        <tr>
            <td class="border p-2">{{ $i+1 }}</td>
            <td class="border p-2">{{ $score->user->nama }}</td>
            <td class="border p-2">{{ $score->user->kelas }}</td>
            <td class="border p-2">{{ $score->total_score }}</td>
            <td class="border p-2 text-center">
                <a href="{{ url('/score/'. $score->id .'/edit') }}"><img src="{{ asset('svg/edit-icons.svg') }}" alt="edit" title="edit" class="inline-block"></a>

                <form action="{{ route('score.destroy', $score->id) }}" method="post" class="inline-block">
                    @csrf @method('delete')
                    <button type="submit">
                        <img src="{{ asset('svg/delete-icons.svg') }}" alt="delete" title="hapus" class="inline-block">
                    </button>
                </form>
            </td>
        </tr>
        
    @endforeach

</table>
@endsection