<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title_pdf;?></title>
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
    <body>
        <div style="text-align:center">
            <h3> Laporan Tukar Tambah</h3>
        </div>
        <table id="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Produk Baru</th>
                    <th>Produk Lama</th>
                    <th>Harga Produk Baru</th>
                    <th>Harga Produk Lama</th>
                    <th>Total Bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data_tukar as $row) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row->produk_baru ?></td>
                    <td><?= $row->produk_lama ?></td>
                    <td><?= $row->harga_baru ?></td>
                    <td><?= $row->harga_lama ?></td>
                    <td><?= $row->total_bayar ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>