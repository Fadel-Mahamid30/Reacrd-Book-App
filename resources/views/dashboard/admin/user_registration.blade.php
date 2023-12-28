@extends('dashboard.admin.template.dashboard_template')
@section('content')

<section class="w-full h-full">
    <div class="min-w-full">
        {{-- title  --}}
        <div class="w-full flex flex-col md:flex-row items-start md:items-center font-semibold justify-between mb-4">
            <h1 class="text-3xl font-semibold mb-4">Users Registration</h1>
            
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
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Divisi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $rows => $row)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 align-top">
                                {{ $users->firstItem() + $rows }}
                            </td>
                            <td class="px-6 py-4 align-top">
                                {{ ucwords(strtolower($row->nama ? $row->nama : "User")) }}
                            </td>
                            <td class="px-6 py-4 align-top">
                                {{ $row->email ?? "" }}
                            </td>
                            <td class="px-6 py-4 align-top">
                                {{ $row->divisi ? $row->divisi->divisi : "Invalid" }}
                            </td>
                            <td class="px-6 py-4 align-top">
                                <div class="gap-2 grid grid-rows-1 grid-flow-col w-fit">
                                    <button data-id="{{ $row->id }}" class="active-user px-1.5 py-1.5 bg-primary text-white w-fit rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
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
</section>

<script src="{{ asset('/js/admin/dashboard.js') }}"></script>
<script src="{{ asset('/js/admin/remove_user.js') }}"></script>
<script src="{{ asset('/js/admin/active_user.js') }}"></script>
@endsection