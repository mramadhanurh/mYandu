<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        h3 {
            text-align: center;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h3><?= $judul ?></h3>
    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Anak</th>
                <th class="text-center">Jenis Pemeriksaan</th>
                <th class="text-center">Tanggal Cek</th>
                <th class="text-center">Hasil</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($detail as $value): ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td><?= $value['nama_anak'] ?></td>
                <td><?= $value['nama_pemeriksaan'] ?></td>
                <td><?= date('d-m-Y', strtotime($value['tanggal_cek'])) ?></td>
                <td><?= $value['hasil'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>