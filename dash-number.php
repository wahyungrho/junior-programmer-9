<?php

// MENENTUKAN NILAI GENAP DASH NUMBER
if (isset($_POST['submit'])) {
    # code...
    $input = isset($_POST['input']) ? $_POST['input'] : '';

    // SPLIT INPUTAN NUMBER
    $arr = str_split($input);

    // MEMLAKUKAN PERULANGAN SETIAP BILANGAN/NUMBER YANG SUDAH DI SPLIT
    foreach ($arr as $key => $value) {
        if ($value % 2 == 0) {
            $arr[$key] = $arr[$key] . '-';
        }
    }

    // KEMBALIKAN ARRAY SATUKAN KE DALAM STRING
    $result = implode('', $arr);
    // echo $result;


    // MENENTUKAN NILAI GENAP DASH NUMBER
    // function dashNumber($input)
    // {
    //     $hasil = '';
    //     for ($i = 1; $i <= $input; $i++) {
    //         if ($input[$i] % 2 == 0) {
    //             $hasil .= $i . '-';
    //         } else {
    //             $hasil .= $i;
    //         }
    //     }
    //     return $hasil;
    // }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash Number Genap</title>
</head>

<body>
    <!-- NILAI INPUT DASH NUMBER -->
    <form action="" method="POST">
        <input type="text" name="input" value="<?= isset($_POST['input']) ? $_POST['input'] : ''; ?>">
        <input type="submit" name="submit">
    </form></br>

    <!-- NILAI OUTPUT DASH NUMBER -->
    <?php if (isset($_POST['submit'])) {
        # code...
        echo 'Simbol dash pada bilangan genap dari nilai ' . $input . ' adalah ' .  '<b>' . $result . '</b>';
    } ?>
</body>

</html>