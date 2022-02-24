<?php

// MENENTUKAN NILAI PECAHAN UANG
if (isset($_POST['submit'])) {
    # code...
    $input = isset($_POST['input']) ? (int)$_POST['input'] : '';


    function pecahanUang($input)
    {
        $dataRatusan = $input % 100000;
        $jumlahRatusan = ($input - $dataRatusan) / 100000;

        $dataLimaPuluhan = $input % 50000;
        $jumlahLimaPuluhan = ($input - $dataLimaPuluhan) / 50000;

        $dataDuaPuluhan = $input % 20000;
        $jumlahDuaPuluhan = ($input - $dataDuaPuluhan) / 20000;

        $dataLimaRibuan = $input % 5000;
        $jumlahLimaRibuan = ($input - $dataLimaRibuan) / 5000;

        $dataSeribuan = $input % 1000;
        $jumlahSeribuan = ($input - $dataSeribuan) / 1000;

        $dataLimaPuluhPerak = $input % 50;
        $jumlahLimaPuluhPerak = ($input - $dataLimaPuluhPerak) / 50;

        echo "Jumlah Rp.100.000 : " . $jumlahRatusan . "<br>";
        echo "Jumlah Rp.50.000 : " . $jumlahLimaPuluhan . "<br>";
        echo "Jumlah Rp.20.000 : " . $jumlahDuaPuluhan . "<br>";
        echo "Jumlah Rp.5.000 : " . $jumlahLimaRibuan . "<br>";
        echo "Jumlah Rp.1.000 : " . $jumlahSeribuan . "<br>";
        echo "Jumlah Rp.50 : " . $jumlahLimaPuluhPerak . "<br>";
    }

    pecahanUang($input);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Pecahan Uang</title>
</head>

<body>
    <!-- FORM NILAI PECAHAN UANG -->
    <form action="" method="POST">
        <input type="text" name="input" value="<?= isset($_POST['input']) ? $_POST['input'] : ''; ?>">
        <input type="submit" name="submit">
    </form></br>
</body>

</html>