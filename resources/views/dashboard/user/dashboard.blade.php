@extends('dashboard.user.template.dashboard_template')
@section('content')
    
<section class="max-w-full h-full flex 10x70:flex-row flex-col items-start gap-4">
    <div id="profil" class="p-6 w-full flex-grow 10x70:max-w-[284px] bg-white rounded-md h-fit ">
        <div class="w-full flex flex-col 8x90:flex-row 10x70:flex-col items-start 8x90:items-center 10x70:items-start">
            <div class="w-full h-[250px] rounded-md overflow-hidden mb-6 8x90:mb-0 10x70:mb-6">
                <img src="{{ asset($user->foto ? 'storage/' . $user->foto : '/img/user.png') }}" alt="" class="h-full w-full object-cover">
            </div>
            <div id="text" class="ml-0 8x90:ml-4 10x70:ml-0 w-full">
                <div class="w-full mb-6">
                    <h1 class="text-2xl font-semibold mb-1">{{ ucwords(strtolower($user->nama ? $user->nama : "User")) }}</h1>
                    <p class="text-lg font-semibold text-gray-500">{{ $user->divisi ? $user->divisi->divisi : "Invalid" }}</p>
                </div>

                <div class="w-full">
                    <div class="flex flex-row items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>                          
                        <p class="text-gray-500 font-medium break-words h-auto w-full max-w-[218px]">{{ $user->kontak ? $user->kontak : "-"; }}</p>
                    </div>
                    <div class="w-full flex flex-row items-center">
                        <div class="w-6 h-6 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>                                     
                        </div>
                        <p class="text-gray-500 font-medium break-words h-auto w-fit 10x70:max-w-[218px]">{{ $user->email ? $user->email : "-"; }}</p>
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

        {{-- Riwayat Absesni --}}
        <div class="min-w-full w-full py-4 px-6 rounded-md bg-white mb-4">
            <p class="font-semibold break-words h-auto w-full max-w-[218px] text-2xl mb-4">Riwayat Absesni</p>
            <div class="items-center w-full flex justify-between flex-col sm:flex-row mb-4">
                <p class="data-bulan-ini font-semibold break-words h-auto w-full mb-2 sm:mb-0 text-xl"></p>
                <div class="sm:w-fit w-full h-auto">
                    <a href="{{ route('absensi-check') }}" class="px-5 py-3 w-full sm:w-fit font-medium text-base bg-primary rounded-md sm:justify-start justify-center flex flex-row text-white">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-6 h-6 mr-2 transition duration-75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                        </svg>
                        <span>Absensi</span>
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto mb-6">
                <div id="kalender-perminggu" class="min-w-[600px] w-full grid grid-rows-1 grid-flow-col overflow-hidden rounded-md border-2 border-gray-400 mb-6">
                </div>
            </div>
            <div class="overflow-x-auto mb-6">
                <table class="w-full min-w-[500px] text-base text-left text-gray-700 font-medium">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absensi as $rows => $row)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">
                                    {{ $absensi->firstItem() + $rows }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $row->status_absensi }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date_format(date_create($row->tanggal), "d M Y") }}
                                </td>
                                <td class="px-6 py-4">
                                    <button data-id="{{ $row->id }}" class="detail-absensi px-1.5 py-1.5 bg-blue-800 text-white w-fit rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>                                      
                                    </button>
                                </td>
                             </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <div class="w-full flex justify-center h-auto">
                <div class="w-fit h-auto">
                    <a href="{{ route('absensi-user') }}" class="font-medium text-base text-primary items-center rounded-md flex flex-row">
                        <span class="mr-2">Read More</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Riwayat Logbook --}}
        <div class="w-full py-4 px-6 rounded-md bg-white mb-10">
            <p class="font-semibold break-words h-auto w-full max-w-[218px] text-2xl mb-4">Riwayat Logbook</p>
            <div class="items-center w-full flex justify-between flex-col sm:flex-row mb-4">
                <p class="data-bulan-ini font-semibold break-words h-auto w-full mb-2 sm:mb-0 text-xl"></p>
                <div class="sm:w-fit w-full h-auto">
                    <a href="{{ route('logbook-add') }}" class="px-5 py-3 w-full sm:w-fit font-medium text-base bg-primary rounded-md sm:justify-start justify-center flex flex-row text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="flex-shrink-0 w-6 h-6 transition duration-75 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                        </svg>
                        <span>Logbook</span>
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto mb-6">
                <table class="min-w-full text-base text-left text-gray-700 font-medium">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logbook as $rows => $row)
                            
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">
                                    {{ $logbook->firstItem() + $rows }}
                                </td>
                                <td class="px-6 py-4">
                                    Logbook
                                </td>
                                <td class="px-6 py-4">
                                    {{ date_format(date_create($row->tanggal_dibuat), "d M Y") }}
                                </td>
                                <td class="px-6 py-4">
                                    {{-- <button class="detail-logbook px-1.5 py-1.5 bg-blue-800 text-white w-fit rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>                                      
                                    </button> --}}
                                    <button data-modal-target="modal-logbook-{{ $row->id }}" data-modal-toggle="modal-logbook-{{ $row->id }}" class="detail-logbook px-1.5 py-1.5 bg-blue-800 text-white w-fit rounded-md" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>  
                                    </button>
                                </td>
                            </tr>

                            {{-- modal logbook  --}}
                            <div id="modal-logbook-{{ $row->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-medium text-gray-900">
                                                Tanggal: {{ date_format(date_create($row->tanggal_dibuat), "d M Y") }}
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="modal-logbook-{{ $row->id }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-6 divide-y-2 h-[380px] divide-gray-200 overflow-y-auto">
                                            @php $i = 0; @endphp
                                            @foreach ($row->logbook_notes as $note)
                                                <div class="w-full @if($i == 0) pb-4 @else pb-4 pt-4  @endif">
                                                    <div class="mb-2">
                                                        <p class="text-base text-primary font-semibold mb-2">Item Kerja</p>
                                                        <p class="text-base leading-relaxed text-gray-500 ">
                                                            {{ $note->item_kerja }}
                                                        </p>
                                                    </div>
                                                    <div class="mb-0">
                                                        <p class="text-base text-primary font-semibold mb-2">Deskripsi</p>
                                                        <p class="text-base leading-relaxed text-gray-500 ">
                                                            {{ $note->deskripsi }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @php $i++ @endphp
                                            @endforeach
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b">
                                            <button type="button" class="modal-logbook-close text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-base px-6 py-2.5 text-center" data-modal-hide="modal-logbook-{{ $row->id }}">Selesai</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="w-full flex justify-center h-auto">
                <div class="w-fit h-auto">
                    <a href="{{ route('logbook-user') }}" class="font-medium text-base text-primary items-center rounded-md flex flex-row">
                        <span class="mr-2">Read More</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
      
    {{-- modal absensi  --}}
    <div id="modal-absensi" tabindex="-1" class="fixed inset-0 bg-gray-500 bg-opacity-75 z-50 px-4 hidden">
        <div class="flex justify-center items-center w-full h-full">
            <div class="modal-absensi-close absolute w-full h-full"></div>
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    
                    <div class="flex items-center justify-between py-4 px-6 border-b rounded-t">
                        <h3 id="modal-tanggal" class="text-lg font-medium text-gray-900"></h3>
                        <button type="button" class="modal-absensi-close text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    
                    <div class="px-6 py-4 ">
                        {{-- map  --}}
                        <div id="view-map" class="h-52 bg-gray-500 mb-4"></div>
                        <div id="modal-body-absen" class="grid sm:grid-cols-3 grid-cols-2 gap-4">
                            <div class="w-fit">
                                <p class="text-sm font-medium mb-2">Status</p>
                                <div class="bg-green-100 text-green-500 w-fit flex flex-row items-center rounded-full py-2 px-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm font-medium" id="modal-status"></span>
                                </div>
                            </div>
                            <div class="w-fit">
                                <p class="text-sm font-medium mb-2">Shift</p>
                                <div class="bg-blue-100 text-primary w-fit flex flex-row items-center rounded-full py-2 px-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                    </svg>                                      
                                    <span class="text-sm font-medium" id="modal-shift"></span>
                                </div>
                            </div>
                            <div class="w-fit">
                                <p class="text-sm font-medium mb-2">Tempat kerja</p>
                                <div class="bg-blue-100 text-primary w-fit flex flex-row items-center rounded-full py-2 px-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>                                      
                                    <span class="text-sm font-medium" id="modal-tmp-kerja"></span>
                                </div>
                            </div>
                            <div class="w-fit">
                                <p class="text-sm font-medium mb-2">Jam Masuk</p>
                                <div class="bg-blue-100 text-primary w-fit flex flex-row items-center rounded-full py-2 px-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm font-medium" id="modal-jam-masuk"></span>
                                </div>
                            </div>
                            <div class="w-fit">
                                <p class="text-sm font-medium mb-2">Jam Keluar</p>
                                <div class="bg-blue-100 text-primary w-fit flex flex-row items-center rounded-full py-2 px-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm font-medium" id="modal-jam-keluar"></span>
                                </div>
                            </div>
                            <div class="w-fit">
                                <p class="text-sm font-medium mb-2">Terlambat</p>
                                <div id="parent-terlambat" class="w-fit flex flex-row items-center rounded-full py-2 px-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>                                 
                                    <span class="text-sm font-medium" id="modal-terlambat"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center justify-end py-3 px-6 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="button" class="modal-absensi-close text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-base px-6 py-2.5 text-center ">Selesai</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('/js/user/dashboard.js') }}"></script>
<script src="{{ asset('/js/user/absensi.js') }}"></script>

@endsection