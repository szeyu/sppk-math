<?php
    session_start();
    //require "collectionGuru.php";
    //require "registerKuiz.php";
?>

<!DOCTYPE html>

    <head>
        <title> Index Guru </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Sistem Pengurusan Penilaian Kuiz">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content= "Sim Sze Yu">
        <link rel="stylesheet" href="mystyle.css">
        


        <!--Banner-->
        <div class="banner">
            <div style="background-color:  rgb(194, 247, 240);">
                <p style="color: rgb(194, 247, 240);">.</p>
                <h1 style="background-color:  rgb(194, 247, 240);"> Ilmu Di Hujung Jari </h1>
                <h2 style="background-color:  rgb(194, 247, 240);"> Matematik Tingkatan 4 (DLP) </h2>
                <!--log out button-->
                <div class="logOut">
                    <a href="login.php" onclick="return confirm('Log Keluar?')"> Log Keluar </a>   
                </div> 
                <p style="color: rgb(194, 247, 240);">.</p>
            </div>
            
        </div>

        <!--Top navigation bar-->
        <div id="topnav" class="topnav">
            <a class="active-button" onclick="homeGuru()">Laman Utama</a>
            <a class="active-button" onclick="createGuru()">Sedia Kuiz</a>     
            <a class="active-button" onclick="collectionGuru()">Koleksi Kuiz</a>
            <a class="active-button" onclick="checkGuru()">Pantau Prestasi Murid</a>
        </div>


        <!--add some js library-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" 
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous" ></script>


        
        <script>
            var header = document.getElementById("topnav");
            var activeButton = header.getElementsByClassName("active-button");
            for (var i = 0; i < activeButton.length; i++) {
                activeButton[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                if (current.length > 0) { 
                    current[0].className = current[0].className.replace(" active", "");
                }
                this.className += " active";
                });
            }
        
        </script>


        <script>
            function homeGuru(){
                //window.location.replace("../sppk-math/indexGuru.php?content=homeGuru");
                $("#contentGuru").load("homeGuru.php");
            }

            function createGuru(){
                //window.location.replace("../sppk-math/indexGuru.php?content=createGuru");
                $("#contentGuru").load("createGuru.php");
            }

            function collectionGuru(){
                //window.location.replace("../sppk-math/indexGuru.php?content=collectionGuru");
                $("#contentGuru").load("collectionGuru.php");
            }

            function checkGuru(){
                //window.location.replace("../sppk-math/indexGuru.php?content=checkGuru");
                $("#contentGuru").load("checkGuru.php");
            }

            window.onload = function() {
                const urlParams = new URLSearchParams(window.location.search);
                const content = urlParams.get('content');

                switch(content) {
                    case "homeGuru":
                        $("#contentGuru").load("homeGuru.php");
                        break;
                    case "createGuru":
                        $("#contentGuru").load("createGuru.php");
                        break;
                    case "collectionGuru":
                        $("#contentGuru").load("collectionGuru.php");
                        break;
                    case "checkGuru":
                        $("#contentGuru").load("checkGuru.php");
                        break;
                    default:
                        break;
                    
                }
            };
        </script>

        
        
        
        
    </head>

    <body class="indexGuru">
        <div id="contentGuru">         <!--put same content with laman utama-->
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
            </div>
        </div>
    </body>

</html>

