<x-guest-layout>
    <div class="w-full max-w-sm bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
        
        <div class="bg-[#1e293b] p-6 text-center">
            <div class="text-3xl mb-2">🎓</div>
            <h2 class="text-xl font-bold text-white tracking-wide">SIAKAD</h2>
            <p class="text-gray-400 text-xs">Silakan masuk ke akun Anda</p>
        </div>

        <div class="p-6">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 focus:border-blue-500 outline-none">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 focus:border-blue-500 outline-none">
                </div>

                <div class="flex items-center justify-between mb-5">
                    <label class="flex items-center text-xs text-gray-600">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-1.5">Remember me</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-xs font-medium text-blue-600 hover:text-blue-800 underline">
                        Forgot your password?
                    </a>
                </div>

                <button type="submit" class="w-full py-2.5 bg-[#1e293b] hover:bg-slate-800 text-white text-sm font-bold rounded-lg transition-all shadow-md">
                    LOG IN
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>