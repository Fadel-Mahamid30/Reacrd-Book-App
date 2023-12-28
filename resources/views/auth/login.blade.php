@extends('auth.template.template')
@section('content')

<section class="min-h-screen bg-white py-9 px-4 flex justify-center items-center">
    <div class="w-max-[337px] sm:w-[350px] h-auto p-8 bg-white">
        <div class="w-full h-full">
            <div class="logo w-full mb-4">
                <img src="/img/logo_radian.png" alt="" class="w-24 mx-auto">
            </div>
            <div class="w-full mb-4">
                <h1 class="text-[24px] font-semibold">Login</h1>
                <p class="text-sm text-secondary">Welcome back, please enter your details.</p>
            </div>
            <form action="{{ route('login') }}" method="POST" class="w-full">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" id="email" name="email" class="bg-gray-50 border @error('email') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('email') ?? '' }}" required>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="password"  id="password" name="password" class="bg-gray-50 border @error('password') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <p class="mt-2 text-sm">Forgot password? <a href="{{ route('lupa.password') }}" class="text-primary">Click here</a></p>
                </div>
                <button type="submit" class="w-full text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-base py-3 text-center">Login</button>
                <p class="mt-6 text-sm font-medium text-center">Don't have an account? <a href="{{ route('register') }}" class="text-primary">Sign up</a></p>
            </form>
        </div>
    </div>
</section>

<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>

@endsection