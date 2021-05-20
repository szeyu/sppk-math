<?php
    session_start();

    if ($_SESSION['NoIC'] == ""){
        header('Location: ./login.php');       // why you break inside
    } 
?>

<!DOCTYPE html>
    <head>
        <title> Laman Utama </title>
        <link rel="stylesheet" href="mystyle.css">
        <link rel="icon" type="image/png" sizes="32x32" href="Image/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
    </head>

    <!--Banner-->
    <div class="banner">
        <div style="background-color:  #dadede;">
            <p style="color: #dadede;">.</p>
            <h1 style="background-color:  #dadede;"> Ilmu Di Hujung Jari </h1>
            <h2 style="background-color:  #dadede;"> Matematik Tingkatan 4 (DLP) </h2>       
            <p style="color: #dadede;">.</p>
        </div>
    </div>

    <!--Top navigation bar-->
    <div id="topnav" class="topnav">
        <a class="active" onclick="homeGuru()">Laman Utama</a>
        <a class="active-button" onclick="createGuru()">Sedia Kuiz</a>     
        <a class="active-button" onclick="collectionGuru()">Koleksi Kuiz</a>
        <a class="active-button" onclick="checkGuru()">Pantau Prestasi Murid</a>
        <!--log out button-->
        <div class="logOut">
            <a href="login.php" onclick="return confirm('Log Keluar?')"> Log Keluar </a>   
        </div> 
        <!-- font size button -->
        <button id="increase-btn" class="increase-btn" onclick="increaseFontSize();"> + </button>
        <button id="decrease-btn" class="decrease-btn" onclick="decreaseFontSize();"> - </button>
    </div>

    <script src="functionGuru.js"></script>

    <!-- dark mode js library -->
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
    <script>
        function addDarkmodeWidget() {
            new Darkmode().showWidget();
        }
        window.addEventListener('load', addDarkmodeWidget);
    </script>

    <body onload="reloadToCurrentZoom()">
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