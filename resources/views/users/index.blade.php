@extends('dashboard')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Manajemen User</h1>
        <p class="text-slate-500 text-sm mt-1">Kelola data administrator dan hak akses panel VisionMe.</p>
    </div>
</div>

<div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-50 border-b border-slate-100 text-xs font-bold text-slate-400 uppercase tracking-wider">
                <th class="py-4 px-6">No</th>
                <th class="py-4 px-6">Nama Pengguna</th>
                <th class="py-4 px-6">Alamat Email</th>
            </tr>
        </thead>
        <tbody class="text-sm text-slate-700 divide-y divide-slate-100">
            @foreach($users as $key => $user)
            <tr>
                <td class="py-4 px-6 font-semibold text-slate-400">{{ $key + 1 }}</td>
                <td class="py-4 px-6 font-bold text-slate-900">{{ $user->name }}</td>
                <td class="py-4 px-6 text-slate-500">{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection