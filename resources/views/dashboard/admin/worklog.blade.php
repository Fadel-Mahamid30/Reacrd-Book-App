@extends('dashboard.admin.template.default_template')
@section('content')

<section class="min-h-screen flex justify-center items-center px-4 py-10 bg-white">

    <div class="w-full max-w-[730px]">
        <h1 class="text-3xl sm:text-3xl max-w-[350px] mx-auto font-bold mb-8 w-full text-center">Laporan Aktivitas Pekerjaan Karyawan</h1>
        <div class="w-full mb-4">
            <table class="w-fit">
                <tr class="text-sm font-semibold">
                    <td>Nama</td>
                    <td>&nbsp;:&nbsp;&nbsp;</td>
                    <td>{{ ucwords(strtolower($user->nama ? $user->nama : "User")) }}</td>
                </tr>
                <tr class="text-sm font-semibold">
                    <td>Divisi</td>
                    <td>&nbsp;:&nbsp;&nbsp;</td>
                    <td>{{ $user->divisi ? $user->divisi->divisi : "-";  }}</td>
                </tr>

                @php $bulan = ""; @endphp
                @foreach ($months as $row)
                    @if ($row["id"] == $inp_bulan)
                        @php
                            $bulan = $row["bulan"];
                            break;
                        @endphp
                    @endif
                @endforeach

                <tr class="text-sm font-semibold">
                    <td>Bulan</td>
                    <td>&nbsp;:&nbsp;&nbsp;</td>
                    <td>{{ ucwords(strtolower($bulan ?? "-")) }}, {{ $inp_tahun ?? "-" }}</td>
                </tr>
            </table>
        </div>
        <div class="laporan mb-4">
            @foreach ($logbook as $row)
                <div class="w-full">
                    <div class="w-full px-6 py-4 bg-primary text-sm font-semibold text-white">
                        Tanggal : {{ date_format(date_create($row->tanggal_dibuat), "d/m/Y") }}
                    </div>
                    <div class="w-full border-2 border-gray-200 divide-y-2 divide-gray-200 bg-white">
                        @foreach ($row->logbook_notes as $note)
                            <div class="todolist px-6 py-4 w-full">
                                <div class="title w-full mb-4">
                                    <p class="text-sm text-primary font-semibold mb-2">Item Kerja</p>
                                    <p class="text-sm font-normal">
                                        {{ $note->item_kerja ?? "-" }} 
                                    </p>
                                </div>
                                <div class="title w-full">
                                    <p class="text-sm text-primary font-semibold mb-2">Deskripsi</p>
                                    <p class="text-sm font-normal">
                                        {{ $note->deskripsi ?? "-" }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="w-full flex flex-col-reverse sm:flex-row gap-2 sm:justify-end">
        @role("admin")
            <a href="{{ route('dashboard-admin-logbook') }}" class="bg-gray-400 text-white text-sm py-2.5 px-4 text-center w-full sm:w-fit flex flex-row items-center justify-center font-medium rounded-md">
                <span>Kembali</span>
            </a>
        @else
            <a href="{{ route('dashboard-pimpinan-logbook') }}" class="bg-gray-400 text-white text-sm py-2.5 px-4 text-center w-full sm:w-fit flex flex-row items-center justify-center font-medium rounded-md">
                <span>Kembali</span>
            </a>
        @endrole
            <a href="{{ route('download-pdf', [$user->id]) }}?bulan={{ $inp_bulan }}&tahun={{ $inp_tahun }}" class="bg-primary text-white text-sm py-2.5 px-4 text-center w-full sm:w-fit flex flex-row items-center justify-center font-medium rounded-md">
                <span>Print PDF</span>
            </a>
        </div>
    </div>
</section>
@endsection