@extends('dashboard.admin.template.dashboard_template')
@section('content')

<section class="w-full h-full">
    <div class="min-w-full">
        {{-- title  --}}
        <div class="w-full p-4 md:p-6 bg-white border-t-4 border-primary rounded-md mb-4">
            <form action="" method="POST">
                @csrf
                <h1 class="text-2xl font-semibold mb-4">Divisi</h1>
                <div class="mb-4">
                    <label for="divisi" class="block mb-2 text-sm font-medium text-gray-900">Nama Divisi</label>
                    <input type="text" id="divisi" name="divisi" value="" class="bg-gray-50 border @error('divisi') border-red-400 @else border-gray-300 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    @error('divisi')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full flex sm:flex-row flex-col sm:justify-end gap-2">
                    <a href="{{ route('dashboard-admin-other') }}" class="bg-gray-400 text-white text-px-4 px-4 base py-3 text-center w-full sm:w-fit flex flex-row items-center justify-center font-medium rounded-md">
                        <span>Kembali</span>
                    </a>
                    <button type="submit" class="bg-primary text-white text-base py-3 px-4 text-center w-full sm:w-fit flex flex-row items-center justify-center font-medium rounded-md">
                        <span>Tambah</span>
                    </button>
                </div>
            </form>
        </div>

        {{-- table --}}
        <div class="overflow-x-auto mb-4">
            <table class="w-full min-w-[600px] text-base text-left text-gray-700 font-medium">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-[90px]">
                            No.
                        </th> 
                        <th scope="col" class="px-6 py-3">
                            Divisi
                        </th>
                        <th scope="col" class="px-6 py-3 w-[200px]">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($divisi as $rows => $row)
                        
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 align-top">
                                {{ $divisi->firstItem() + $rows }}
                            </td>
                            <td class="px-6 py-4 align-top">
                                {{ $row->divisi ?? "" }}
                            </td>
                            <td class="px-6 py-4 align-top w-fit">
                                <div class="gap-2 grid grid-rows-1 grid-flow-col w-fit">
                                    <button data-modal-target="small-modal-{{ $row->id }}" data-modal-toggle="small-modal-{{ $row->id }}" class="detail-logbook px-1.5 py-1.5 bg-primary text-white w-fit rounded-md" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>   
                                    </button>
                                    @if ($row->id == 1 || $row->id == 2) 
                                        <button data-id="{{ $row->id }}" class="cursor-not-allowed px-1.5 py-1.5 bg-red-300 text-white w-fit rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>                                                                                
                                        </button>
                                    @else
                                        <button data-id="{{ $row->id }}" class="remove_divisi px-1.5 py-1.5 bg-red-500 text-white w-fit rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>                                                                                
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>


                        {{-- modal update divisi  --}}
                        <div id="small-modal-{{ $row->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow">
                                    <!-- Modal header -->
                                    
                                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-medium text-gray-900">
                                            Update Divisi
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="small-modal-{{ $row->id }}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form action="{{ route('divisi-update', [$row->id]) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <div class="p-6 divide-y-2 h-fit divide-gray-200 overflow-y-auto">
                                            <div class="">
                                                <label for="divisi" class="block mb-2 text-sm font-medium text-gray-900">divisi</label>
                                                <input type="text" id="divisi" name="divisi_update" value="{{ $row->divisi ?? "" }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b">
                                            <div class="text-white bg-gray-400 hover:bg-gray-500 cursor-pointer font-medium rounded-md text-base px-6 py-2.5 text-center" data-modal-hide="small-modal-{{ $row->id }}">Batal</div>
                                            <button type="submit" class="modal-logbook-close text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-base px-6 py-2.5 text-center">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- pagination  --}}
        <div class="w-full mb-8">
            {{ $divisi->links() }}
        </div>
    </div>

<script src="{{ asset('/js/admin/dashboard.js') }}"></script>
<script src="{{ asset('/js/admin/divisi.js') }}"></script>
<script>
    function messageError(message) { 
        new swal({
            title: "Warning!",
            text: message,
            icon: "error",
        });
    }

    @error("divisi_update")
        messageError("{{ $message }}");
    @enderror

    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
    @if(Session::has('failed'))
        toastr.error("{{ Session::get('failed') }}")
    @endif
</script>
</section>
@endsection