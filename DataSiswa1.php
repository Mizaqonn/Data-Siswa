<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier</title>
    <link rel="stylesheet" href="DataSiswa.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<button type="submit" name="kirim" value="kirim"><i class='bx bx-chevrons-left'></i><a href="DataSiswa.php">KEMBALI</a></button>
<?php
    session_start();


    if(!isset($_SESSION['dataSiswa'])){
        $_SESSION['dataSiswa']= array ();
    }
    
    if(isset($_POST['nama']) && isset($_POST['nis']) && isset($_POST['rayon'])){
        $data = array(
            'nama' => $_POST['nama'],
            'nis' => $_POST['nis'],
            'rayon' => $_POST['rayon']
        );
        array_push($_SESSION['dataSiswa'], $data);
    };
    if(isset($_GET['hapus'])) {
        $index = $_GET['hapus'];
        unset($_SESSION['dataSiswa'][$index]);
        header('Location: http://localhost/OOP/DataSiswa1.php');
        exit;
    }

    echo '<table border="1">';
    echo '<tr>';
    echo '<th>NAMA</th>';
    echo '<th>NIS</th>';
    echo '<th>RAYON</th>';
    echo '<th>AKSI</th>';
    echo '</tr>';

    foreach($_SESSION['dataSiswa'] as $index => $value){
        echo '<tr>';
        echo '<td>' . $value['nama'] . '</td>';
        echo '<td>' . $value['nis'] . '</td>';
        echo '<td>' . $value['rayon'] . '</td>';
        echo '<td> <a href="?hapus='.$index.'" class="btn btn-danger btn-sm">hapus</a></td>';
        echo '</tr>';
    }

    echo "</table>";
    ?>
</body>
</html>