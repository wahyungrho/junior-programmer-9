<?php

// MENENTUKAN NILAI FAKTORIAL
if (isset($_POST['submit'])) {
    # code...
    $input = isset($_POST['input']) ? (int)$_POST['input'] : '';


    function faktorial($input)
    {
        $hasil = 1;
        for ($i = 1; $i <= $input; $i++) {
            $hasil = $hasil * $i;
        }
        return $hasil;
    }


    $result = faktorial($input);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menentukan Nilai Faktorial</title>
</head>

<body>

    <!-- NILAI FAKTORIAL -->
    <form action="" method="POST">
        <input type="text" name="input" value="<?= isset($_POST['input']) ? $_POST['input'] : ''; ?>">
        <input type="submit" name="submit">
    </form> </br>

    <?php if (isset($_POST['submit'])) {
        # code...
        echo 'Nilai faktorial dari ' . $input . ' adalah ' .  $result;
    } ?>
</body>

</html>