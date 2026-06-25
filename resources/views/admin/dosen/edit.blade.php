<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-stone-800 leading-tight">
            {{ __('Edit Data Dosen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-stone-200">
                <div class="p-6 text-stone-900">
                    <form action="{{ route('dosen.update', $dosen->nidn) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-medium text-stone-500">NIDN (Primary Key tidak dapat diubah)</label>
                            <input type="text" value="{{ $dosen->nidn }}" class="mt-1 block w-full rounded-md border-stone-200 bg-stone-50 text-stone-500 font-mono shadow-sm cursor-not-allowed" disabled>
                        </div>

                        <div>
                            <label for="nama" class="block text-sm font-medium text-stone-700">Nama Lengkap Dosen</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama', $dosen->nama) }}" class="mt-1 block w-full rounded-md border-stone-300 shadow-sm focus:border-stone-500 focus:ring focus:ring-stone-200 focus:ring-opacity-50">
                            @error('nama')
                                <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-stone-100">
                            <a href="{{ route('dosen.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-stone-300 rounded-md font-semibold text-xs text-stone-700 uppercase tracking-widest shadow-sm hover:bg-stone-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500 transition ease-in-out duration-150">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-amber-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700 focus:outline-none focus:border-amber-700 focus:ring ring-amber-200 disabled:opacity-25 transition ease-in-out duration-150">
                                Perbarui Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>