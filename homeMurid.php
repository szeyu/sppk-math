<?php
    //require_once "checkPassword.php";
    session_start(); // set up global variable
?>

<!DOCTYPE html>
    
    <head>
        <title> Laman Utama </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
        <link rel="stylesheet" href="mystyleMurid.css">
    </head>

    <body>
        <div class = "homeMurid">

            <h1> Selamat Datang </h1>
            <hr>
            <h2> Info: </h2>
            <div class="containerInfo">
                <pre id="name"> Nama                  :  <?php echo $_SESSION['nama']; ?></pre>
                <pre id="telephone"> Nombor Telefon  :  <?php echo $_SESSION['NoTel']; ?></pre>
                <pre id="IC"> Nombor IC          :  <?php echo $_SESSION['NoIC']; ?></pre>
                <pre id="role"> peranan              :  <?php echo $_SESSION['peranan']; ?></pre>
            </div>
        </div>
        
    </body>

</html>