<x-app-layout>
    <div class="flex min-h-screen bg-stone-100">
        <aside class="w-64 bg-slate-800 text-slate-100 flex flex-col shadow-xl">
            <div class="p-5 text-xl font-bold border-b border-slate-700 tracking-wider">🎓 SIAKAD</div>
            
            <nav class="flex-1 p-4 space-y-1">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider px-3 mb-2">Main Menu</p>
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-700 transition">🏠 Dashboard</a>

                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider px-3 pt-4 mb-2">Akademik</p>
                <a href="{{ route('krs.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg bg-slate-700 font-medium transition">📝 Kartu Rencana Studi</a>
            </nav>

            <div class="p-4 border-t border-slate-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full px-3 py-2 bg-red-600/20 text-red-400 rounded-lg hover:bg-red-600 hover:text-white transition text-sm font-medium">🚪 Logout</button>
                </form>
            </div>
        </aside>

        <main class="flex-1 p-8">
            <div class="flex justify-between items-start mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-stone-800">Kartu Rencana Studi (KRS)</h1>
                    <p class="text-sm text-stone-500 mt-1">Unduh, cari, dan tinjau rangkuman data kelas Anda semester ini.</p>
                </div>
            </div>

            @if(session('success'))
                <div class="mb-4 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 rounded text-sm">✨ {{ session('success') }}</div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-stone-200">
                    <p class="text-xs font-bold text-stone-400 uppercase">Total Mata Kuliah</p>
                    <h3 class="text-3xl font-bold text-stone-800 mt-1">{{ $totalMatkul }} <span class="text-sm font-medium text-stone-500">Kelas</span></h3>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-stone-200">
                    <p class="text-xs font-bold text-stone-400 uppercase">Total Kredit SKS</p>
                    <h3 class="text-3xl font-bold text-stone-800 mt-1">{{ $totalSks }} <span class="text-sm font-medium text-stone-500">SKS</span></h3>
                </div>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-sm border border-stone-200 mb-6">
                <form action="{{ route('krs.index') }}" method="GET" class="flex flex-col md:flex-row gap-3">
                    <input type="text" name="search" value="{{ request('search') }}" 
                        placeholder="Cari nama atau kode mata kuliah..." 
                        class="flex-1 px-4 py-2 bg-stone-50 border border-stone-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-slate-500">
        
        <select name="hari" class="w-full md:w-40 px-4 py-2 bg-stone-50 border border-stone-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-slate-500">
            <option value="">-- Semua Hari --</option>
            @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $day)
                <option value="{{ $day }}" {{ request('hari') == $day ? 'selected' : '' }}>{{ $day }}</option>
            @endforeach
        </select>
        
                <div class="flex gap-2">
                    <button type="submit" class="px-6 py-2 bg-slate-800 text-white text-sm font-semibold rounded-lg hover:bg-slate-700 transition">Cari</button>
                    <a href="{{ route('krs.index') }}" class="px-4 py-2 bg-stone-200 text-stone-700 text-sm font-semibold rounded-lg hover:bg-stone-300 transition text-center">Reset</a>
                </div>
            </form>
        </div>

            <div class="bg-white rounded-xl shadow-md border border-stone-200 overflow-hidden">
                <div class="bg-slate-700 px-6 py-4 text-white font-bold flex justify-between items-center">
                    <span>📋 Daftar Mata Kuliah Diambil</span>
                            <div class="flex items-center gap-2">
                                <a href="{{ route('krs.exportPdf') }}" class="bg-red-600 hover:bg-red-700 text-white text-xs font-bold px-3 py-1.5 rounded transition">
                                    🖨️ CETAK PDF
                                </a>
                                <a href="{{ route('krs.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-3 py-1.5 rounded transition">
                                    + TAMBAH KRS
                                </a>
                    </div>
                </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-stone-50 border-b border-stone-200 text-stone-600 text-xs uppercase">
                            <tr>
                                <th class="py-4 px-6">No</th>
                                <th class="py-4 px-6">Kode</th>
                                <th class="py-4 px-6">Mata Kuliah</th>
                                <th class="py-4 px-6">Dosen</th>
                                <th class="py-4 px-6">Kelas</th>
                                <th class="py-4 px-6">Waktu</th>
                                <th class="py-4 px-6">SKS</th>
                                <th class="py-4 px-6">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100 text-sm">
                            @forelse($krs as $index => $item)
                            <tr class="hover:bg-stone-50">
                                <td class="py-4 px-6">{{ $index + 1 }}</td>
                                <td class="py-4 px-6 font-bold text-pink-600">{{ $item->jadwal->kode_matakuliah ?? '-' }}</td>
                                <td class="py-4 px-6">{{ $item->jadwal->matakuliah->nama_matakuliah ?? '-' }}</td>
                                <td class="py-4 px-6">{{ $item->jadwal->dosen->nama ?? '-' }}</td>
                                <td class="py-4 px-6">{{ $item->jadwal->kelas ?? '-' }}</td>
                                <td class="py-4 px-6">{{ $item->jadwal->hari ?? '-' }}, {{ $item->jadwal->jam ?? '' }}</td>
                                <td class="py-4 px-6 font-bold text-cyan-700">{{ $item->jadwal->matakuliah->sks ?? 0 }} SKS</td>
                                <td class="py-4 px-6">
                                <form action="{{ route('krs.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Drop mata kuliah ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 text-xs font-bold uppercase rounded-full hover:bg-red-200 transition">
                                        Drop
                                    </button>
                                </form>
                            </td>
                            </tr>
                            @empty
                            <tr><td colspan="8" class="py-8 text-center text-stone-400">Belum ada mata kuliah yang diambil.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>