<?php
    session_start();

    if ($_SESSION['NoIC'] == ""){
        header('Location: ./login.php');       // why you break inside
    } 
?>

<!DOCTYPE html>
    <head>
        <title> Laman Utama </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
        <link rel="stylesheet" href="mystyleMurid.css">
        <link rel="icon" type="image/png" sizes="32x32" href="Image/favicon.ico">
    </head>

    <!--Banner-->
    <div class="banner">
        <div style="background-color:  #dadede;">
            <p style="opacity:0;">.</p>
            <h1> Ilmu Di Hujung Jari </h1>
            <h2> Matematik Tingkatan 4 (DLP) </h2>      
            <p style="color: #dadede;">.</p>
        </div>
    </div>
    
    <!--Top navigation bar with index murid active-->
    <div id="topnav" class="topnav">
        <a class="active" onclick="homeMurid()">Laman Utama</a>     
        <a class="active-button" onclick="collectionMurid()">Koleksi Kuiz</a>
        <a class="active-button" onclick="checkMurid()">Prestasi Sendiri</a>
        <!--log out button-->
        <div class="logOut">
            <a href="login.php" onclick="return confirm('Log Keluar?')"> Log Keluar </a>   
        </div> 
        <!-- font size button -->
        <button id="increase-btn" class="increase-btn" onclick="increaseFontSize();"> + </button>
        <button id="decrease-btn" class="decrease-btn" onclick="decreaseFontSize();"> - </button>
    </div>

    <script src="functionMurid.js"></script>

    <!-- dark mode js library -->
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
    <script>
        function addDarkmodeWidget() {
            new Darkmode().showWidget();
        }
        window.addEventListener('load', addDarkmodeWidget);
    </script>

    <body onload="reloadToCurrentZoom()">
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