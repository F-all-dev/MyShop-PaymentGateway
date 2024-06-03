<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laporan Pendapatan</title>
    
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }
            h3, h4 {
                margin: 10px 0;
            }
            .container {
                width: 80%;
                margin: 0 auto;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                padding: 8px;
                border-bottom: 1px solid #ddd;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
            tr:hover {
                background-color: #f5f5f5;
            }
            .text-center {
                text-align: center;
            }
        </style>
    </head>
<body>
    <h3 class="text-center">Laporan Pendapatan</h3>
    <h4 class="text-center">
        Tanggal {{ date($awal) }}
        s/d
        Tanggal {{ date($akhir) }}
    </h4>

    <table class="table table-striped">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Tanggal</th>
                <th>Penjualan</th>
                <th>Pembelian</th>
                <th>Pengeluaran</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ $row['DT_RowIndex'] }}</td>
                    <td>{{ $row['tanggal'] }}</td>
                    <td>{{ $row['penjualan'] }}</td>
                    <td>{{ $row['pembelian'] }}</td>
                    <td>{{ $row['pengeluaran'] }}</td>
                    <td>{{ $row['pendapatan'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>