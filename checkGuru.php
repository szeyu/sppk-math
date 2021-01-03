
<!DOCTYPE html>
    
    <head>
        <title> Pantau Prestasi Murid </title>
        <link rel="stylesheet" href="mystyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
    
    </head>
    
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
        <a class="active" onclick="checkGuru()">Pantau Prestasi Murid</a>
    </div>

    <script>
        function homeGuru(){
            // $("#contentGuru").load("homeGuru.php");
            window.location = 'indexGuru.php?content=homeGuru';
        }

        function createGuru(){
            // $("#contentGuru").load("createGuru.php");
            window.location = 'indexGuru.php?content=createGuru';
        }

        function collectionGuru(){
            // $("#contentGuru").load("collectionGuru.php");
            window.location = 'indexGuru.php?content=collectionGuru';
        }

    </script>


    <body class="checkGuru">
    
        <h2> this is pantau Prestasi Murid 777</h2>


        <!-- put search bar for perekodan -->
        <!-- so can put perekodan table here -->



        <!-- in search bar suggestion can put all student id that is registered inside [ Recomended ] -->
        <!-- can put table of murid -->
        
    </body>
    
</html>