<?php
    //require_once "checkPassword.php";
    session_start(); // set up global variable
?>

<!DOCTYPE html>
    
    <head>
        <title> Laman Utama </title>
        <link rel="stylesheet" href="mystyleMurid.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
    </head>

    <body class="homeMurid">

        <h1> Selamat Datang </h1>
        <h2> info </h2>
        <div class="containerInfo">
            <p> nama: <?php echo $_SESSION['nama']; ?></p>
            <p> Nombor Telefon: <?php echo $_SESSION['NoTel']; ?></p>
            <p> Nombor IC: <?php echo $_SESSION['NoIC']; ?></p>
            <p> peranan: <?php echo $_SESSION['peranan']; ?></p>
        </div>

        
    </body>

</html>