<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('/css/style-laporan.css') }}"> --}}
    <title>{{ $title }}</title>
</head>
<body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body{
        font-family: 'Poppins', sans-serif;
    }

    #section{
        min-height: 100vh;
    }

    #section .page {
        margin-top: 32px;
        margin-left: auto;
        margin-right: auto;
        max-width: 730px;
        margin-bottom: 40px;
    }

    #section .page .judul-1{
        font-size: 32px;
        font-weight: 700;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }

    #section .page .judul-2{
        margin-bottom: 24px;
    }

    #section .page #biodata{
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 16px;
    }

    #section .page .content{
        width: 100%;
    }

    #section .page .content .parent{
        width: 100%;
    }

    #section .page .content .parent .date{
        background-color: #0096ff;
        padding-top: 4px;
        padding-bottom: 4px;
        padding-right: 16px;
        padding-left: 16px;
        position: relative;
    }

    #section .page .content .parent .date h1{
        color: white;
        font-size: 14px;
        font-weight: 600;
    }

    #section .page .content .parent .notes{
        font-size: 14px;
        padding-top: 4px;
        padding-bottom: 4px;
        padding-right: 16px;
        padding-left: 16px;
        border: 2px rgba(0, 0, 0, 0.3) solid;
        margin-top: -2px;
    }

    #section .page .content .parent .notes .text-1{
        margin-bottom: 4px;
    }

    #section .page .content .parent .notes .text-1 .item-kerja,
    #section .page .content .parent .notes .text-2 .deskripsi{
        color : #0096ff;
        font-weight: 600;
        margin-bottom: 2px;
    }
</style>

<section id="section">
    <div class="page">
        <h1 class="judul-1">Laporan Pekerjaan <br> Karyawan</h1>
        {{-- <h1 class="judul-2"></h1> --}}

        <table id="biodata">
            <tr>
                <td>Nama</td>
                <td>&nbsp;&nbsp;:&nbsp;</td>
                <td>{{ ucwords(strtolower($user->nama ? $user->nama : "User")) }}</td>
            </tr>
            <tr>
                <td>Divisi</td>
                <td>&nbsp;&nbsp;:&nbsp;</td>
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
            <tr>
                <td>Bulan</td>
                <td>&nbsp;&nbsp;:&nbsp;</td>
                <td>{{ ucwords(strtolower($bulan ?? "-")) }}, {{ $inp_tahun ?? "-" }}</td>
            </tr>
        </table>

        <div class="content">
            @foreach($logbook as $row)
                <div class="parent">
                    <div class="date">
                        <h1>Tanggal : {{ date_format(date_create($row->tanggal_dibuat), "d/m/Y") }}</h1>
                    </div>
                    @foreach ($row->logbook_notes as $note)
                        <div class="notes">
                            <div class="text-1">
                                <p class="item-kerja">Item Kerja</p>
                                <p class="note-item-kerja">
                                    {{ $note->item_kerja ?? "-" }} 
                                </p>
                            </div>
                            <div class="text-2">
                                <p class="deskripsi">Deskripsi</p>
                                <p class="note-deskripsi">
                                    {{ $note->deskripsi ?? "-" }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>
</body>
</html>