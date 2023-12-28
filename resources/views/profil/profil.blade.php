@extends('profil.template.template')
@section('content')
<section class="min-h-screen bg-gray-100 py-9 px-4 flex justify-center items-center relative">
    <div class="relative w-full max-w-[450px] rounded-md overflow-hidden h-auto p-6 bg-white">
        <div class="absolute w-full bg-primary h-[120px] top-0 left-0"></div>
        <div class="min-w-full relative">
            <div class="w-[150px] h-[150px] border-4 border-white mx-auto overflow-hidden rounded-full mb-4">
                <img src="{{ asset($user->foto ?  '/storage' . '/' . $user->foto : '/img/user.png') }}" alt="" class="w-full h-full object-cover">
            </div>
            <div class="w-full pb-4 border-b-2 border-gray-200">
                <h1 class="w-full max-w-[352px] break-words mx-auto text-2xl font-semibold mb-2 text-center">{{ ucwords(strtolower($user->nama ? $user->nama : "User")) }}</h1>
                <div class="w-fit mx-auto flex flex-row items-center text-primary text-grey-500 font-semibold text-base">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2">
                        <path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 016 4.193V3.75zm6.5 0v.325a41.622 41.622 0 00-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25zM10 10a1 1 0 00-1 1v.01a1 1 0 001 1h.01a1 1 0 001-1V11a1 1 0 00-1-1H10z" clip-rule="evenodd" />
                        <path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 01-9.274 0C3.985 17.585 3 16.402 3 15.055z" />
                    </svg>                                     
                    <span>{{ $user->divisi ? $user->divisi->divisi : "Invalid" }}</span>
                </div>
            </div>

            <div class="min-w-full pt-6 mb-4">
                <table class="w-full">
                    <tr class="text-base">
                        <td class="pb-3 align-top"><p class="font-semibold break-words">Gender</p></td>
                        <td class="pb-3 align-top"><p class="font-semibold break-words">&nbsp;:&nbsp;&nbsp;</p></td>
                        <td class="pb-3 align-top"><p class="text-gray-500 w-full max-w-[269px] break-words">{{ ucwords(strtolower($user->jenis_kelamin ? $user->jenis_kelamin : "-")) }}</p></td>
                    </tr>
                    <tr class="text-base">
                        <td class="pb-3 align-top"><p class="font-semibold break-words">Tgl. Lahir</p></td>
                        <td class="pb-3 align-top"><p class="font-semibold break-words">&nbsp;:&nbsp;&nbsp;</p></td>
                        <td class="pb-3 align-top"><p class="text-gray-500 w-full max-w-[269px] break-words">{{ $user->tanggal_lahir ? date_format(date_create($user->tanggal_lahir), "d M Y") : "-" }}</p></td>
                    </tr>
                    <tr class="text-base">
                        <td class="pb-3 align-top"><p class="font-semibold break-words">Kontak</p></td>
                        <td class="pb-3 align-top"><p class="font-semibold break-words">&nbsp;:&nbsp;&nbsp;</p></td>
                        <td class="pb-3 align-top"><p class="text-gray-500 w-full max-w-[269px] break-words">{{ $user->kontak ? $user->kontak : "-"; }}</p></td>
                    </tr>
                    <tr class="text-base">
                        <td class="pb-3 align-top"><p class="font-semibold break-words">Email</p></td>
                        <td class="pb-3 align-top"><p class="font-semibold break-words">&nbsp;:&nbsp;&nbsp;</p></td>
                        <td class="pb-3 align-top"><p class="text-gray-500 w-full max-w-[269px] break-words">{{ ucwords(strtolower($user->email ? $user->email : "-")) }}</p></td>
                    </tr>
                    <tr class="text-base">
                        <td class="pb-3 align-top"><p class="font-semibold break-words">Alamat</p></td>
                        <td class="pb-3 align-top"><p class="font-semibold break-words">&nbsp;:&nbsp;&nbsp;</p></td>
                        <td class="pb-3 align-top"><p class="text-gray-500 w-full max-w-[269px] break-words">{{ ucwords(strtolower($user->alamat ? $user->alamat : "-")) }}</p></td>
                    </tr>
                </table>
            </div>

            <div class="w-full flex flex-col-reverse sm:flex-row gap-2">
                <a href="{{ route('check-user-role') }}" class="bg-gray-400 text-white text-base py-3 text-center w-full sm:w-1/2 flex flex-row items-center justify-center font-medium rounded-md">
                    <span>Kembali</span>
                </a>
                <a href="{{ route('edit-profil') }}" class="bg-primary text-white text-base py-3 text-center w-full sm:w-1/2 flex flex-row items-center justify-center font-medium rounded-md">
                    <span>Edit</span>
                </a>
            </div>
        </div>
    </div>
</section>
<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
    @if(Session::has('failed'))
        toastr.error("{{ Session::get('failed') }}")
    @endif
</script>
@endsection