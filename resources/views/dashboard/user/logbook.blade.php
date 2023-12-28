@extends('dashboard.user.template.dashboard_template')
@section('content')

<section class="w-full h-full">
    <div class="min-w-full">
        {{-- title  --}}
        <h1 class="text-3xl font-semibold mb-4">Logbook</h1>
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
                <a href="{{ route('logbook-add') }}" class="px-5 py-2.5 w-full md:w-fit font-medium text-base bg-primary rounded-md sm:justify-start justify-center flex flex-row text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="flex-shrink-0 w-6 h-6 transition duration-75 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                    </svg>
                    <span>Logbook</span>
                </a>
            </div>
        </div>

        {{-- table --}}
        <div class="overflow-x-auto mb-4">
            <table class="w-full min-w-[600px] text-base text-left text-gray-700 font-medium">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Item Kerja
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logbook as $rows => $row)
                        
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 align-top">
                                {{ $logbook->firstItem() + $rows }}
                            </td>
                            <td class="px-6 py-4 align-top">
                                {{ date_format(date_create($row->tanggal_dibuat), "d M Y") }}
                            </td>
                            <td class="px-6 py-4 align-top">
                                {{ $row->logbook_notes->first()->item_kerja }}
                            </td>
                            <td class="px-6 py-4 align-top">
                                <div class="gap-2 grid grid-rows-1 grid-flow-col w-fit">
                                    <a href="{{ route('logbook-edit',[$row->id]) }}" class="edit-logbook px-1.5 py-1.5 bg-primary text-white w-fit rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>                                      
                                    </a>
                                    <button data-modal-target="small-modal-{{ $row->id }}" data-modal-toggle="small-modal-{{ $row->id }}" class="detail-logbook px-1.5 py-1.5 bg-blue-800 text-white w-fit rounded-md" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>  
                                    </button>
                                    <button data-id="{{ $row->id }}" class="remove_logbook px-1.5 py-1.5 bg-red-500 text-white w-fit rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>                                                                                
                                    </button>
                                </div>
                            </td>
                        </tr>


                        {{-- modal logbook  --}}
                        <div id="small-modal-{{ $row->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-medium text-gray-900">
                                            Tanggal: {{ date_format(date_create($row->tanggal_dibuat), "d M Y") }}
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="small-modal-{{ $row->id }}">
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
                                        <button type="button" class="modal-logbook-close text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-base px-6 py-2.5 text-center" data-modal-hide="small-modal-{{ $row->id }}">Selesai</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- pagination  --}}
        <div class="w-full mb-8">
            {{ $logbook->links() }}
        </div>
    </div>
</section>

<script src="{{ asset('/js/user/logbook.js') }}"></script>
<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
    @if(Session::has('failed'))
        toastr.error("{{ Session::get('failed') }}")
    @endif
</script>
@endsection