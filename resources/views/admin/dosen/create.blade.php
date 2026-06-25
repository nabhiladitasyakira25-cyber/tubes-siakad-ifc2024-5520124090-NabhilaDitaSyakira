<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-stone-800 leading-tight">
            {{ __('Tambah Data Dosen Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-stone-200">
                <div class="p-6 text-stone-900">
                    <form action="{{ route('dosen.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="nidn" class="block text-sm font-medium text-stone-700">NIDN (Nomor Induk Dosen Nasional)</label>
                            <input type="text" name="nidn" id="nidn" value="{{ old('nidn') }}" class="mt-1 block w-full rounded-md border-stone-300 shadow-sm focus:border-stone-500 focus:ring focus:ring-stone-200 focus:ring-opacity-50 font-mono" placeholder="Contoh: 0421098701">
                            @error('nidn')
                                <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nama" class="block text-sm font-medium text-stone-700">Nama Lengkap Dosen</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="mt-1 block w-full rounded-md border-stone-300 shadow-sm focus:border-stone-500 focus:ring focus:ring-stone-200 focus:ring-opacity-50" placeholder="Contoh: Dr. Supriadi, M.T.">
                            @error('nama')
                                <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-stone-100">
                            <a href="{{ route('dosen.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-stone-300 rounded-md font-semibold text-xs text-stone-700 uppercase tracking-widest shadow-sm hover:bg-stone-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500 transition ease-in-out duration-150">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-stone-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-stone-700 active:bg-stone-900 focus:outline-none focus:border-stone-900 focus:ring ring-stone-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>