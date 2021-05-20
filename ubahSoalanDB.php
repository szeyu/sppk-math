<html>
    <body>
        <?php
            // connect to mySQL database
            require "connectPHP.php";

            if(isset($_POST['update-quiz-button'])){
                
                //////////////////////////////////////////////
                //           delete the old record
                ///////////////////////////////////////////////
                //require "deleteTopik.php";   // this cannot work because will head to another place then below cannot run

                // for the removal step of soalan pls follow these steps
                // 1) delete pilihan
                // 2) delete soalan
                // 3) delete topik

                // need IdTopik to find all the Soalan
                // need all the Soalan to find all the pilihan
                

                // this is IdTopik
                $IdTopik = $_GET['IdTopik'];               // get the value from URL

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

                    // delete pilihan data
                    $deletePilihanSQL = "DELETE FROM PILIHAN WHERE IdPilihan = '".$IdPilihan."'";
                    mysqli_query($con,$deletePilihanSQL);         // query

                    // delete soalan data
                    $deleteSoalanSQL = "DELETE FROM SOALAN WHERE IdSoalan = '".$IdSoalan."'";
                    mysqli_query($con,$deleteSoalanSQL);         // query
                }

                echo $IdTopik;
                // delete topik data
                $deleteTopikSQL = "DELETE FROM TOPIK WHERE IdTopik = '".$IdTopik."'";
                mysqli_query($con,$deleteTopikSQL);         // query
                
                
                ///////////////////////////////////////////////
                //            create new record
                ///////////////////////////////////////////////
                //require "addDataToDB.php";   // this cannot work
                
                // run add the subTajuk and tajuk SQL code to get the IdTopik first 
                $subTopik = $_POST['subTopik'];
                $tajuk = $_POST['tajuk'];
                $IdTopik = $_GET['IdTopik'];          // get the value from URL

                // echo $subTopik;
                // echo $tajuk;
                // echo $IdTopik;

                $intSoalan;
                $intPilihan;
                $jawapanA;
                $jawapanB;
                $jawapanC;
                $jawapanD;
                
                

                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //                                   IdTopik
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                
                //add data to TOPIK SQL
                $addDataToTopik = "INSERT INTO TOPIK (IdTopik, tajuk, subTopik) VALUES ('".$IdTopik."','".$tajuk."','".$subTopik."')";

                // add some query code here
                //////////// QUERY CODE /////////////////
                mysqli_query($con, $addDataToTopik);



                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //                                    IdSoalan
                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //to determine what is the last digit of latest IdSoalan
                $getLastDataSoalan = "SELECT IdSoalan FROM SOALAN ORDER BY LENGTH(IdSoalan) DESC, IdSoalan DESC LIMIT 1";
                $resultSoalan = mysqli_query($con ,$getLastDataSoalan);
                if(mysqli_num_rows($resultSoalan) == 0){
                    $intSoalan = 0;     // to make it become S1 which is our fisrt Id for SOALAN
                } else{
                    if($rowSoalan = mysqli_fetch_assoc($resultSoalan)){
                        //echo ($rowSoalan['IdSoalan']);
                        $strSoalan = $rowSoalan['IdSoalan'];
                        $strSoalan = ltrim ($strSoalan, 'S');     // to remove the S so that only number.
                        //echo $strSoalan;
                        $intSoalan = (int)$strSoalan;       // covert string to integer
                        //echo $intSoalan;

                    }             
                }


                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //                                   IdPilihan
                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //to determine what is the last digit of latest IdSPilihan
                $getLastDataPilihan = "SELECT IdPilihan FROM PILIHAN ORDER BY LENGTH(IdPilihan) DESC, IdPilihan DESC LIMIT 1";
                $resultPilihan = mysqli_query($con ,$getLastDataPilihan);
                if(mysqli_num_rows($resultPilihan) == 0){
                    $intPilihan = 0;     // to make it become P1 which is our fisrt Id for PILIHAN
                } else{
                    if($rowPilihan = mysqli_fetch_assoc($resultPilihan)){
                        //echo ($rowPilihan['IdPilihan']);
                        $strPilihan = $rowPilihan['IdPilihan'];
                        $strPilihan = ltrim ($strPilihan, 'P');     // to remove the P so that only number.
                        //echo $strPilihan;
                        $intPilihan = (int)$strPilihan;       // covert string to integer
                        //echo $intPilihan;

                    }             
                }

                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


                ///////////////////////////////////////////////////////////////////////////////////////////
                //      note that after get IdSoalan then during loop just plus one to it because many soalan
                //      Id Pilihan too!!
                ///////////////////////////////////////////////////////////////////////////////////////////

                $noSoalan = (count($_POST) - 3)/6;
                for ($i=1; $i<=$noSoalan; $i++) {

                    // echo "<p>".$_POST["soalan$i"]."</p>";
                    // echo "<p>".$_POST["jawapan$i"]."</p>";
                    // echo "<hr/>";

                    // declare the variable 
                    $soalan = $_POST["soalan$i"];
                    $jawapan = $_POST["jawapan$i"];
                    $pilihanA = $_POST["pilihanA$i"];
                    $pilihanB = $_POST["pilihanB$i"];
                    $pilihanC = $_POST["pilihanC$i"];
                    $pilihanD = $_POST["pilihanD$i"];


                    // determine which jawapan = 1
                    if ($jawapan == "A"){ 
                        $jawapanA = 1;
                    }else {
                        $jawapanA = 0;
                    }

                    if ($jawapan == "B"){ 
                        $jawapanB = 1;
                    }else {
                        $jawapanB = 0;
                    }

                    if ($jawapan == "C"){ 
                        $jawapanC = 1;
                    }else {
                        $jawapanC = 0;
                    }

                    if ($jawapan == "D"){ 
                        $jawapanD = 1;
                    }else {
                        $jawapanD = 0;
                    }


                    ///////////////////////////////////////////////////
                    //          at the same time, need add data to PILIHAN
                    ///////////////////////////////////////////////////


                    // add SQL here because this is loop
                    // add data to SOALAN SQL              --- 4 times ---
                    //add some code to get the IdSoalan
                    $intSoalan++;                 // to add new IdSoalan that is unique
                    $IdSoalan = "S".$intSoalan;       // note that the S will concatenate with last number + 1
                    $addDataToSoalan = "INSERT INTO SOALAN (IdSoalan, NoSoalan, soalan, IdTopik) VALUES ('".$IdSoalan."','".$i."','".$soalan."','".$IdTopik."')";
                    mysqli_query($con, $addDataToSoalan);

                    // add data to PILIHAN SQL
                    //pilihan A
                    $intPilihan++;                 // to add new IdPilihan that is unique
                    $IdPilihan = "P".$intPilihan;       // note that the P will concatenate with last number + 1
                    $addPilihanAToPilihan = "INSERT INTO PILIHAN (IdPilihan, jawapan, pilihan, IdSoalan) VALUES ('".$IdPilihan."','".$jawapanA."','".$pilihanA."','".$IdSoalan."')";
                    mysqli_query($con, $addPilihanAToPilihan); // query

                    
                    
                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    //add some code to get the IdSoalan
                    $intSoalan++;                 // to add new IdSoalan that is unique
                    $IdSoalan = "S".$intSoalan;       // note that the S will concatenate with last number + 1
                    $addDataToSoalan = "INSERT INTO SOALAN (IdSoalan, NoSoalan, soalan, IdTopik) VALUES ('".$IdSoalan."','".$i."','".$soalan."','".$IdTopik."')";
                    mysqli_query($con, $addDataToSoalan); // query

                    //pilihan B
                    $intPilihan++;                 // to add new IdPilihan that is unique
                    $IdPilihan = "P".$intPilihan;       // note that the P will concatenate with last number + 1
                    $addPilihanBToPilihan = "INSERT INTO PILIHAN (IdPilihan, jawapan, pilihan, IdSoalan) VALUES ('".$IdPilihan."','".$jawapanB."','".$pilihanB."','".$IdSoalan."')";
                    mysqli_query($con, $addPilihanBToPilihan); // query
                    
                    

                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    //add some code to get the IdSoalan
                    $intSoalan++;                 // to add new IdSoalan that is unique
                    $IdSoalan = "S".$intSoalan;       // note that the S will concatenate with last number + 1
                    $addDataToSoalan = "INSERT INTO SOALAN (IdSoalan, NoSoalan, soalan, IdTopik) VALUES ('".$IdSoalan."','".$i."','".$soalan."','".$IdTopik."')";
                    mysqli_query($con, $addDataToSoalan); // query

                    //pilihan C
                    $intPilihan++;                 // to add new IdPilihan that is unique
                    $IdPilihan = "P".$intPilihan;       // note that the P will concatenate with last number + 1
                    $addPilihanCToPilihan = "INSERT INTO PILIHAN (IdPilihan, jawapan, pilihan, IdSoalan) VALUES ('".$IdPilihan."','".$jawapanC."','".$pilihanC."','".$IdSoalan."')";
                    mysqli_query($con, $addPilihanCToPilihan); // query



                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    //add some code to get the IdSoalan
                    $intSoalan++;                 // to add new IdSoalan that is unique
                    $IdSoalan = "S".$intSoalan;       // note that the S will concatenate with last number + 1
                    $addDataToSoalan = "INSERT INTO SOALAN (IdSoalan, NoSoalan, soalan, IdTopik) VALUES ('".$IdSoalan."','".$i."','".$soalan."','".$IdTopik."')";
                    mysqli_query($con, $addDataToSoalan); // query

                    //pilihan D
                    $intPilihan++;                 // to add new IdPilihan that is unique
                    $IdPilihan = "P".$intPilihan;       // note that the P will concatenate with last number + 1
                    $addPilihanDToPilihan = "INSERT INTO PILIHAN (IdPilihan, jawapan, pilihan, IdSoalan) VALUES ('".$IdPilihan."','".$jawapanD."','".$pilihanD."','".$IdSoalan."')";
                    mysqli_query($con, $addPilihanDToPilihan); // query
                }
                
                header('Location: ./indexGuru.php?content=collectionGuru');       // direct user to collectionGuru page
                exit();
            }
        ?>
    </body>
</html>