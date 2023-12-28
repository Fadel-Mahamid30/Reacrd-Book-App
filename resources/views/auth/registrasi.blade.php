@extends('auth.template.template')
@section('content')

<section class="min-h-screen bg-white py-9 px-4 flex justify-center items-center">
    <div class="w-max-[337px] sm:w-[350px] h-auto p-8 bg-white">
        <div class="w-full h-full flex justify-center flex-col">
            <div class="logo w-full mb-4">
                <img src="/img/logo_radian.png" alt="" class="w-24 mx-auto">
            </div>
            <div class="w-full mb-4">
                <h1 class="text-[24px] font-semibold">Registrasi</h1>
                <p class="text-sm text-secondary">Sign up now to get started with an account.</p>
            </div>
            <form action="{{ route('register') }}" method="POST" class="w-full mb-0">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                    <input type="text" id=" nama" name="nama" class="bg-gray-50 border @error('nama') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('nama')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" id="email" name="email" class="bg-gray-50 border @error('email') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="password"  id="password" name="password" class="bg-gray-50 border @error('password') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                    <select id="divisi" name="divisi" class="bg-gray-50 border @error('divisi') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="" selected>Pilih divisi</option>
                        @foreach ($divisi as $row)
                            <option value="{{ $row['id'] }}">{{ $row["divisi"] }}</option>
                        @endforeach
                    </select>
                    @error('divisi')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-base py-3 text-center">Register</button>
                <p class="mt-6 text-sm font-medium text-center">Already have an account? <a href="{{ route('login') }}" class="text-primary">Log in</a></p>
            </form>
        </div>
    </div>
</section>

<script>
    @if(Session::has('failed'))
        toastr.error("{{ Session::get('failed') }}")
    @endif
</script>

@endsection