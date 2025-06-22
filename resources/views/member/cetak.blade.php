<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Member</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: black;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-spacing: 0;
        }
        td {
            padding: 10px;
            vertical-align: top;
        }
        .card {
            width: 85.60mm;
            height: 53.98mm;
            position: relative;
            border: 1px solid #ccc;
            overflow: hidden;
        }
        .card img.bg {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            z-index: 1;
        }
        .content {
            position: relative;
            z-index: 2;
            padding: 10px;
            height: 100%;
            color: #fff;
        }
        .logo {
            position: absolute;
            top: 15px;
            right: 10px;
            text-align: right;
        }
        .logo img {
            width: 65px;
            height: 65px;
            margin-top: 1pt;
        }
        .logo p {
            font-size: 10pt;
            font-weight: bold;
            color: black;
            margin: 0;
        }
        .nama {
            position: absolute;
            bottom: 50px;
            right: 10px;
            font-size: 12pt;
            font-weight: bold;
            color: black;
            text-align: right;
        }
        .telepon {
            position: absolute;
            bottom: 35px;
            right: 10px;
            font-size: 10pt;
            color: black;
            text-align: right;
        }
        .barcode {
            position: absolute;
            bottom: 30px;
            left: 16px;
            background: #fff;
            padding: 4px;
        }
        .barcode img {
            height: 45px;
            width: 45px;
        }
    </style>
</head>
<body>
    <table>
        @foreach ($datamember as $key => $data)
            <tr>
                @foreach ($data as $item)
                    <td>
                        <div class="card">
                            <img src="{{ public_path($setting->path_kartu_member) }}" class="bg" alt="bg-card">
                            <div class="content">
                                <div class="logo">
                                    <p>{{ $setting->nama_perusahaan }}</p>
                                    <img src="{{ public_path($setting->path_logo) }}" alt="logo">
                                </div>
                                <div class="nama">{{ $item->nama }}</div>
                                <div class="telepon">{{ $item->telepon }}</div>
                                <div class="barcode">
                                    <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG($item->kode_member, 'QRCODE') }}" alt="qrcode">
                                </div>
                            </div>
                        </div>
                    </td>
                    @if (count($data) == 1)
                        <td></td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </table>
</body>
</html>
