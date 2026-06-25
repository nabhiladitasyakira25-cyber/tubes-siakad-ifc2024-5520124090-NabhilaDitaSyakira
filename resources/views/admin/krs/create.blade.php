<x-app-layout>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl border border-stone-200 shadow-sm">
        <h2 class="text-xl font-bold text-stone-800 mb-2">⚙️ Daftarkan Kelas Mahasiswa</h2>
        <p class="text-xs text-stone-500 mb-6">Pilih mahasiswa dan plotkan jadwal mata kuliah yang sesuai.</p>

        <form action="{{ route('admin.krs.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-xs font-bold uppercase text-stone-600 mb-2">Pilih Mahasiswa</label>
                <select name="npm" class="w-full px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-stone-500" required>
                    <option value="">-- Pilih Mahasiswa / NPM --</option>
                    @foreach($mahasiswa as $mhs)
                        <option value="{{ $mhs->username_fk }}">
                            {{ $mhs->username_fk }} - {{ $mhs->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-xs font-bold uppercase text-stone-600 mb-2">Pilih Jadwal Mata Kuliah</label>
                <select name="id_jadwal" class="w-full px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-stone-500" required>
                    <option value="">-- Pilih Kelas & Jadwal --</option>
                    @foreach($jadwal as $j)
                        {{-- Kita gunakan $j->id karena di database anda kolomnya bernama id --}}
                        <option value="{{ $j->id }}">
                            {{ $j->matakuliah->nama_matakuliah ?? 'Matkul Tanpa Nama' }} 
                            (Kelas {{ $j->kelas }}) - {{ $j->hari }}, {{ date('H:i', strtotime($j->jam)) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.krs.index') }}" class="px-4 py-2 bg-stone-100 text-stone-700 rounded-lg text-sm font-medium hover:bg-stone-200 transition">Batal</a>
                <button type="submit" class="px-5 py-2 bg-amber-600 text-white rounded-lg text-sm font-medium hover:bg-amber-700 transition">Plotkan Data</button>
            </div>
        </form>
    </div>
</x-app-layout>