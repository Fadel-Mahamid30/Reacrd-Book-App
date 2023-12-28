@extends('dashboard.pimpinan.template.dashboard_template')
@section('content')

{{-- <section class="w-full h-full grid grid-rows-1 10x70:grid-flow-col grid-flow-cols-2 gap-4 grid-flow-dense"> --}}
<section class="max-w-full h-full flex 10x70:flex-row flex-col items-start gap-4">
    <div id="profil" class="p-6 w-full flex-grow 10x70:max-w-[284px] bg-white rounded-md h-fit ">
        <div class="w-full flex flex-col 8x90:flex-row 10x70:flex-col items-start 8x90:items-center 10x70:items-start">
            <div class="w-full h-[250px] rounded-md overflow-hidden mb-6 8x90:mb-0 10x70:mb-6">
                <img src="{{ asset($user->foto ? 'storage/' . $user->foto : '/img/user.png') }}" alt="" class="h-full w-full object-cover">
            </div>
            <div id="text" class="ml-0 8x90:ml-4 10x70:ml-0 w-full">
                <div class="w-full mb-6">
                    <h1 class="text-2xl font-semibold mb-1">{{ $user->nama ?? "Admin" }}</h1>
                    <p class="text-lg font-semibold text-gray-500">{{ $user->divisi ? $user->divisi->divisi : "Invalid" }}</p>
                </div>

                <div class="w-full">
                    <div class="flex flex-row items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>                          
                        <p class="text-gray-500 font-medium break-words h-auto w-full max-w-[218px]">{{ $user->kontak ?? "-" }}</p>
                    </div>
                    <div class="w-full flex flex-row items-center">
                        <div class="w-6 h-6 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>                                     
                        </div>
                        <p class="text-gray-500 font-medium break-words h-auto w-fit 10x70:max-w-[218px]">{{ $user->email ?? "-" }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full">

        {{-- Notivication --}}
        @if(!$user->kontak || !$user->foto || !$user->jenis_kelamin || !$user->alamat)
            <div class="w-full h-fit py-4 px-6 rounded-r-md border-l-[4px] border-yellow-300 bg-white mb-4">
                <div class="items-center w-full flex flex-row mb-4">
                    <div class="w-8 h-8 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-yellow-300">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>                      
                    </div>
                    <p class="font-semibold break-words h-auto w-full max-w-[218px] text-xl">Warning</p>
                </div>

                <p class="text-base text-gray-500 mb-4">
                    Mohon diperhatikan bahwa profil yang lengkap sangat penting untuk memastikan keamanan dan keakuratan identitas Anda di layanan kami. 
                    Kami mohon untuk segera melengkapi profil Anda.
                </p>

                <div class="w-full flex justify-end h-auto">
                    <a href="{{ route('edit-profil') }}" class="px-10 py-[10px] font-medium text-base bg-yellow-300 rounded-md block">Lengkapi</a>
                </div>
            </div>
        @endif

        {{-- divisi --}}
        <div class="w-full min-w-full py-6 px-6 rounded-md bg-white mb-10">
            <div class="items-center w-full flex justify-between flex-col sm:flex-row mb-6">
                <p class="font-semibold break-words h-auto w-fit md:mb-0 mb-2 text-2xl">Best Karyawan</p>
            </div>
            <div class="overflow-x-auto mb-6 w-full">
                <table class="min-w-full w-full text-base text-left text-gray-700 font-medium">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ranking
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($user_ranking as $rows => $row)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">
                                    {{ $row["nama"] }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="flex flex-row items-end gap-2">
                                        <p>{{ $i++ }}</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z" clip-rule="evenodd" />
                                            <path d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                                        </svg>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
      
</section>

<script src="{{ asset('/js/admin/dashboard.js') }}"></script>
@endsection