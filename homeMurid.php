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
    </head>

    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
    <script>
        function addDarkmodeWidget() {
            new Darkmode().showWidget();
        }
        window.addEventListener('load', addDarkmodeWidget);
    </script>

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