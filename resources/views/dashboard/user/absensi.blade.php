@extends('dashboard.user.template.dashboard_template')
@section('content')

<section class="w-full h-full">
    <div class="min-w-full">
        {{-- title  --}}
        <h1 class="text-3xl font-semibold mb-4">Absensi</h1>

        {{-- keterangan --}}
        <div class="w-full flex flex-col md:flex-row items-center gap-6 mb-6">
            <div class="w-full md:w-1/2 rounded-md px-4 py-7 bg-white flex flex-row items-center gap-4">
                
                {{-- icon  --}}
                <div class="w-fit p-4 bg-blue-100 text-primary rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                        <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                    </svg>  
                </div>

                {{-- text  --}}
                <div class="w-full h-fit">
                    <p class="text-base font-medium text-gray-500">Sakit Atau Izin</p>
                    <span class="flex flex-row items-end text-primary gap-2">
                        <h1 class="text-4xl font-bold">{{ $status_sk_iz }}</h1>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z" clip-rule="evenodd" />
                            <path d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                        </svg>
                    </span>
                </div>

            </div>

            <div class="w-full md:w-1/2 rounded-md px-4 py-7 bg-white flex flex-row items-center gap-4">
                
                {{-- icon  --}}
                <div class="w-fit p-4 bg-red-100 text-red-500 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-2.625 6c-.54 0-.828.419-.936.634a1.96 1.96 0 00-.189.866c0 .298.059.605.189.866.108.215.395.634.936.634.54 0 .828-.419.936-.634.13-.26.189-.568.189-.866 0-.298-.059-.605-.189-.866-.108-.215-.395-.634-.936-.634zm4.314.634c.108-.215.395-.634.936-.634.54 0 .828.419.936.634.13.26.189.568.189.866 0 .298-.059.605-.189.866-.108.215-.395.634-.936.634-.54 0-.828-.419-.936-.634a1.96 1.96 0 01-.189-.866c0-.298.059-.605.189-.866zm-4.34 7.964a.75.75 0 01-1.061-1.06 5.236 5.236 0 013.73-1.538 5.236 5.236 0 013.695 1.538.75.75 0 11-1.061 1.06 3.736 3.736 0 00-2.639-1.098 3.736 3.736 0 00-2.664 1.098z" clip-rule="evenodd" />
                    </svg>  
                </div>

                {{-- text  --}}
                <div class="w-full h-fit">
                    <p class="text-base font-medium text-gray-500">Terlambat</p>
                    <span class="flex flex-row items-end text-red-500 gap-2">
                        <h1 class="text-4xl font-bold">{{ $terlambat }}</h1>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z" clip-rule="evenodd" />
                            <path d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                        </svg>
                    </span>
                </div>

            </div>
        </div>

        <div class="w-full flex flex-col md:flex-row items-center font-semibold justify-between mb-4">
            {{-- form  --}}
            <form method="GET" action="" class="md:mb-0 mb-4 w-full md:max-w-[350px] flex flex-row items-center overflow-hidden rounded-md border border-gray-300">
                <select id="bulan" name="bulan" class="bg-gray-50 w-full border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    @foreach ($bulan as $row)
                        <option {{ ($row["id"] == $inp_bulan) ? "selected" : ""; }} value="{{ $row["id"] }}">{{ $row["bulan"] }}</option>
                    @endforeach
                </select>
                <input type="number" id="tahun" name="tahun" class="bg-gray-50 w-full border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-2.5" value="{{ $inp_tahun ?? "0"; }}">
                <button type="submit" class="p-2.5  bg-primary text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[22px] h-[22px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>                          
                </button>
            </form>

            {{-- button to absensi  --}}
            <div class="md:w-fit w-full h-auto">
                <a href="{{ route('absensi-check') }}" class="px-5 py-2.5 w-full md:w-fit font-medium text-base bg-primary rounded-md justify-center flex flex-row text-white">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-6 h-6 mr-2 transition duration-75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                    </svg>
                    <span>Absensi</span>
                </a>
            </div>
        </div>

        {{-- table --}}
        <div class="overflow-x-auto mb-4">
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
                            Jam Masuk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jam Keluar
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
                                <div class="flex items-center flex-row">
                                    {{ $row->jam_masuk ? substr($row->jam_masuk, 0, strlen($row->jam_masuk) - 3) : "-" }}
                                    @if ($row->terlambat !== 0)
                                        <div class="rounded-full w-4 h-4 ml-2 bg-red-500"></div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                {{ $row->jam_keluar ? substr($row->jam_keluar, 0, strlen($row->jam_keluar) - 3) : "-" }}
                            </td>
                            <td class="px-6 py-4 w-fit">
                                <div class="gap-2 grid grid-rows-1 grid-flow-col w-fit">
                                    <button data-id="{{ $row->id }}" class="detail-absensi px-1.5 py-1.5 bg-blue-800 text-white w-fit rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>                                      
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>

        {{-- pagination  --}}
        <div class="w-full mb-8">
            {{ $absensi->links() }}
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

<script src="{{ asset('/js/user/absensi.js') }}"></script>
<script>

    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
    @if(Session::has('failed'))
        toastr.error("{{ Session::get('failed') }}")
    @endif

    function info(message) { 
        new swal({
            title: "Warning!",
            text: message,
            icon: "warning",
        });
    }

    @if(Session::has('info'))
        info("{{ Session::get('info') }}");
    @endif

</script>
@endsection