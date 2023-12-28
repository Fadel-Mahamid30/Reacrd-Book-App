@extends('dashboard.admin.template.default_template')
@section('content')
<section class="min-h-screen bg-gray-100 py-9 px-4 flex justify-center items-center relative">
    <div class="relative w-full max-w-[400px] rounded-md overflow-hidden h-auto p-6 bg-white">
        <div class="absolute w-full bg-primary h-[120px] top-0 left-0"></div>
        <div class="min-w-full relative block">
            <div class="relative w-fit h-fit mx-auto mb-6">
                <div class="w-[150px] h-[150px] border-4 border-white mx-auto overflow-hidden rounded-full">
                    <img id="foto-profil" src="{{ asset($user->foto ? '/storage' . '/' . $user->foto : '/img/user.png') }}" alt="" class="w-full h-full object-cover">
                </div>
                <label for="input-foto-profil" class="absolute bottom-0 right-0 rounded-full p-3 cursor-pointer bg-primary flex text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                    </svg>                      
                </label>
            </div>
            <div class="max-w-[400px]">
                <form action="{{ route('update-user-profil') }}" method="POST" class="" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id ?? "" }}">
                    <input type="file" id="input-foto-profil" class="hidden" name="foto">
                    <div class="mb-4">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') ?? $user->nama }}" class="bg-gray-50 border @error('nama') border-red-400 @else border-gray-300 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('nama')
                            <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        @php $role = $user->roles->first()->name; @endphp
                        <label for="divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                        <select id="divisi" name="divisi" class="bg-gray-50 border @error('divisi') border-red-400 @else border-gray-300 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @if ($role == "pimpinan")
                                <option selected value="1">Pimpinan</option>
                            @elseif ($role == "admin")
                                <option selected value="2">Admin</option>
                            @else
                                @foreach ($divisi as $row)
                                    <option {{ ((old("divisi") ?? $row["id"]) == $user->divisi_id) ? "selected" : "" }} value="{{ $row['id'] }}">{{ $row["divisi"] }}</option>
                                @endforeach
                            @endif
 
                        </select>
                        @error('divisi')
                            <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
                        <select id="gender" name="gender" class="bg-gray-50 border @error('gender') border-red-400 @else border-gray-300 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option {{ ((old('gender') ?? $user->jenis_kelamin) == "Pria") ? "selected" : ""; }} value="Pria">Pria</option>
                            <option {{ ((old('gender') ?? $user->jenis_kelamin) == "Wanita") ? "selected" : ""; }} value="Wanita">Wanita</option>
                        </select>
                        @error('gender')
                            <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
		            <div class="mb-4">
                        <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') ?? $user->tanggal_lahir }}" class="bg-gray-50 border @error('tanggal_lahir') border-red-400 @else border-gray-300 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        @error('tanggal_lahir')
                            <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="kontak" class="block mb-2 text-sm font-medium text-gray-900">Kontak</label>
                        <input type="text" id="kontak" name="kontak" pattern="[0]{1}[0-9]{8,12}" value="{{ old('kontak') ?? $user->kontak }}" class="bg-gray-50 border @error('kontak') border-red-400 @else border-gray-300 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('kontak')
                            <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-8">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                        <textarea id="alamat" name="alamat" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border @error('alamat') border-red-400 @else border-gray-300 @enderror  focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis alamat kamu disini....">{{ old('alamat') ?? $user->alamat }}</textarea>
                        @error('alamat')
                            <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full flex flex-col-reverse sm:flex-row gap-2">
                        <a href="{{ route('dashboard-users-admin') }}" class="bg-gray-400 text-white text-base py-3 text-center w-full sm:w-1/2 flex flex-row items-center justify-center font-medium rounded-md">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                            </svg>                            --}}
                            <span>Kembali</span>
                        </a>
                        <button type="submit" class="bg-primary text-white text-base py-3 text-center w-full sm:w-1/2 flex flex-row items-center justify-center font-medium rounded-md">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>       --}}
                            <span>Edit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('/js/profil/edit_profil.js') }}"></script>
<script>

    function imageError(message) { 
        new swal({
            title: "Warning!",
            text: message,
            icon: "error",
        });
    }

    @error("foto")
        imageError("{{ $message }}");
    @enderror

</script>
@endsection