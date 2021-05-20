<?php
    session_start();

    if ($_SESSION['NoIC'] == ""){
        header('Location: ./login.php');       // why you break inside
    } 
?>

<html>
    <body>
        <?php
            // to connect to mySQL database
            require "connectPHP.php";
            
            if(isset($_GET['IdTopik'])){
                // for the removal step of soalan pls follow these steps
                // 0) delete Perekodan
                // 1) delete pilihan
                // 2) delete soalan
                // 3) delete topik

                // need IdTopik to find all the Soalan
                // need all the Soalan to find all the pilihan

                // this is IdTopik
                $IdTopik = $_GET['IdTopik'];               // get the value from URL

                // delete all Perekodan with that IdTopik
                $deletePerekodan = "DELETE FROM PEREKODAN WHERE IdTopik = '".$IdTopik."'";
                mysqli_query($con,$deletePerekodan);         // query

                // select all IdSoalan with that IdTopik
                $checkIdSoalanSQL = "SELECT IdSoalan FROM SOALAN WHERE IdTopik = '".$IdTopik."'";
                $resultSoalan = mysqli_query($con,$checkIdSoalanSQL);         // query

 
                // select all IdSoalan with that IdTopik
                $checkIdSoalanSQL = "SELECT IdSoalan FROM SOALAN WHERE IdTopik = '".$IdTopik."'";
                $resultSoalan = mysqli_query($con,$checkIdSoalanSQL);         // query
               
                // keep all data in array first
                $resultSetSoalan = array();
                while ($rowSoalan = mysqli_fetch_assoc($resultSoalan)) {
                    $resultSetSoalan[] = $rowSoalan['IdSoalan'];
                }

                foreach ($resultSetSoalan as $IdSoalan){
                    $checkIdPilihanSQL = "SELECT IdPilihan FROM PILIHAN WHERE IdSoalan = '".$IdSoalan."'";
                    $resultPilihan = mysqli_query($con,$checkIdPilihanSQL);         // query
                    $rowPilihan = mysqli_fetch_assoc($resultPilihan);
                    $IdPilihan = $rowPilihan['IdPilihan'];
                    // echo $IdSoalan;
                    // echo $IdPilihan;

                    // // delete pilihan data
                    $deletePilihanSQL = "DELETE FROM PILIHAN WHERE IdPilihan = '".$IdPilihan."'";
                    mysqli_query($con,$deletePilihanSQL);         // query

                    // // delete soalan data
                    $deleteSoalanSQL = "DELETE FROM SOALAN WHERE IdSoalan = '".$IdSoalan."'";
                    mysqli_query($con,$deleteSoalanSQL);         // query
                }

                echo $IdTopik;
                // //delete topik data
                $deleteTopikSQL = "DELETE FROM TOPIK WHERE IdTopik = '".$IdTopik."'";
                mysqli_query($con,$deleteTopikSQL);         // query
                
                header('Location: ./indexGuru.php?content=collectionGuru');
                exit();
            }
        ?>
    </body>
</html>