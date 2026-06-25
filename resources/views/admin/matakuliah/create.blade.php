<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-stone-800 leading-tight">
            {{ __('Tambah Mata Kuliah Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-stone-200">
                <div class="p-6 text-stone-900">
                    <form action="{{ route('matakuliah.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="kode_matakuliah" class="block text-sm font-medium text-stone-700">Kode Mata Kuliah</label>
                            <input type="text" name="kode_matakuliah" id="kode_matakuliah" value="{{ old('kode_matakuliah') }}" class="mt-1 block w-full rounded-md border-stone-300 shadow-sm focus:border-stone-500 focus:ring focus:ring-stone-200 focus:ring-opacity-50 font-mono" placeholder="Contoh: IF244301">
                            @error('kode_matakuliah')
                                <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nama_matakuliah" class="block text-sm font-medium text-stone-700">Nama Mata Kuliah</label>
                            <input type="text" name="nama_matakuliah" id="nama_matakuliah" value="{{ old('nama_matakuliah') }}" class="mt-1 block w-full rounded-md border-stone-300 shadow-sm focus:border-stone-500 focus:ring focus:ring-stone-200 focus:ring-opacity-50" placeholder="Contoh: Pemrograman Web Lanjut">
                            @error('nama_matakuliah')
                                <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="sks" class="block text-sm font-medium text-stone-700">Jumlah SKS</label>
                            <input type="number" name="sks" id="sks" value="{{ old('sks') }}" min="1" max="6" class="mt-1 block w-full rounded-md border-stone-300 shadow-sm focus:border-stone-500 focus:ring focus:ring-stone-200 focus:ring-opacity-50" placeholder="Contoh: 3">
                            @error('sks')
                                <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-stone-100">
                            <a href="{{ route('matakuliah.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-stone-300 rounded-md font-semibold text-xs text-stone-700 uppercase tracking-widest shadow-sm hover:bg-stone-50 transition duration-150">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-stone-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-stone-700 active:bg-stone-900 transition duration-150">
                                Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>