<x-guest-layout>
        <div class="p-8 w-full md:w-96" style="background-color: #FFFFFF;">
            <h2 class="text-2xl font-semibold text-gray-800">Create Your Account</h2>
            <form class="space-y-4" method="POST" action="{{ route('register') }}">
                @method('POST')
                @csrf
                <div>
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                    <input type="text" id="name"  name="name" class="shadow appearance-none border border-primary rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-secondary" placeholder="Username">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="text" id="email"  name="email" class="shadow appearance-none border border-primary rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-secondary" placeholder="Gmail Address">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password" class="shadow appearance-none border border-primary rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-secondary" placeholder="Password">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="shadow appearance-none border border-primary rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-secondary" placeholder="Confirm Password">
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="text-black border border-primary py-2 px-4 rounded focus:outline-none focus:ring-0 focus:bg-secondary w-full bg-primary hover:border-secondary hover:bg-transparent hover:text-secondary transition">
                    Sign Up
                </button>
            </form>
            <div class="mt-4 text-center text-gray-600">
                <div class="flex flex-col justify-center items-center space-x-4 mt-2">
                    <span class="flex justify-center my-4 border-b border-primary w-full"></span>
                    <div class="text-2xl">
                        <i class="fa-solid fa-phone text-primary hover:text-secondary transition"></i>
                        <i class="ml-2 fa-brands fa-google text-primary hover:text-secondary transition"></i>
                    </div>
                </div>
            </div>
            <p class="mt-6 text-center text-gray-600 text-sm">
                Already have an account yet? <a href="{{ route('login') }}" class="text-secondary hover:underline">Sign in here</a>
            </p>
        </div>
</x-guest-layout>

