@extends('dashboard.user.template.default_template')
@section('content')

<section class="min-h-screen flex justify-center items-center px-4 py-10 bg-gray-100">

    <div class="max-w-[450px] w-full mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Logbook</h1>
        <form action="{{ route('logbook-add') }}" method="POST">
        @csrf
            <div class="w-full bg-white rounded-md h-auto p-6 border-t-4 border-primary mb-2">
                <div id="mb-0">
                    <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="bg-gray-50 border @error('tanggal') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required value="{{ old('tanggal') }}">
                    @error("tanggal")
                    <p class="text-sm text-red-500 font-semibold mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
    
            <div class="w-full bg-white rounded-md h-auto p-6">
                <div class="flex w-full justify-end mb-1">
                    <div id="add-input" class="cursor-pointer text-white bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" clip-rule="evenodd" />
                        </svg>                          
                        <span>Tambah</span>
                    </div>
                </div>
    
                <div class="w-full">
                    <div id="input">
                        <div class="hidden">
                            <input type="text" name="index[]" value="******">
                        </div>
        
                        <div id="mb-0">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Item Kerja</label>
                            <input type="text" name="item_kerja[]" id="item_kerja" class="bg-gray-50 border @error('item_kerja.0') border-red-500 @else border-gray-300 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required value="{{ old('item_kerja.0') }}">
                            @error("item_kerja.0")
                                <p class="text-sm text-red-500 font-semibold mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
            
                        <div class="mb-6 mt-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                            <textarea name="deskripsi[]" id="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border @error('deskripsi.0') border-red-500 @else border-gray-300 @enderror  focus:ring-blue-500 focus:border-blue-500" required >{{ old('deskripsi.0') }}</textarea>
                            @error("deskripsi.0")
                                <p class="text-sm text-red-500 font-semibold mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    @if(old("index"))
                        @php for ($i=1; $i < count(old('index')); $i++) : @endphp
                        
                            <div class="input_list w-full border-default-background pt-6">
                                <div class="hidden">
                                    <input type="text" name="index[]" value="******">
                                </div>
                
                                <div id="mb-0">
                                    <div class="w-full flex justify-between items-end">
                                        <div class="w-full flex flex-row justify-between items-start">
                                            <label class="block mb-2 text-sm font-medium text-gray-900">Item Kerja</label>
                                            <div class="w-fit remove-input-logbook cursor-pointer text-red-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>                               
                                            </div>
                                        </div>
                                        <button id="delete_inputs" class="text-3xl text-red-700"><ion-icon name="close-circle"></ion-icon></button>
                                    </div>
                                    <input type="text" name="item_kerja[]" id="item_kerja" class="bg-gray-50 border @error('item_kerja.' . $i) border-red-500 @else border-gray-300 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required value="{{ old('item_kerja.' . $i) }}">
                                    @error("item_kerja." . $i)
                                        <p class="text-sm text-red-500 font-semibold mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                    
                                <div class="mb-6 mt-4">
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                                    <textarea name="deskripsi[]" id="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border @error('deskripsi.' . $i) border-red-500 @else border-gray-300 @enderror  focus:ring-blue-500 focus:border-blue-500" required>{{ old('deskripsi.' . $i) }}</textarea>
                                    @error("deskripsi." . $i)
                                        <p class="text-sm text-red-500 font-semibold mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            
                        @php endfor @endphp
                    @endif
                    <div id="put_inputs"></div>
                </div>
                <div class="w-full flex flex-col-reverse sm:flex-row gap-2">
                    <a href="{{ route('logbook-user') }}" class="bg-gray-400 text-white text-base py-3 text-center w-full sm:w-1/2 flex flex-row items-center justify-center font-medium rounded-md">
                        <span>Kembali</span>
                    </a>
                    <button type="submit" class="bg-primary text-white text-base py-3 text-center w-full sm:w-1/2 flex flex-row items-center justify-center font-medium rounded-md">
                        <span>Tambah</span>
                    </button>
                </div>
            </div>
            
        </form>

    </div>

    {{-- clone input  --}}
    <div id="add_input" class="hidden">
        <div class="logbook-list-input w-full border-default-background pt-6">
            <div class="hidden">
                <input type="text" name="index[]" value="******">
            </div>

            <div id="mb-0">
                <div class="w-full flex justify-between items-end">
                    <div class="w-full flex flex-row justify-between items-start">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Item Kerja</label>
                        <div class="w-fit remove-input-logbook cursor-pointer text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>                               
                        </div>
                    </div>
                    <button id="delete_inputs" class="text-3xl text-red-700"><ion-icon name="close-circle"></ion-icon></button>
                </div>
                <input type="text" name="item_kerja[]" id="item_kerja" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>

            <div class="mb-6 mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                <textarea name="deskripsi[]" id="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required></textarea>
            </div>
        </div>
    </div>
    
</section>

<script src="/js/user/logbook_form.js"></script>
<script>
    @if(Session::has('success'))
        toastr.error("{{ Session::get('success') }}")
    @endif
    @if(Session::has('failed'))
        toastr.error("{{ Session::get('failed') }}")
    @endif
</script>
@endsection