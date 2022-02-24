<?php

function tunjangan($gaji)
{
    switch ($gaji) {
        case $gaji >= 15000000:
            # code...
            return $gaji * 0.1;
            break;

        case $gaji >= 10000000 && $gaji < 15000000:
            # code...
            return $gaji * 0.12;
            break;

        default:
            # code...
            return $gaji * 0.15;
            break;
    }
}

function bonus($level)
{
    switch ($level) {
        case 'MANAGER':
            # code...
            return 250000;
            break;
        case 'ASS. MANAGER':
            # code...
            return 175000;
            break;
        case 'SENIOR OFFICER':
            # code...
            return 150000;
            break;
        case 'MIDDLE OFFICER':
            # code...
            return 125000;
            break;
        case 'JUNIOR OFFICER':
            # code...
            return 100000;
            break;
    }
}

function potongan($totalPendapatan, $region)
{
    switch ($region) {
        case 'JAKARTA':
            # code...
            return $totalPendapatan * 0.025;
            break;
        case 'BANDUNG':
            # code...
            return $totalPendapatan * 0.02;
            break;

        default:
            # code...
            return $totalPendapatan * 0.018;
            break;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Gaji Karyawan</title>

    <style>
        table,
        th,
        td {
            /* border: 1px solid black; */
            border-collapse: collapse;
        }

        th,
        td {
            padding-top: 10px;
            padding-bottom: 20px;
            padding-left: 30px;
            padding-right: 40px;
        }
    </style>
</head>


<body>
    <h4>Data Karyawan</h4>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Gaji (Per Bulan)</th>
                <th>Level Jabatan</th>
                <th>Region</th>
            </tr>
        </thead>

        <tbody>
            <?php

            include('connection.php');
            $query = $connection->query("SELECT * FROM tb_karyawan");

            while ($result = $query->fetch_assoc()) : ?>
                <tr>
                    <td><?= $result['id']; ?></td>
                    <td><?= $result['nama']; ?></td>
                    <td style="text-align: right;"><?= number_format($result['gaji']); ?></td>
                    <td><?= $result['level']; ?></td>
                    <td><?= $result['region']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table><br>
    <h4>Laporan Pendapatan Bulanan Karyawan</h4>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Level Jabatan</th>
                <th>Region</th>
                <th>Gaji (Per Bulan)</th>
                <th>Tunjangan (Per Bulan)</th>
                <th>Bonus (Per Bulan)</th>
                <th>Potongan (Per Bulan)</th>
                <th>Total Pendapatan (Per Bulan)</th>
            </tr>
        </thead>

        <tbody>
            <?php

            include('connection.php');
            $query = $connection->query("SELECT * FROM tb_karyawan");

            while ($result = $query->fetch_assoc()) : ?>
                <tr>
                    <td><?= $result['id']; ?></td>
                    <td><?= $result['nama']; ?></td>
                    <td><?= $result['level']; ?></td>
                    <td><?= $result['region']; ?></td>
                    <td style="text-align: right;"><?= number_format($result['gaji']); ?></td>
                    <td style="text-align: right;"><?= number_format(tunjangan($result['gaji'])); ?></td>
                    <td style="text-align: right;"><?= number_format(bonus($result['level'])); ?></td>
                    <td style="text-align: right; color: red;"><?php
                                                                $total = (int) $result['gaji'] + (int) tunjangan($result['gaji']) + (int) bonus($result['level']);
                                                                $potongan = potongan($total, $result['region']);
                                                                echo '(' . number_format($potongan) . ')'; ?></td>

                    <td style="text-align: right;"><?= number_format($total - $potongan); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table></br>
</body>

</html>