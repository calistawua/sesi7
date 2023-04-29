<?php
    include("konfigurasi.php");

    if (isset($_POST["txUSER"])){
        $user = $_POST["txUSER"];
        $pwd = $_POST["txPASS"];

        $sql = "SELECT tu.nama, tu.email, tu.username,tu.passkey,tu.iduser FROM tbuser tu WHERE tu.username='".$user."';";
        $cnn = mysqli_connet(DBHOST,DBUSER,DBPASS,DBNAME, DBPORT) or die("gagal koneksi ke dbms");
        $hasil = mysqli_query($cnn,$sql);
        $jdata = mysqli_num_rows($hasil);
        //echo "DEBUG: jdata=>" .$;
        $h = mysqli_fetch_assoc($hasil);
        echo "DEBUG:<br>Nama: " . $h["nama"];
        //echo "DEBUG:<br>Nama: " . $h["passkey"];
        if(md5($pwd) == $h["passkey"]){
            echo "DEBUG: paswword sama";
        }else{
           $psn = "Akses ditoak";
        }


    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
</head>
<body>

    <form method="POST" action="formlogin.php">
    <h3>Form Login</h3>
    <div>
        user name
        <input type="text" name="txUSER">
    </div>
    <div>
        password
        <input type="password" name="txPASS1">
    </div>

    <div>
        <button type="submit">Login</button>
    </div>

        

    
</body>
</html>