<?php
    session_start();

    if ($_SESSION['NoIC'] == ""){
        header('Location: ./login.php');       // why you break inside
    } 
?>

<!DOCTYPE html>

    <head>
        <title> Index Guru </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Sistem Pengurusan Penilaian Kuiz">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content= "Sim Sze Yu">
        <link rel="stylesheet" href="mystyle.css">
        <link rel="icon" type="image/png" sizes="32x32" href="Image/favicon.ico">
        

        
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
                $("#contentGuru").load("homeGuru.php");
            }

            function createGuru(){
                $("#contentGuru").load("createGuru.php");
            }

            function collectionGuru(){
                $("#contentGuru").load("collectionGuru.php");
            }

            function checkGuru(){
                window.location = 'checkGuru.php';
                // $("#contentGuru").load("checkGuru.php");
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
                        // $("#contentGuru").load("checkGuru.php");
                        window.location = 'checkGuru.php';
                        break;
                    default:
                        break;
                    
                }
            };
        </script>

        <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
        <script>
            function addDarkmodeWidget() {
                new Darkmode().showWidget();
            }
            window.addEventListener('load', addDarkmodeWidget);
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

