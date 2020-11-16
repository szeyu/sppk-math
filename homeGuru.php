<?php
    session_start();
?>


<!DOCTYPE html>
    
    <head>
        <title> Laman Utama </title>
        <link rel="stylesheet" href="mystyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
    </head>

    <body>
        <div class="homeGuru">
            <h1 style="background-color:rgba(172, 185, 189, 0.15);"> Selamat Datang </h1>
            <hr>
            <h2 style="background-color:rgba(172, 185, 189, 0.15);"> Info: </h2>
            <div class="containerInfo">
                <pre id="name"> Nama                  :  <?php echo $_SESSION['nama']; ?></pre>
                <pre id="telephone"> Nombor Telefon  :  <?php echo $_SESSION['NoTel']; ?></pre>
                <pre id="IC"> Nombor IC          :  <?php echo $_SESSION['NoIC']; ?></pre>
                <pre id="role"> peranan              :  <?php echo $_SESSION['peranan']; ?></pre>
        </div>
        
    </body>

</html>