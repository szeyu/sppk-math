
<html>
    <body>
        <?php
       
            require "connectPHP.php";
            
            session_start(); //set up global variable

            if(isset($_GET['IdTopik'])){
                $IdTopik = $_GET['IdTopik'];
                echo $IdTopik;

                // for the removal step of soalan pls follow these steps
                // 1) delete pilihan
                // 2) delete soalan
                // 3) delete topik

                // need IdTopik to find all the Soalan
                // need all the Soalan to find all the pilihan
                

                // this is IdTopik
            //     $IdTopik = $_GET['IdTopik'];               // get the value from URL

 
            //     // select all IdSoalan with that IdTopik
            //     $checkIdSoalanSQL = "SELECT IdSoalan FROM TOPIK WHERE IdTopik = '".$IdTopik."'";
            //     $resultSoalan = mysqli_query($con,$checkIdSoalanSQL);         // query
            //     $rowSoalan = mysqli_fetch_assoc($resultSoalan);      
            //     //$IdSoalan = $rowTopik['IdSoalan'];

            //     foreach ($rowSoalan['IdSoalan'] as $IdSoalan){
            //         $checkIdPilihanSQL = "SELECT IdPilihan FROM TOPIK WHERE IdSoalan = '".$IdSoalan."'";
            //         $resultPilihan = mysqli_query($con,$checkIdPilihanSQL);         // query
            //         $rowPilihan = mysqli_fetch_assoc($resultPilihan);
            //         $IdPilihan = $rowPilihan['IdPilihan'];


            //         // delete pilihan data
            //         $deletePilihanSQL = "DELETE FROM PILIHAN WHERE IdPilihan = '".$IdPilihan."'";
            //         mysqli_query($con,$deletePilihanSQL);         // query

            //         // delete soalan data
            //         $deleteSoalanSQL = "DELETE FROM SOALAN WHERE IdSoalan = '".$IdSoalan."'";
            //         mysqli_query($con,$deleteSoalanSQL);         // query
            //     }


            //     //delete topik data
            //     $deleteTopikSQL = "DELETE FROM TOPIK WHERE IdTopik = '".$IdTopik."'";
            //     mysqli_query($con,$deleteTopikSQL);         // query
                
                

            //     header('.Location/');
            //     exit();
            }
                
        ?>
    </body>
</html>