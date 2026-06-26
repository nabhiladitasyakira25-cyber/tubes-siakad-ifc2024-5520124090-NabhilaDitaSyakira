<x-app-layout>
    <div class="flex min-h-screen bg-stone-100">
        
        <aside class="w-64 bg-slate-800 text-slate-100 flex flex-col shadow-xl">
            <div class="p-5 text-xl font-bold tracking-wider border-b border-slate-700 flex items-center space-x-2">
                <span>🎓 SIAKAD</span>
            </div>
            
            <nav class="flex-1 p-4 space-y-1">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider px-3 mb-2">Main Menu</p>
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg bg-slate-700 font-medium transition">
                    <span>🏠 Dashboard</span>
                </a>

                @if(Auth::user()->role === 'admin')
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider px-3 pt-4 mb-2">Master Data</p>
                    <a href="{{ route('dosen.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-700/50 transition"><span>👥 Dosen</span></a>
                    <a href="{{ route('mahasiswa.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-700/50 transition"><span>👨‍🎓 Mahasiswa</span></a>
                    <a href="{{ route('matakuliah.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-700/50 transition"><span>📖 Mata Kuliah</span></a>

                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider px-3 pt-4 mb-2">Akademik</p>
                    <a href="{{ route('jadwal.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-700/50 transition"><span>🗓️ Jadwal Kuliah</span></a>
                    <a href="{{ route('admin.krs.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-700/50 transition"><span>📝 KRS</span></a>
                @endif

                @if(Auth::user()->role === 'mahasiswa')
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider px-3 pt-4 mb-2">Akademik</p>
                    <a href="{{ route('krs.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-700/50 transition"><span>📝 Kartu Rencana Studi</span></a>
                @endif
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
            <div class="flex justify-between items-center mb-8 bg-white p-4 rounded-xl shadow-sm border border-stone-200">
                <div>
                    <h1 class="text-2xl font-bold text-stone-800">Dashboard {{ ucfirst(Auth::user()->role) }}</h1>
                    <p class="text-sm text-stone-500">Selamat datang kembali, {{ Auth::user()->name }}!</p>
                </div>

                <div class="text-right">
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 text-xs font-black rounded-xl uppercase tracking-widest border border-blue-200">
                        <span class="w-2 h-2 rounded-full bg-blue-400"></span>
                        {{ Auth::user()->role === 'admin' ? 'Administrator SIAKAD' : 'Mahasiswa' }}
        </span>
    </div>
            </div>

            @if(Auth::user()->role === 'admin')
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
                    <a href="{{ route('dosen.index') }}" class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500 flex items-center justify-between hover:shadow-md transition">
                        <div><p class="text-xs font-bold text-stone-400 uppercase tracking-wider">Total Dosen</p><h3 class="text-3xl font-extrabold text-stone-800 mt-1">{{ $totalDosen ?? 0 }}</h3></div>
                        <div class="p-3 bg-blue-50 text-blue-500 text-2xl rounded-lg">👨‍🏫</div>
                    </a>
                    <a href="{{ route('mahasiswa.index') }}" class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-emerald-500 flex items-center justify-between hover:shadow-md transition">
                        <div><p class="text-xs font-bold text-stone-400 uppercase tracking-wider">Total Mahasiswa</p><h3 class="text-3xl font-extrabold text-stone-800 mt-1">{{ $totalMahasiswa ?? 0 }}</h3></div>
                        <div class="p-3 bg-emerald-50 text-emerald-500 text-2xl rounded-lg">👨‍🎓</div>
                    </a>
                    <a href="{{ route('matakuliah.index') }}" class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-amber-500 flex items-center justify-between hover:shadow-md transition">
                        <div><p class="text-xs font-bold text-stone-400 uppercase tracking-wider">Mata Kuliah</p><h3 class="text-3xl font-extrabold text-stone-800 mt-1">{{ $totalMatakuliah ?? 0 }}</h3></div>
                        <div class="p-3 bg-amber-50 text-amber-500 text-2xl rounded-lg">📚</div>
                    </a>
                    <a href="{{ route('jadwal.index') }}" class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-cyan-500 flex items-center justify-between hover:shadow-md transition">
                        <div><p class="text-xs font-bold text-stone-400 uppercase tracking-wider">Total Jadwal</p><h3 class="text-3xl font-extrabold text-stone-800 mt-1">{{ $totalJadwal ?? 0 }}</h3></div>
                        <div class="p-3 bg-cyan-50 text-cyan-500 text-2xl rounded-lg">🗓️</div>
                    </a>
                    <a href="{{ route('admin.krs.index') }}" class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-purple-500 flex items-center justify-between hover:shadow-md transition">
                        <div><p class="text-xs font-bold text-stone-400 uppercase tracking-wider">Total KRS</p><h3 class="text-3xl font-extrabold text-stone-800 mt-1">{{ $totalKrs ?? 0 }}</h3></div>
                        <div class="p-3 bg-purple-50 text-purple-500 text-2xl rounded-lg">📋</div>
                    </a>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 mb-8">
                    <h2 class="text-lg font-bold text-stone-800 mb-4 flex items-center gap-2">🔍 Pencarian & Ringkasan Data Akademik</h2>
                    <form action="/dashboard" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center">
                        <div class="md:col-span-6">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari data berdasarkan nama atau nomor kode..." class="w-full px-4 py-2.5 border border-stone-300 rounded-xl text-sm focus:ring-2 focus:ring-slate-200 outline-none">
                        </div>
                        <div class="md:col-span-3">
                            <select name="category" class="w-full py-2.5 px-3 border border-stone-300 rounded-xl text-sm outline-none">
                                <option value="">Semua Kategori</option>
                                <option value="mahasiswa">Data Mahasiswa</option>
                                <option value="dosen">Data Dosen</option>
                                <option value="matakuliah">Mata Kuliah</option>
                            </select>
                        </div>
                        <div class="md:col-span-3 flex gap-2">
                            <button type="submit" class="flex-1 py-2.5 bg-slate-800 text-white font-bold text-sm rounded-xl hover:bg-slate-900 transition">Cari</button>
                            @if(request()->has('search') || request()->has('category'))
                                <a href="{{ route('dashboard') }}" class="py-2.5 px-4 bg-stone-200 text-stone-700 font-bold text-sm rounded-xl hover:bg-stone-300 transition flex items-center">✕</a>
                            @endif
                        </div>
                    </form>
                </div>

                @if(request()->filled('search'))
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-stone-100 mb-8 overflow-hidden">
                        <h3 class="text-xl font-bold text-stone-800 mb-6 border-b border-stone-200 pb-4 flex items-center gap-2">
                            <span class="w-1.5 h-6 bg-slate-800 rounded-full"></span> Hasil Pencarian
                        </h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left">
                                <thead class="bg-slate-800 text-slate-100">
                                    <tr>
                                        <th class="px-6 py-4 font-semibold">No</th>
                                        <th class="px-6 py-4 font-semibold">Data Akademik</th>
                                        <th class="px-6 py-4 font-semibold">Kategori</th>
                                        <th class="px-6 py-4 font-semibold text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-stone-100">
                                    @php
                                        $results = [];
                                        if (is_array($searchResults)) {
                                            foreach($searchResults as $cat => $items) { foreach($items as $i) { $results[] = ['item' => $i, 'cat' => $cat]; } }
                                        } elseif ($searchResults && $searchResults->isNotEmpty()) {
                                            foreach($searchResults as $i) { $results[] = ['item' => $i, 'cat' => request('category')]; }
                                        }
                                    @endphp
                                    @forelse($results as $index => $data)
                                        <tr class="hover:bg-stone-50 transition">
                                            <td class="px-6 py-4 font-bold text-stone-700">{{ $index + 1 }}</td>
                                            <td class="px-6 py-4 font-medium text-stone-900">{{ $data['item']->nama ?? $data['item']->nama_matakuliah ?? $data['item']->kode_matakuliah }}</td>
                                            <td class="px-6 py-4"><span class="px-3 py-1 bg-stone-100 text-stone-600 rounded-lg text-xs font-bold uppercase">{{ $data['cat'] }}</span></td>
                                            <td class="px-6 py-4 text-center"><span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-[10px] font-bold uppercase border border-emerald-100">Aktif</span></td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="4" class="px-6 py-10 text-center text-stone-400 italic">Tidak ada data ditemukan.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            @endif

            @if(Auth::user()->role === 'mahasiswa')
                <div class="space-y-6">
                    <div class="bg-white p-8 rounded-xl shadow-sm border border-stone-200">
                        <h3 class="text-lg font-bold text-stone-800 mb-2">Akses Menu Academic</h3>
                        <p class="text-stone-600 text-sm mb-4">Kamu terdaftar sebagai Mahasiswa aktif.</p>
                        <a href="{{ route('krs.index') }}" class="inline-flex items-center px-4 py-2 bg-stone-800 text-white rounded-lg text-xs font-bold uppercase hover:bg-stone-700 transition">Menuju Halaman KRS ➔</a>
                    </div>
                </div>
            @endif
        </main>
    </div>
</x-app-layout>