<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #333; line-height: 1.5; }
        .header { text-align: center; border-bottom: 3px solid #d4a017; padding-bottom: 10px; margin-bottom: 30px; }
        .header h1 { margin: 0; color: #1f2328; font-size: 22pt; }
        .header p { margin: 5px 0; font-size: 10pt; color: #666; }
        
        h3 { border-left: 5px solid #d4a017; padding-left: 10px; color: #1f2328; margin-top: 30px; }
        
        /* Gaya Grafik Batang CSS */
        .chart-container { margin: 20px 0; background: #f9f9f9; padding: 20px; border-radius: 10px; }
        .chart-label { font-size: 9pt; font-weight: bold; margin-bottom: 5px; }
        .bar-bg { background: #eee; height: 20px; border-radius: 10px; width: 100%; margin-bottom: 15px; }
        .bar-fill-rescue { background: #dc2626; height: 20px; border-radius: 10px; }
        .bar-fill-aspirasi { background: #2563eb; height: 20px; border-radius: 10px; }

        /* Gaya Tabel */
        table { width: 100%; border-collapse: collapse; margin-top: 15px; font-size: 9pt; }
        th { background-color: #1f2328; color: white; padding: 10px; text-align: left; }
        td { border: 1px solid #eee; padding: 8px; }
        .badge { padding: 3px 8px; border-radius: 5px; font-weight: bold; font-size: 8pt; }
        .bg-red { background: #fee2e2; color: #dc2626; }
        .bg-green { background: #dcfce7; color: #16a34a; }
        .bg-yellow { background: #fef9c3; color: #ca8a04; }

        .footer { margin-top: 50px; width: 100%; }
        .sig-box { width: 40%; text-align: center; float: right; }
    </style>
</head>
<body>

    <div class="header">
        <h1>LAPORAN EKSEKUTIF COMMAND CENTER</h1>
        <p>Lembaga Pemberdayaan Masyarakat (LPM) Banjarbaru</p>
        <p>Dicetak pada: {{ $tanggal }}</p>
    </div>

    <h3>I. RINGKASAN STATISTIK (VISUAL)</h3>
    <div class="chart-container">
        <div class="chart-label">Laporan Darurat / Rescue ({{ $stats['total_rescue'] }} Laporan)</div>
        <div class="bar-bg">
            @php $w_res = ($stats['total_rescue'] > 0) ? ($stats['total_rescue'] / ($stats['total_rescue'] + $stats['total_aspirasi']) * 100) : 0; @endphp
            <div class="bar-fill-rescue" style="width: {{ $w_res }}%;"></div>
        </div>

        <div class="chart-label">Aspirasi Warga ({{ $stats['total_aspirasi'] }} Aspirasi)</div>
        <div class="bar-bg">
            @php $w_asp = ($stats['total_aspirasi'] > 0) ? ($stats['total_aspirasi'] / ($stats['total_rescue'] + $stats['total_aspirasi']) * 100) : 0; @endphp
            <div class="bar-fill-aspirasi" style="width: {{ $w_asp }}%;"></div>
        </div>
        <p style="font-size: 8pt; color: #888;">*Panjang batang menunjukkan perbandingan volume laporan masuk.</p>
    </div>

    <h3>II. DATA LAPORAN DARURAT (RESCUE)</h3>
    <table>
        <thead>
            <tr>
                <th>Waktu</th>
                <th>Kejadian</th>
                <th>Lokasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rescue as $res)
            <tr>
                <td>{{ $res->created_at->format('d/m/Y H:i') }}</td>
                <td><strong>{{ $res->judul_laporan }}</strong></td>
                <td>{{ $res->lokasi }}</td>
                <td>
                    <span class="badge {{ ($res->status == 'Selesai') ? 'bg-green' : (($res->status == 'Proses') ? 'bg-yellow' : 'bg-red') }}">
                        {{ $res->status }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="page-break-before: always;"></div> <h3>III. DATA ASPIRASI WARGA</h3>
    <table>
        <thead>
            <tr>
                <th>Pengirim</th>
                <th>Kategori</th>
                <th>Isi Aspirasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aspirasi as $asp)
            <tr>
                <td>{{ $asp->nama }}</td>
                <td>{{ $asp->kategori }}</td>
                <td>{{ $asp->pesan }}</td>
                <td>
                    <span class="badge {{ ($asp->status == 'Dibalas') ? 'bg-green' : 'bg-red' }}">
                        {{ $asp->status }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <div class="sig-box">
            <p>Banjarbaru, {{ date('d F Y') }}</p>
            <p><strong>Ketua LPM Banjarbaru</strong></p>
            <br><br><br>
            <p><strong>( M. Ady Santana Putra )</strong></p>
        </div>
    </div>

</body>
</html>