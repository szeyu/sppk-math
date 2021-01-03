
<html>

<head>
    <title> Semak Jawapan </title>
    <link rel="stylesheet" href="mystyleMurid.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
    

    <div class="banner">
        <div style="background-color:  rgb(194, 247, 240);">
            <p style="opacity: 0;">.</p>
            <h1 style="background-color:  rgb(194, 247, 240);"> Ilmu Di Hujung Jari </h1>
            <h2 style="background-color:  rgb(194, 247, 240);"> Matematik Tingkatan 4 (DLP) </h2>
            <!--log out button-->
            <div class="logOut">
                <a href="login.php" onclick="return confirm('Log Keluar?')"> Log Keluar </a>   
            </div> 
            <p style="opacity: 0;">.</p>
            <br>
        </div>
        <div class="semakJawapanOK">
            <a href="indexMurid.php?content=checkMurid"> OK </a>   
        </div> 
        <br>
        <br>
        <br>
    </div>
</head>

<body>
    <?php
   
        require "connectPHP.php";
       
        if(isset($_GET['IdRekod'])){

            


            // need IdRekod to find all the IdTopik
            // need IdTopik to find sub topik and tajuk
            // need IdTopik to find IdSoalan
            // need all the Soalan to find all the pilihan and the answer
            // basically everything

            // IdRekod
            // jawapanMurid
            // markah

            // IdTopik
            // subTopik
            // tajuk

            // IdSoalan
            // soalan     got 4 same soalan in 4 IdSoalan so just skip 3 by 3

            // Idpilihan
            // pilihan
            // jawapan


            $correct = 0;
            $markah;
            $markahDB;

            /////////////////////////////////////////////////////////
            //                        IdRekod
            /////////////////////////////////////////////////////////
            $IdRekod = $_GET['IdRekod'];               // get the value from URL
            $checkIdRekodSQL = "SELECT * FROM PEREKODAN WHERE IdRekod = '".$IdRekod."'";
            $resultRekod = mysqli_query($con,$checkIdRekodSQL);         // query
            $rowRekod = mysqli_fetch_assoc($resultRekod);

            $jawapanMurid = $rowRekod['jawapanMurid'];
            $markahDB = $rowRekod['markah'];

            



            ////////////////////////////////////////////////////////
            //                      IdTopik
            ////////////////////////////////////////////////////////
            $IdTopik = $rowRekod['IdTopik'];         // get from perekodan 
            $checkIdTopikSQL = "SELECT * FROM TOPIK WHERE IdTopik = '".$IdTopik."'";
            $resultTopik = mysqli_query($con,$checkIdTopikSQL);         // query
            $rowTopik = mysqli_fetch_assoc($resultTopik);

            $tajuk = $rowTopik['tajuk'];
            $subTopik = $rowTopik['subTopik'];


            echo"
            <p style='opacity: 0';>.</p>
            <div class='infoSemak'>
                <p style='opacity: 0';>.</p>
                <h1> Info:  </h1>
                <div class='infoSemakContainer'>
                    <p style='opacity: 0';>.</p>
                    <h2> IdRekod : $IdRekod </h2>
                    <h2> IdTopik : $IdTopik </h2>
                    <h2> subTopik : $subTopik </h2>
                    <h2> tajuk : $tajuk </h2>
                    <h2> markah : $markahDB %</h2>
                    <p style='opacity: 0';>.</p>
                </div>
                <p style='opacity: 0';>.</p>
            </div>
            ";


            echo"
            <div class='semakJawapan'>
            <p style='opacity: 0';>.</p>
            <h1> Soalan:  </h1>
                <div class='semakJawapanContainer'>
            ";





            ////////////////////////////////////////////////////////
            //                      IdSoalan
            ////////////////////////////////////////////////////////
            // select all IdSoalan with that IdTopik
            $checkIdSoalanSQL = "SELECT * FROM SOALAN WHERE IdTopik = '".$IdTopik."' ORDER BY LENGTH(IdSoalan) DESC, IdSoalan ASC";
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
                $jawapanBetul;

                for($j=0; $j < 4; $j++){   // loop four times
                    $rowSoalan = mysqli_fetch_assoc($resultSoalan);
                    $resultSetIdSoalan[] = $rowSoalan['IdSoalan'];
                    
                    
                    $checkIdPilihanSQL = "SELECT * FROM PILIHAN WHERE IdSoalan = '".$resultSetIdSoalan[$j]."'";
                    $resultPilihan = mysqli_query($con,$checkIdPilihanSQL);         // query
                    $rowPilihan = mysqli_fetch_assoc($resultPilihan);
                    $resultSetIdPilihan[] = $rowPilihan['IdPilihan'];
                    $resultSetJawapan[] = $rowPilihan['jawapan'];
                    $resultSetPilihan[] = $rowPilihan['pilihan'];

                    // echo($rowPilihan['jawapan']);
                    // echo($rowPilihan['pilihan']);
                    
                }
                //print_r($resultSetJawapan);
                //echo($resultSetPilihan[0]);


                $soalan = $rowSoalan['soalan'];  // then only we get the soalan

                // determine the answer
                if ($resultSetJawapan[0] == 1){
                    $answer = 'A';
                    $jawapanBetul = $resultSetPilihan[0];
                }
                else if ($resultSetJawapan[1] == 1){
                    $answer = 'B';
                    $jawapanBetul = $resultSetPilihan[1];
                }
                else if ($resultSetJawapan[2] == 1){
                    $answer = 'C';
                    $jawapanBetul = $resultSetPilihan[2];
                }
                else if ($resultSetJawapan[3] == 1){
                    $answer = 'D';
                    $jawapanBetul = $resultSetPilihan[3];
                }

                $tempJawapanMurid = $jawapanMurid[$i-1];
                // echo $tempJawapanMurid;
                if ($tempJawapanMurid == $answer){
                    $correct += 1;
                    

                    //display question and student answer in green
                    echo "
                        <div class='correct'>
                            <hr>
                            <br>
        
                            <h2> Soalan $i</h2>
                            <h3> $soalan </h3>
        
                            <br><br><br><br>
        
                            <div class='pilihanBox'>
                                <div>
                                    <label class='container'>- (A)   $resultSetPilihan[0]
                                        <input type='radio' name='radio$i' id='radioA$i' value='A'>
                                        <span class='checkmark'></span>
                                    </label><br><br><br>
                                    <label class='container'>- (B)   $resultSetPilihan[1]
                                        <input type='radio' name='radio$i' id='radioB$i' value='B'>
                                        <span class='checkmark'></span>
                                    </label><br><br><br>
                                </div>
        
                                <div>
                                    <label class='container'>- (C)   $resultSetPilihan[2]
                                        <input type='radio' name='radio$i' id='radioC$i' value='C'>
                                        <span class='checkmark'></span>
                                    </label><br><br><br>
                                    <label class='container'>- (D)   $resultSetPilihan[3]
                                        <input type='radio' name='radio$i' id='radioD$i' value='D'>
                                        <span class='checkmark'></span>
                                    </label><br>
                                </div>
        
                                <script>
                                    if ('$tempJawapanMurid'=='A'){
                                        document.getElementById('radioA$i').checked = true;
                                    }
                                    else if ('$tempJawapanMurid'=='B'){
                                        document.getElementById('radioB$i').checked = true;
                                    }
                                    else if ('$tempJawapanMurid'=='C'){
                                        document.getElementById('radioC$i').checked = true;
                                    }
                                    else if ('$tempJawapanMurid'=='D'){
                                        document.getElementById('radioD$i').checked = true;
                                    }

                                    document.getElementById('radioA$i').disabled = true;
                                    document.getElementById('radioB$i').disabled = true;
                                    document.getElementById('radioC$i').disabled = true;
                                    document.getElementById('radioD$i').disabled = true;

                                </script>

                                <br>
                            </div>
                            <!-- <p> correct </p>  -->
                        </div>
                    ";


                } 
                else if ($tempJawapanMurid != $answer){
                    //display question and student answer in red   plus display correct answer below
                    echo "
                    <div class='wrong'>
                        <hr>
                        <br>

                        <h2> Soalan $i</h2>
                        <h3> $soalan </h3>

                        <br><br><br><br>

                        <div class='pilihanBox'>
                            <div>
                                <label class='container'>- (A)   $resultSetPilihan[0]
                                    <input type='radio' name='radio$i' id='radioA$i' value='A'>
                                    <span class='checkmark'></span>
                                </label><br><br><br>
                                <label class='container'>- (B)   $resultSetPilihan[1]
                                    <input type='radio' name='radio$i' id='radioB$i' value='B'>
                                    <span class='checkmark'></span>
                                </label><br><br><br>
                            </div>

                            <div>
                                <label class='container'>- (C)   $resultSetPilihan[2]
                                    <input type='radio' name='radio$i' id='radioC$i' value='C'>
                                    <span class='checkmark'></span>
                                </label><br><br><br>
                                <label class='container'>- (D)   $resultSetPilihan[3]
                                    <input type='radio' name='radio$i' id='radioD$i' value='D'>
                                    <span class='checkmark'></span>
                                </label><br>
                            </div>

                            <script>
                                if ('$tempJawapanMurid'=='A'){
                                    document.getElementById('radioA$i').checked = true;
                                }
                                else if ('$tempJawapanMurid'=='B'){
                                    document.getElementById('radioB$i').checked = true;
                                }
                                else if ('$tempJawapanMurid'=='C'){
                                    document.getElementById('radioC$i').checked = true;
                                }
                                else if ('$tempJawapanMurid'=='D'){
                                    document.getElementById('radioD$i').checked = true;
                                }

                                document.getElementById('radioA$i').disabled = true;
                                document.getElementById('radioB$i').disabled = true;
                                document.getElementById('radioC$i').disabled = true;
                                document.getElementById('radioD$i').disabled = true;

                            </script>

                            <br>
                        </div>
                        <!-- <p> wrong </p> -->
                    </div>
                    <h3> Jawapan betul: ($answer) $jawapanBetul </h3>
                    ";


                }
            
            }

            echo "
                </div>
                <p style='opacity: 0';>.</p>
            </div>";


            ////////////////////////////////////////////////////////////////
            //              recalculate the mark to ensure no error 
            ///////////////////////////////////////////////////////////////
            $markah = ($correct/$totalNumberOfSoalan) * 100;

            if ($markah != $markahDB){
                $updateMarkahDB = "UPDATE PEREKODAN SET markah ='".$markah."' WHERE IdRekod = '".$IdRekod."'";
                mysqli_query($con,$updateMarkahDB);         // query
            }

        }
            
    ?>
    
    
</body>
</html>