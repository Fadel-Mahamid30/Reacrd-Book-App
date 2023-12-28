@extends('auth.template.template')
@section('content')

<section class="flex pt-8 px-2 sm:px-0 sm:pt-0 justify-center sm:items-center items-start min-h-screen bg-gray-100">

    <div class="max-w-[424px] h-fit p-6 bg-white rounded-md">
        <div class="w-fit flex flex-row mb-6 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-primary mr-2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>      
            <p class="text-sm font-semibold">Radian Edu Solution</p>
        </div>
        <form action="{{ route('send.link') }}" method="POST" class="w-full mb-4">
            @csrf
            <div class="w-fit mb-6">
                <h1 class="text-2xl font-semibold mb-2">Lupa Password</h1>
                <p class="text-sm text-secondaryGray">
                    Masukkan alamat email yang terkait dengan akun Anda dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda.
                </p>
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" id="email" name="email" class="bg-gray-50 border @error('emai') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('email')
                    <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full rounded-md bg-primary text-white text-base py-3">Selanjutnya</button>
        </form>
        <span class="text-xs w-full flex justify-center">Don't have a account? <a href="{{ route('register') }}" class="text-primary">Sign Up</a></span>
    </div>


</section>
<script>
    // menampilkan pesan success
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif

    // menampilkan pesan failed
    @if(Session::has('failed'))
        toastr.error("{{ Session::get('failed') }}")
    @endif
</script>
@endsection