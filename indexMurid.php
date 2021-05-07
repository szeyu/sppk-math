<?php
    session_start();

    if ($_SESSION['NoIC'] == ""){
        header('Location: ./login.php');       // why you break inside
    } 
?>


<!DOCTYPE html>

    <head>
        <title> Index Murid </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Sistem Pengurusan Penilaian Kuiz">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content= "Sim Sze Yu">
        <link rel="stylesheet" href="mystyleMurid.css">
        <link rel="icon" type="image/png" sizes="32x32" href="Image/favicon.ico">


        <script>
        
            window.onload = function() {
                const urlParams = new URLSearchParams(window.location.search);
                const content = urlParams.get('content');

                switch(content) {
                    case "homeMurid":
                        window.location = 'homeMurid.php';
                        break;
                    case "collectionMurid":
                        window.location = 'collectionMurid.php';
                        break;
                    case "checkMurid":
                        window.location = 'checkMurid.php';
                        break;
                    default:
                        window.location = 'login.php';
                        break;
                    
                }
            };
        </script>

    </head>


</html>
