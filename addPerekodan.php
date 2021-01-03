<html>
    <body>
        
        <?php
            require "connectPHP.php";


            ////////////////////////////////////////////////////////////////
            //                     NoIC
            ////////////////////////////////////////////////////////////////
            session_start();  
            $NoIC = $_SESSION['NoIC'];
            echo "NoIC ".$NoIC."<br>";
            
            if(isset($_POST['hantar-kuiz-button'])){
                
                ///////////////////////////////////////////////////////////
                //                      IdTopik
                ///////////////////////////////////////////////////////////
                $IdTopik = $_GET['IdTopik'];               // get the value from URL
                echo "IdTopik ".$IdTopik."<br>";
 

                /////////////////////////////////////////////////////////////
                //                  IdSoalan
                ////////////////////////////////////////////////////////////
                // select all IdSoalan with that IdTopik  (in ascending order)
                $checkIdSoalanSQL = "SELECT IdSoalan FROM SOALAN WHERE IdTopik = '".$IdTopik."' ORDER BY LENGTH(IdSoalan) DESC, IdSoalan ASC";
                $resultSoalan = mysqli_query($con,$checkIdSoalanSQL);         // query
               
                // keep all data in array first
                $resultSetSoalan = array();
                while ($rowSoalan = mysqli_fetch_assoc($resultSoalan)) {
                    $resultSetSoalan[] = $rowSoalan['IdSoalan'];
                }


                //////////////////////////////////////////////////////////////
                //                  jawapan
                /////////////////////////////////////////////////////////////
                // keep all data in array first
                $jawapan = array();
                foreach ($resultSetSoalan as $IdSoalan){
                    $checkJawapanSQL = "SELECT jawapan FROM PILIHAN WHERE IdSoalan = '".$IdSoalan."'";
                    $resultJawapan = mysqli_query($con,$checkJawapanSQL);         // query
                    $rowJawapan = mysqli_fetch_assoc($resultJawapan);
                    $jawapan[] = $rowJawapan['jawapan'];   

                    // echo $IdSoalan." ";
                    // foreach ($jawapan as $ct) { echo $ct; }
                    // echo "<br>";
                        
                }
                echo "Jawapan ";
                foreach ($jawapan as $ct) { echo $ct; }
                echo "<br>";

                
                //////////////////////////////////////////////////////////////////////////////////////////////////////////
                //                                   IdRekod
                /////////////////////////////////////////////////////////////////////////////////////////////////////////
                $intRekod;

                //to determine what is the last digit of latest IdRekod
                $getLastDataRekod = "SELECT IdRekod FROM PEREKODAN ORDER BY LENGTH(IdRekod) DESC, IdRekod DESC LIMIT 1";
                $resultRekod = mysqli_query($con ,$getLastDataRekod);
                if(mysqli_num_rows($resultRekod) == 0){
                    $intRekod = 0;     // to make it become P1 which is our fisrt Id for PEREKODAN
                } else{
                    if($rowRekod = mysqli_fetch_assoc($resultRekod)){
                        //echo ($rowRekod['IdRekod']);
                        $strRekod = $rowRekod['IdRekod'];
                        $strRekod = ltrim ($strRekod, 'R');     // to remove the R so that only number.
                        //echo $strRekod;
                        $intRekod = (int)$strRekod;       // covert string to integer
                        //echo $intRekod;

                    }             
                }
                $intRekod++;                 // to add new IdRekod that is unique
                $IdRekod = "R".$intRekod;       // note that the R will concatenate with last number + 1
                echo "IdRekod ".$IdRekod."<br>";
                




                //////////////////////////////////////////////////////////////////////////////////////////////////////
                //                                 Get data from radio form POST
                ///////////////////////////////////////////////////////////////////////////////////////////////////////
                /////////////////////////////
                ///      at the same time need to concatenate the jawapanMurid in the form of ADBCD
                ////////////////////////////

                $noSoalan = (count($_POST))-1;     // need to minus 1 because hantar button consider one post
                echo "no POST = ".$noSoalan."<br>";

                // print_r($_POST);        // [radio1] => C [radio2] => D [hantar-kuiz-button] =>

                $correct = 0;
                $jawapanMuridDB = "";
                for ($i=1; $i<=$noSoalan; $i++) {

                    // declare the variable 
                    $alphabeticNum;
                    $position;
                    $jawapanMurid = $_POST["radio$i"];
                    // echo $jawapanMurid."<br>";

                    $jawapanMuridDB = $jawapanMuridDB.$jawapanMurid;

                    // convert and return the position of jawapanMurid in 00100001
                    // use formula: 
                    // i = 1
                    // 1 x 4 = 4
                    // lets say if jawapan murid is C then we convert them to 3
                    // 4 - 3 = 1
                    // 4 - 1 = 3
                    // 3-1 = 2

                    // i = 2
                    // 2 x 4 = 8
                    // lets say if jawapan murid is D then we convert them to 4
                    // 4 - 4 = 0
                    // 8 - 0 = 8
                    // 8-1 = 7

                    // general formula = 4i - (4 - jawapanMurid) - 1
                    //                 = 4i - 4 + jawapanMurid - 1
                    //                 = 4i + jawapanMurid - 5


                    //////////////////////////////////////////////////////////////
                    //                     check answer
                    //////////////////////////////////////////////////////////////

                    if ($jawapanMurid == "A"){ 
                        $alphabeticNum = 1;
                    }
                    else if ($jawapanMurid == "B"){ 
                        $alphabeticNum = 2;
                    }
                    else if ($jawapanMurid == "C"){ 
                        $alphabeticNum = 3;
                    }
                    else if ($jawapanMurid == "D"){ 
                        $alphabeticNum = 4;
                    }   

                    $position = 4*$i + $alphabeticNum - 5;

                    if ($jawapan[$position] == "1"){
                        $correct += 1;
                    }
                    
                          
                }
                echo "jawapanMuridDB :".$jawapanMuridDB."<br>";
                echo "total soalan :".$noSoalan."<br>";
                echo "correct answer :".$correct."<br>";
                


                //////////////////////////////////////////////////////////////
                //                     calculate markah
                //////////////////////////////////////////////////////////////
                $markah;
                $markah = ($correct/$noSoalan) * 100;
                echo "Markah :".$markah."<br>";


                //////////////////////////////////////////////////////////////
                //                      tarikh
                //////////////////////////////////////////////////////////////
                $tarikh = date("dmy");
                echo "tarikh ".$tarikh."<br>";

               

                //////////////////////////////////////////////////////////////
                //                  add data to PEREKODAN
                //////////////////////////////////////////////////////////////
                $addDataToPerekodan = "INSERT INTO PEREKODAN (IdRekod, markah, tarikh, jawapanMurid, NoIC, IdTopik) VALUES ('".$IdRekod."','".$markah."','".$tarikh."','".$jawapanMuridDB."','".$NoIC."','".$IdTopik."')";
                mysqli_query($con, $addDataToPerekodan);




                header('Location: ./semakJawapan.php?IdRekod='.$IdRekod);       // direct user to semakJawapan page
                exit();
            }
            
            
        ?>
    </body>
</html>