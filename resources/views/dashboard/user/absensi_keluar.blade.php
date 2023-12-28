@extends('dashboard.user.template.default_template')
@section('content')

<section class="min-h-screen flex justify-center items-center px-4 py-10 bg-gray-100">

    <div class="w-full max-w-[430px]">
        <h1 class="text-2xl font-semibold mb-4">Absensi Keluar</h1>
        <div class="border-t-4 border-primary bg-white rounded-md w-full p-4 sm:p-6">
            <div id="map" frameborder="0" class="bg-gray-400 rounded-md h-[200px] w-full mb-4 relative">
            </div>
            <form action="{{ route('absensi-keluar', [$absen->id]) }}" method="POST" class="w-full">
                @csrf
                <input type="text" id="latitude" name="latitude" value="{{ $absen->latitude }}" class="hidden" disabled>
                <input type="text" id="longitude" name="longitude" value="{{ $absen->longitude }}" class="hidden" disabled>
                <input type="time" id="inputWaktu" name="jam_keluar" value="" class="hidden" required>
                <input type="date" id="inputTanggal" name="tanggal" value="{{ $absen->tanggal }}" class="hidden" disabled>
    
                <div class="mb-4">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                    <select id="status" name="status_absen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" disabled>
                        <option {{ ($absen->status_absensi == "Hadir" ) ? "selected" : ""  }} value="Hadir">Hadir</option>
                        <option {{ ($absen->status_absensi == "Izin" ) ? "selected" : ""  }} value="Izin">Izin</option>
                        <option {{ ($absen->status_absensi == "Sakit" ) ? "selected" : ""  }} value="Sakit">Sakit</option>
                    </select>
                    @error('status')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="shift" class="block mb-2 text-sm font-medium text-gray-900">shift</label>
                    <select id="shift" name="shift" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" disabled>
                        @foreach ($shift as $row)
                            <option {{ ($absen->shift_id == $row->id) ? "selected" : "" }} value="{{ $row->id }}">{{ $row->shift . " (" . substr($row->jam_masuk, 0, -3) . " - " . substr($row->jam_keluar, 0, -3) .")" }}</option>
                        @endforeach
                    </select>
                    @error('shift')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="tempat_kerja" class="block mb-2 text-sm font-medium text-gray-900">Tempat Kerja</label>
                    <select id="tempat_kerja" name="tempat_kerja" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" disabled>
                        <option {{ ($absen->tempat_kerja == "Kantor" ) ? "selected" : ""  }} value="Kantor">Kantor</option>
                        <option {{ ($absen->tempat_kerja == "WFH (Rumah)" ) ? "selected" : ""  }} value="WFH (Rumah)">WFH (Rumah)</option>
                        <option {{ ($absen->tempat_kerja == "Lapangan" ) ? "selected" : ""  }} value="Lapangan">Lapangan</option>
                    </select>
                    @error('tempat_kerja')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full flex flex-col gap-2">
                    <button type="submit" class="bg-primary text-white text-base py-3 text-center w-full flex flex-row items-center justify-center font-medium rounded-md">
                        <span>Absen Keluar</span>
                    </button>
                    <a href="{{ route('absensi-user') }}" class="bg-gray-400 text-white text-base py-3 text-center w-full flex flex-row items-center justify-center font-medium rounded-md">
                        <span>Kembali</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

<script>

    // view map
    function showPosition(latitude, longitude) {
        var map = L.map('map');
        var marker;

        map.setView([latitude, longitude], 13);

        L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);

        marker = L.marker([val_latitude, val_longitude]).addTo(map);
        
    }

    var val_latitude = $("#latitude").val();
    var val_longitude = $("#longitude").val();
    showPosition(val_latitude, val_longitude);

    // get time 
    function getTime () { 
        var waktu = new Date();
        var jam = waktu.getHours();
        var menit = waktu.getMinutes();

        if (jam < 10) {
            jam = '0' + jam;
        }
        if (menit < 10) {
            menit = '0' + menit;
        }

        var waktuString = jam + ':' + menit;
        document.getElementById('inputWaktu').value = waktuString;
    }

    getTime();

</script>

@endsection