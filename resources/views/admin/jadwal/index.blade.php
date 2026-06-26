<x-app-layout>
    <div class="flex min-h-screen bg-stone-100">
        
        <aside class="w-64 bg-slate-800 text-slate-100 flex flex-col shadow-xl">
            <div class="p-5 text-xl font-bold tracking-wider border-b border-slate-700 flex items-center space-x-2">
                <span>🎓 SIAKAD</span>
            </div>
            
            <nav class="flex-1 p-4 space-y-1">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-700 transition">
                    <span>🏠 Dashboard</span>
                </a>

                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider px-3 pt-4 mb-2">MASTER DATA</p>
                <a href="{{ route('dosen.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-700/50 transition">
                    <span>👥 Dosen</span>
                </a>
                <a href="{{ route('mahasiswa.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-700/50 transition">
                    <span>👨‍🎓 Mahasiswa</span>
                </a>
                <a href="{{ route('matakuliah.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-700/50 transition">
                    <span>📖 Mata Kuliah</span>
                </a>

                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider px-3 pt-4 mb-2">AKADEMIK</p>
                <a href="{{ route('jadwal.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg bg-slate-700 font-medium transition">
                    <span>🗓️ Jadwal</span>
                </a>
                <a href="{{ route('admin.krs.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-700/50 transition">
                    <span>📝 KRS</span>
                </a>
            </nav>

            <div class="p-4 border-t border-slate-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center space-x-2 px-3 py-2 bg-red-600/20 text-red-400 border border-red-500/30 rounded-lg hover:bg-red-600 hover:text-white transition font-medium text-sm">
                        <span>🚪 Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 p-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-stone-800">Manajemen Jadwal Kuliah</h1>
                <div class="flex items-center space-x-2 text-sm text-stone-600 font-medium">
                    <span>👤 Admin SIAKAD</span>
                    <span class="bg-blue-600 text-white text-xs px-2 py-0.5 rounded-md font-bold">Admin</span>
                </div>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-sm border border-stone-200 mb-6">
                <form action="{{ route('jadwal.index') }}" method="GET" class="flex flex-col md:flex-row md:items-center gap-3">
                    <div class="flex-1 relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari jadwal..." class="w-full pl-4 pr-4 py-2 border border-stone-300 rounded-lg text-sm bg-stone-50 focus:bg-white focus:ring-slate-500 focus:border-slate-500 transition text-stone-800">
                    </div>
                    <button type="submit" class="px-4 py-2 bg-slate-700 hover:bg-slate-800 text-white font-semibold text-sm rounded-lg shadow-sm transition duration-150">Cari</button>
                    @if(request()->filled('search'))
                        <a href="{{ route('jadwal.index') }}" class="px-4 py-2 bg-stone-200 hover:bg-stone-300 text-stone-700 font-semibold text-sm rounded-lg shadow-sm transition duration-150 flex items-center">
                            Reset
                        </a>
                    @endif
                </form>
            </div>

            <div class="bg-white rounded-xl shadow-md border border-stone-200 overflow-hidden">
                <div class="bg-slate-700 px-6 py-4 flex justify-between items-center text-white">
                    <span class="font-semibold tracking-wide">🗓️ Daftar Jadwal Kuliah</span>
                    <a href="{{ route('jadwal.create') }}" class="bg-white text-stone-800 hover:bg-stone-100 transition text-xs font-bold px-4 py-2 rounded-lg border border-stone-200 shadow-sm">
                        ➕ Tambah Jadwal
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-stone-50 border-b border-stone-200 text-stone-600 text-xs font-bold uppercase tracking-wider">
                                <th class="py-4 px-6 text-center w-16">No</th>
                                <th class="py-4 px-6">Mata Kuliah</th>
                                <th class="py-4 px-6">Dosen</th>
                                <th class="py-4 px-6">Kelas</th>
                                <th class="py-4 px-6">Waktu</th>
                                <th class="py-4 px-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100 text-sm text-stone-700">
                            @forelse($jadwal as $index => $j)
                            <tr class="hover:bg-stone-50/50 transition">
                                <td class="py-4 px-6 text-center">{{ $index + 1 }}</td>
                                <td class="py-4 px-6 font-semibold">{{ $j->matakuliah->nama_matakuliah ?? '-' }}</td>
                                <td class="py-4 px-6">{{ $j->dosen->nama ?? '-' }}</td>
                                <td class="py-4 px-6 font-bold">{{ $j->kelas }}</td>
                                <td class="py-4 px-6">{{ $j->hari }}, {{ date('H:i', strtotime($j->jam)) }}</td>
                                <td class="py-4 px-6 text-center">
                                    <div class="inline-flex gap-2">
                                        <a href="{{ route('jadwal.edit', $j->id) }}" class="p-1.5 bg-amber-500 text-white rounded hover:bg-amber-600 transition shadow-sm w-7 h-7 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-1.5 bg-red-600 text-white rounded hover:bg-red-700 transition shadow-sm w-7 h-7 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="6" class="py-8 text-center text-stone-400">Data kosong.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>