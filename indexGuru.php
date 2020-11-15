
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
                    <a href="login.php"> Log Keluar </a>   
                </div> 
                <p style="color: rgb(194, 247, 240);">.</p>
            </div>
            
        </div>

        <!--Top navigation bar with index murid active-->
        <div class="topnav">
            <a class="active" onclick="homeGuru()">Laman Utama</a>
            <a onclick="createGuru()">Sedia Kuiz</a>     
            <a onclick="collectionGuru()">Koleksi Kuiz</a>
            <a onclick="checkGuru()">Pantau Prestasi Murid</a>
        </div>


        <!--add some js library-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" 
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous" ></script>

        <script>
            function homeGuru(){
                $("#contentGuru").load("homeGuru.php")
            }

            function createGuru(){
                $("#contentGuru").load("createGuru.php")
            }

            function collectionGuru(){
                $("#contentGuru").load("collectionGuru.php")
            }

            function checkGuru(){
                $("#contentGuru").load("checkGuru.php")
            }
        </script>
        
    </head>

    <body class="indexGuru">
        <div id="contentGuru">
            <h1>Selamat datang</h1>         <!--put same content with laman utama-->
        
        </div>
    </body>

</html>

