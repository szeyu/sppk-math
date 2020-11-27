
<html>
    <head>
        <title> Update Topik </title>
        <link rel="stylesheet" href="mystyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
        
    </head>

    <body>
        <?php
       
            require "connectPHP.php";
           
            if(isset($_GET['IdTopik'])){
                // need IdTopik to find all the Soalan
                // need all the Soalan to find all the pilihan
                
                // this is IdTopik
                $IdTopik = $_GET['IdTopik'];               // get the value from URL
                $checkIdTopikSQL = "SELECT * FROM TOPIK WHERE IdTopik = '".$IdTopik."'";
                $resultTopik = mysqli_query($con,$checkIdTopikSQL);         // query
                $rowTopik = mysqli_fetch_assoc($resultTopik);

                $tajuk = $rowTopik['tajuk'];
                $subTopik = $rowTopik['subTopik'];

 
                // select all IdSoalan with that IdTopik
                $checkIdSoalanSQL = "SELECT * FROM SOALAN WHERE IdTopik = '".$IdTopik."' ORDER BY LENGTH(IdSoalan) ASC";
                $resultSoalan = mysqli_query($con,$checkIdSoalanSQL);         // query
                $numberOfRow = mysqli_num_rows($resultSoalan);       
                $totalNumberOfSoalan = $numberOfRow / 4;        // need to divide by 4 to find the total number of soalan

               
                

                for ($i=1; $i <= $totalNumberOfSoalan; $i++){       // to loop till the end of question
                    //every loop use new array
                    // keep all data in array first
                    $resultSetIdSoalan = array();

                    $resultSetIdPilihan = array();
                    $resultSetJawapan = array();
                    $resultSetPilihan = array();
                    $soalan;
                    $answer; //ABCD

                    for($j=0; $j < 4; $j++){   // loop four times
                        $rowSoalan = mysqli_fetch_assoc($resultSoalan)
                        $resultSetIdSoalan[] = $rowSoalan['IdSoalan'];
                        
                        
                        $checkIdPilihanSQL = "SELECT * FROM PILIHAN WHERE IdSoalan = '".$resultSetIdSoalan[$j]."'";
                        $resultPilihan = mysqli_query($con,$checkIdPilihanSQL);         // query
                        $rowPilihan = mysqli_fetch_assoc($resultPilihan);
                        $resultSetIdPilihan = $rowPilihan['IdPilihan'];
                        $resultSetJawapan = $rowPilihan['jawapan'];
                        $resultSetPilihan = $rowPilihan['pilihan'];
                        
                    }

                    $soalan = $rowSoalan['soalan'];  // then only we get the soalan

                    // determine the answer
                    if ($resultSetJawapan[0] == 1){
                        $answer = 'A';
                    }
                    else if ($resultSetJawapan[1] == 1){
                        $answer = 'B';
                    }
                    else if ($resultSetJawapan[2] == 1){
                        $answer = 'C';
                    }
                    else if ($resultSetJawapan[3] == 1){
                        $answer = 'D';
                    }

                    
                    ////////// Display data ////////////////////


                    

                }


                while ($rowSoalan = mysqli_fetch_assoc($resultSoalan)) {
                    $resultSetIdSoalan[] = $rowSoalan['IdSoalan'];
                    $resultSetSoalan[] = $rowSoalan['soalan'];
                }


                $resultSetIdPilihan = array();
                $resultSetJawapan = array();
                $resultSetPilihan = array();
                $result

                for ($i=0; $i < count($resultSetIdSoalan); $i++){
                    $IdSoalan = $resultSetIdSoalan[i];
                    $checkIdPilihanSQL = "SELECT * FROM PILIHAN WHERE IdSoalan = '".$IdSoalan."'";
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