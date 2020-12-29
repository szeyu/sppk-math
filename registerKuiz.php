<html>
    <body>
        
        <?php
            require "connectPHP.php";

            //session_start();
        
            
            if(isset($_POST['register-quiz-button'])){

                //echo "<p>".$_POST['soalan1']."</p>";     // this line can work


                // run add the subTajuk and tajuk SQL code to get the IdTopik first 
                $subTopik = $_POST['subTopik'];
                $tajuk = $_POST['tajuk'];
                $IdTopik;       // note that the T later will concatenate with last number + 1
                $intSoalan;
                $intPilihan;
                $jawapanA;
                $jawapanB;
                $jawapanC;
                $jawapanD;
                
                

                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //                                   IdTopik
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //to determine what is the last digit of latest IdTopik
                $getLastDataTopik = "SELECT IdTopik FROM TOPIK ORDER BY LENGTH(IdTopik) DESC,IdTopik DESC LIMIT 1";
                $resultTopik = mysqli_query($con ,$getLastDataTopik);
                //echo "helo";
                //echo($resultTopik);

                if(mysqli_num_rows($resultTopik) == 0){
                    $IdTopik = $IdTopik . "1";     // to make it become T1 which is our fisrt Id for TOPIK
                } else{
                    if($rowTopik = mysqli_fetch_assoc($resultTopik)){
                        //echo ($rowTopik['IdTopik']);
                        $strTopik = $rowTopik['IdTopik'];
                        $strTopik = ltrim ($strTopik, 'T');     // to remove the T so that only number.
                        //echo $strTopik;
                        $intTopik = (int)$strTopik;       // covert string to integer
                        $intTopik++;                 // to add new IdTopik that is unique
                        //echo $intTopik;

                        $IdTopik = "T".$intTopik; 
                        //echo $IdTopik;
                    }             
                }
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
                    //add query code here
                    /////////// QUERY CODE //////////////
                    mysqli_query($con, $addPilihanAToPilihan);

                    
                    
                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    //add some code to get the IdSoalan
                    $intSoalan++;                 // to add new IdSoalan that is unique
                    $IdSoalan = "S".$intSoalan;       // note that the S will concatenate with last number + 1
                    $addDataToSoalan = "INSERT INTO SOALAN (IdSoalan, NoSoalan, soalan, IdTopik) VALUES ('".$IdSoalan."','".$i."','".$soalan."','".$IdTopik."')";
                    mysqli_query($con, $addDataToSoalan);

                    //pilihan B
                    $intPilihan++;                 // to add new IdPilihan that is unique
                    $IdPilihan = "P".$intPilihan;       // note that the P will concatenate with last number + 1
                    $addPilihanBToPilihan = "INSERT INTO PILIHAN (IdPilihan, jawapan, pilihan, IdSoalan) VALUES ('".$IdPilihan."','".$jawapanB."','".$pilihanB."','".$IdSoalan."')";
                    //add query code here
                    /////////// QUERY CODE //////////////
                    mysqli_query($con, $addPilihanBToPilihan);
                    
                    

                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    //add some code to get the IdSoalan
                    $intSoalan++;                 // to add new IdSoalan that is unique
                    $IdSoalan = "S".$intSoalan;       // note that the S will concatenate with last number + 1
                    $addDataToSoalan = "INSERT INTO SOALAN (IdSoalan, NoSoalan, soalan, IdTopik) VALUES ('".$IdSoalan."','".$i."','".$soalan."','".$IdTopik."')";
                    mysqli_query($con, $addDataToSoalan);

                    //pilihan C
                    $intPilihan++;                 // to add new IdPilihan that is unique
                    $IdPilihan = "P".$intPilihan;       // note that the P will concatenate with last number + 1
                    $addPilihanCToPilihan = "INSERT INTO PILIHAN (IdPilihan, jawapan, pilihan, IdSoalan) VALUES ('".$IdPilihan."','".$jawapanC."','".$pilihanC."','".$IdSoalan."')";
                    //add query code here
                    /////////// QUERY CODE //////////////
                    mysqli_query($con, $addPilihanCToPilihan);



                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    //add some code to get the IdSoalan
                    $intSoalan++;                 // to add new IdSoalan that is unique
                    $IdSoalan = "S".$intSoalan;       // note that the S will concatenate with last number + 1
                    $addDataToSoalan = "INSERT INTO SOALAN (IdSoalan, NoSoalan, soalan, IdTopik) VALUES ('".$IdSoalan."','".$i."','".$soalan."','".$IdTopik."')";
                    mysqli_query($con, $addDataToSoalan);

                    //pilihan D
                    $intPilihan++;                 // to add new IdPilihan that is unique
                    $IdPilihan = "P".$intPilihan;       // note that the P will concatenate with last number + 1
                    $addPilihanDToPilihan = "INSERT INTO PILIHAN (IdPilihan, jawapan, pilihan, IdSoalan) VALUES ('".$IdPilihan."','".$jawapanD."','".$pilihanD."','".$IdSoalan."')";
                    //add query code here
                    /////////// QUERY CODE //////////////
                    mysqli_query($con, $addPilihanDToPilihan);
                } 
                
                // here add session message
                //$_SESSION['registerQuizMessage'] = "Soalan berjaya dimuat naik!";

                echo '<script> alert("Soalan berjaya dimuat naik!"); </script>';
                header('Location: ./indexGuru.php?content=createGuru');       // direct user to home page
                exit();
            }
            
            
        ?>
    </body>
</html>