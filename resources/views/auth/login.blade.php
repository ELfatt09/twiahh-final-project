<x-guest-layout>
        <div class="p-8 w-full md:w-96" style="background-color: #FFFFFF;">
            <h2 class="text-2xl font-semibold text-gray-800">Login to Continue</h2>
            <p class="text-gray-500 mb-6">Welcome Back</p>
            <form class="space-y-4" method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Username/Email</label>
                    <input type="text" id="email"  name="email" class="shadow appearance-none border border-primary rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-secondary" placeholder="Username or Gmail">
                </div>
                <div>
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password" class="shadow appearance-none border border-primary rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-secondary" placeholder="Password">
                </div>
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input name="remember" type="checkbox" class="form-checkbox h-4 w-4 text-primary bg-primary from-primary">
                        <span class="ml-2 text-gray-700 text-sm">Remember me</span>
                    </label>
                    <a href="#" class="text-secondary text-sm hover:underline">Forgot password?</a>
                </div>
                <button type="submit" class="text-black border border-primary py-2 px-4 rounded focus:outline-none focus:ring-0 focus:bg-secondary w-full bg-primary hover:border-secondary hover:bg-transparent hover:text-secondary transition">
                    Sign In
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
                Not have an account yet? <a href="{{ route('register') }}" class="text-secondary hover:underline">Sign in here</a>
            </p>
        </div>
</x-guest-layout>

