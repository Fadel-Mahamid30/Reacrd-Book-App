@extends('dashboard.admin.template.dashboard_template')
@section('content')

<section class="w-full h-full">
    <div class="min-w-full">
        {{-- title  --}}
        <div class="w-full flex flex-col md:flex-row items-start md:items-center font-semibold justify-between mb-4">
            <h1 class="text-3xl font-semibold mb-4">Users</h1>
            
            {{-- form  --}}
            <form method="GET" action="" class="md:mb-0 mb-4 w-full md:max-w-[350px] flex flex-row items-center overflow-hidden rounded-md border border-gray-300">
                <select id="select" name="select" class="bg-gray-50 w-full border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    <option value="">All</option>
                    @foreach ($divisi as $row)
                        @if($row->id == "1" || $row->id == "2")
                            @php $continue; @endphp
			            @else
			            <option {{ ($row->id == $select ) ? "selected" : "" }} value="{{ $row->id }}">{{ $row->divisi }}</option>
                        @endif
                    @endforeach
                </select>
                <button type="submit" class="p-2.5  bg-primary text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[22px] h-[22px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>                          
                </button>
            </form>
        </div>

        {{-- table --}}
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="p-4">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Divisi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gender
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $rows => $row)
                        <tr class="bg-white border-b dark:bg-gray-800 hover:bg-gray-50">
                            <td class="w-4 p-4">
                                {{ $users->firstItem() + $rows }}
                            </td>
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                <img class="w-10 h-10 rounded-full" src="{{ asset($row->foto ?  '/storage' . '/' . $row->foto : '/img/user.png') }}" alt="Jese image">
                                <div class="pl-3">
                                    <div class="text-base font-semibold">{{ ucwords(strtolower($row->nama ? $row->nama : "User")) }}</div>
                                    <div class="font-normal text-gray-500">{{ $row->email ?? "-" }}</div>
                                </div>  
                            </th>
                            <td class="px-6 py-4">
                                {{ $row->divisi ? $row->divisi->divisi : "Invalid" }}
                            </td>
                            <td class="px-6 py-4">
                               {{ $row->jenis_kelamin ?? "-" }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="gap-2 grid grid-rows-1 grid-flow-col w-fit">
                                    <a href="{{ route('edit-user-profil', [$row->id]) }}" data-id="{{ $row->id }}" class="update-role-user px-1.5 py-1.5 bg-primary text-white cursor-pointer w-fit rounded-md">
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
                                    <button data-id="{{ $row->id }}" class="remove-user px-1.5 py-1.5 bg-red-500 text-white w-fit rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
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
        <div class="mb-8 mt-4">
            {{ $users->links() }}
        </div>
    </div>


    @foreach ($users as $row)
        <div id="small-modal-{{ $row->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow overflow-hidden">
                    <!-- Modal header -->
                    <div class="absolute w-full bg-primary h-[120px] top-0 left-0"></div>
                    <div class="flex items-center justify-between relative px-5 pt-5 rounded-t">
                        <button type="button" class="text-gray-400 bg-transparent rounded-full text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="small-modal-{{ $row->id }}">
                            <svg aria-hidden="true" class="w-6 h-6 fill-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="relative">
                        <div class="min-w-full relative scroll-px-1.5">
                            <div class="w-[150px] h-[150px] border-4 border-white mx-auto overflow-hidden rounded-full mb-4">
                                <img src="{{ asset($row->foto ?  '/storage' . '/' . $row->foto : '/img/user.png') }}" alt="" class="w-full h-full object-cover">
                            </div>
                            <div class="w-full pb-4">
                                <h1 class="w-full max-w-[352px] break-words mx-auto text-2xl font-semibold mb-1 text-center">{{ ucwords(strtolower($row->nama ? $row->nama : "User")) }}</h1>
                                <div class="w-fit mx-auto flex flex-row items-center text-primary text-grey-500 font-semibold text-base">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2">
                                        <path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 016 4.193V3.75zm6.5 0v.325a41.622 41.622 0 00-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25zM10 10a1 1 0 00-1 1v.01a1 1 0 001 1h.01a1 1 0 001-1V11a1 1 0 00-1-1H10z" clip-rule="evenodd" />
                                        <path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 01-9.274 0C3.985 17.585 3 16.402 3 15.055z" />
                                    </svg>                                     
                                    <span>{{ $row->divisi ? $row->divisi->divisi : "Invalid" }}</span>
                                </div>
                            </div>

                            <div class="min-w-full px-5 pt-4">
                                <table class="w-full">
                                    <tr class="text-base">
                                        <td class="pb-3 align-top"><p class="font-semibold break-words">Gender</p></td>
                                        <td class="pb-3 align-top"><p class="font-semibold break-words">&nbsp;:&nbsp;&nbsp;</p></td>
                                        <td class="pb-3 align-top"><p class="text-gray-500 w-full max-w-[269px] break-words">{{ ucwords(strtolower($row->jenis_kelamin ? $row->jenis_kelamin : "-")) }}</p></td>
                                    </tr>
                                    <tr class="text-base">
                                        <td class="pb-3 align-top"><p class="font-semibold break-words">Tgl. Lahir</p></td>
                                        <td class="pb-3 align-top"><p class="font-semibold break-words">&nbsp;:&nbsp;&nbsp;</p></td>
                                        <td class="pb-3 align-top"><p class="text-gray-500 w-full max-w-[269px] break-words">{{ $row->tanggal_lahir ? date_format(date_create($row->tanggal_lahir), "d M Y") : "-" }}</p></td>
                                    </tr>
                                    <tr class="text-base">
                                        <td class="pb-3 align-top"><p class="font-semibold break-words">Kontak</p></td>
                                        <td class="pb-3 align-top"><p class="font-semibold break-words">&nbsp;:&nbsp;&nbsp;</p></td>
                                        <td class="pb-3 align-top"><p class="text-gray-500 w-full max-w-[269px] break-words">{{ $row->kontak ? $row->kontak : "-"; }}</p></td>
                                    </tr>
                                    <tr class="text-base">
                                        <td class="pb-3 align-top"><p class="font-semibold break-words">Email</p></td>
                                        <td class="pb-3 align-top"><p class="font-semibold break-words">&nbsp;:&nbsp;&nbsp;</p></td>
                                        <td class="pb-3 align-top"><p class="text-gray-500 w-full max-w-[269px] break-words">{{ ucwords(strtolower($row->email ? $row->email : "-")) }}</p></td>
                                    </tr>
                                    <tr class="text-base">
                                        <td class="pb-3 align-top"><p class="font-semibold break-words">Alamat</p></td>
                                        <td class="pb-3 align-top"><p class="font-semibold break-words">&nbsp;:&nbsp;&nbsp;</p></td>
                                        <td class="pb-3 align-top"><p class="text-gray-500 w-full max-w-[269px] break-words">{{ ucwords(strtolower($row->alamat ? $row->alamat : "-")) }}</p></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center justify-end px-5 py-3 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="button" class="modal-logbook-close text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-base px-6 py-2.5 text-center" data-modal-hide="small-modal-{{ $row->id }}">Selesai</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</section>

<script src="{{ asset('/js/admin/dashboard.js') }}"></script>
<script src="{{ asset('/js/admin/remove_user.js') }}"></script>
<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
    @if(Session::has('failed'))
        toastr.error("{{ Session::get('failed') }}")
    @endif
</script>
@endsection