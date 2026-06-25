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
                <a href="{{ route('dosen.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-700/50 transition"><span>👥 Dosen</span></a>
                <a href="{{ route('mahasiswa.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-700/50 transition"><span>👨‍🎓 Mahasiswa</span></a>
                <a href="{{ route('matakuliah.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-700/50 transition"><span>📖 Mata Kuliah</span></a>

                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider px-3 pt-4 mb-2">AKADEMIK</p>
                <a href="{{ route('jadwal.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-700/50 transition"><span>🗓️ Jadwal</span></a>
                <a href="{{ route('admin.krs.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg bg-slate-700 font-medium transition"><span>📝 KRS</span></a>
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
                <h1 class="text-2xl font-bold text-stone-800">Manajemen KRS</h1>
                <div class="flex items-center space-x-2 text-sm text-stone-600 font-medium">
                    <span>👤 Admin SIAKAD</span>
                    <span class="bg-blue-600 text-white text-xs px-2 py-0.5 rounded-md font-bold">Admin</span>
                </div>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-sm border border-stone-200 mb-6">
                <form action="{{ route('admin.krs.index') }}" method="GET" class="flex gap-3">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari NPM atau Nama Matkul..." class="flex-1 px-4 py-2 border border-stone-300 rounded-lg text-sm bg-stone-50 focus:bg-white focus:ring-slate-500 focus:border-slate-500 transition">
                    <button type="submit" class="px-4 py-2 bg-slate-700 hover:bg-slate-800 text-white font-semibold text-sm rounded-lg shadow-sm transition">Cari</button>
                    <a href="{{ route('admin.krs.index') }}" class="px-4 py-2 bg-stone-200 hover:bg-stone-300 text-stone-700 font-semibold text-sm rounded-lg transition">Reset</a>
                </form>
            </div>

            <div class="bg-white rounded-xl shadow-md border border-stone-200 overflow-hidden">
                <div class="bg-slate-700 px-6 py-4 flex justify-between items-center text-white">
                    <span class="font-semibold tracking-wide">📋 Daftar KRS Mahasiswa</span>
                    
                    <div class="flex gap-2">
                        <a href="{{ route('admin.krs.exportPdf') }}" class="bg-red-600 hover:bg-red-700 transition text-xs font-bold px-4 py-2 rounded-lg border border-red-500 shadow-sm flex items-center space-x-1">
                            <span>🖨️ Cetak PDF</span>
                        </a>
                        <a href="{{ route('admin.krs.create') }}" class="bg-amber-600 hover:bg-amber-700 transition text-xs font-bold px-4 py-2 rounded-lg border border-amber-500 shadow-sm flex items-center space-x-1">
                            <span>⚙️ Daftarkan KRS MHS</span>
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-stone-50 border-b border-stone-200 text-stone-600 text-xs font-bold uppercase tracking-wider">
                                <th class="py-4 px-6 text-center">No</th>
                                <th class="py-4 px-6">Mahasiswa (NPM)</th>
                                <th class="py-4 px-6">Mata Kuliah</th>
                                <th class="py-4 px-6">Dosen</th>
                                <th class="py-4 px-6 text-center">Kelas</th>
                                <th class="py-4 px-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100 text-sm text-stone-700">
                            @forelse($krs as $index => $item)
                                <tr class="hover:bg-stone-50/50 transition">
                                    <td class="py-4 px-6 text-center text-stone-400 font-medium">{{ $index + 1 }}</td>
                                    <td class="py-4 px-6 font-semibold text-stone-800">{{ $item->npm }}</td>
                                    <td class="py-4 px-6">{{ $item->jadwal->matakuliah->nama_matakuliah ?? 'N/A' }}</td>
                                    <td class="py-4 px-6">{{ $item->jadwal->dosen->nama ?? 'N/A' }}</td>
                                    <td class="py-4 px-6 text-center font-bold">{{ $item->jadwal->kelas ?? '-' }}</td>
                                    <td class="py-4 px-6 text-center whitespace-nowrap">
                                        <form action="{{ route('admin.krs.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-1.5 bg-red-600 text-white rounded hover:bg-red-700 transition shadow-sm flex items-center justify-center w-7 h-7 mx-auto" title="Hapus Data">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="py-8 text-center text-stone-400 italic">Data KRS tidak ditemukan.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>