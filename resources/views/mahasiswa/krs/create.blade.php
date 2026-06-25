<x-app-layout>
    <div class="flex justify-between items-center mb-8 bg-white p-6 rounded-xl shadow-sm border border-stone-200">
        <div>
            <h1 class="text-2xl font-bold text-stone-800">Tambah / Isi Kartu Rencana Studi</h1>
            <p class="text-sm text-stone-500">Pilih jadwal mata kuliah tersedia yang ingin Anda ambil semester ini.</p>
        </div>
        <a href="{{ route('krs.index') }}" class="inline-flex items-center px-4 py-2.5 bg-stone-100 hover:bg-stone-200 text-stone-700 font-semibold text-xs rounded-lg uppercase tracking-widest transition ease-in-out duration-150 shadow-sm">
            ⬅️ Kembali ke KRS
        </a>
    </div>

    <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-stone-200">
        <div class="p-6 text-stone-900">
            
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl text-sm font-medium flex items-center space-x-2 shadow-sm">
                    <span>⚠️ {{ session('error') }}</span>
                </div>
            @endif

            <div class="overflow-x-auto rounded-xl border border-stone-100">
                <table class="min-w-full divide-y divide-stone-200 text-left text-sm">
                    <thead class="bg-stone-50">
                        <tr>
                            <th class="px-6 py-3.5 font-bold text-stone-700 uppercase tracking-wider text-xs">No</th>
                            <th class="px-6 py-3.5 font-bold text-stone-700 uppercase tracking-wider text-xs">Mata Kuliah</th>
                            <th class="px-6 py-3.5 font-bold text-stone-700 uppercase tracking-wider text-xs">Dosen Pengajar</th>
                            <th class="px-6 py-3.5 font-bold text-stone-700 uppercase tracking-wider text-xs text-center">Kelas</th>
                            <th class="px-6 py-3.5 font-bold text-stone-700 uppercase tracking-wider text-xs">Waktu Kuliah</th>
                            <th class="px-6 py-3.5 font-bold text-stone-700 uppercase tracking-wider text-xs text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-stone-100">
                        @forelse($jadwal as $index => $j)
                            <tr class="hover:bg-stone-50/50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-stone-600 font-medium">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap font-semibold text-stone-900">
                                    {{ $j->matakuliah ? $j->matakuliah->nama_matakuliah : 'N/A' }} <br>
                                    <span class="text-xs font-mono text-stone-500">({{ $j->kode_matakuliah }})</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-stone-700">
                                    {{ $j->dosen ? $j->dosen->nama : 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap font-bold text-stone-800 text-center bg-stone-50/30 font-mono">
                                    {{ $j->kelas }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-stone-600">
                                    <span class="font-bold text-stone-800">{{ $j->hari }}</span>, 
                                    <span class="font-mono bg-stone-100 px-1.5 py-0.5 rounded text-xs text-stone-800 font-bold">
                                        {{ $j->jam }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <form action="{{ route('krs.store') }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="kode_matakuliah" value="{{ $j->kode_matakuliah }}">
                                        
                                        <button type="submit" class="inline-flex items-center px-4 py-1.5 bg-slate-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-slate-700 transition duration-150 shadow-sm">
                                            Ambil Kelas
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-stone-400 italic bg-stone-50/20">
                                    📭 Belum ada jadwal perkuliahan yang tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>