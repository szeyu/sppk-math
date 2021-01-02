
<html>

<head>
    <title> Semak Jawapan </title>
    <link rel="stylesheet" href="mystyleMurid.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
    

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

            /////////////////////////////////////////////////////////
            //                        IdRekod
            /////////////////////////////////////////////////////////
            $IdRekod = $_GET['IdRekod'];               // get the value from URL
            $checkIdRekodSQL = "SELECT * FROM PEREKODAN WHERE IdRekod = '".$IdRekod."'";
            $resultRekod = mysqli_query($con,$checkIdRekodSQL);         // query
            $rowRekod = mysqli_fetch_assoc($resultRekod);

            $jawapanMurid = $rowRekod['jawapanMurid'];
            $markah = $rowRekod['markah'];

            



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
            <div class='semakJawapan'>
                <h2> IdRekod: $IdRekod </h2>
                <h2> IdTopik: $IdTopik </h2>
                <h2> subTopik: $subTopik </h2>
                <h2> tajuk: $tajuk </h2>
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

                if ($jawapanMurid[$i-1] == $answer){
                    $correct += 1;

                    //display question and student answer in green
                    echo "
                        <div class='correct'>
                            <hr>
                            <br>
        
                            <legend> Soalan $i</legend>
                            <h3> $soalan </h3>
        
                            <br><br><br><br>
        
                            <div class='pilihanBox'>
                                <div>
                                    <label class='container'>-- (A)   $resultSetPilihan[0]
                                        <input type='radio' name='radio$i' id='radioA$i' value='A' disabled='disabled'>
                                        <span class='checkmark'></span>
                                    </label><br><br><br>
                                    <label class='container'>-- (B)   $resultSetPilihan[1]
                                        <input type='radio' name='radio$i' id='radioB$i' value='B' disabled='disabled'>
                                        <span class='checkmark'></span>
                                    </label><br><br><br>
                                </div>
        
                                <div>
                                    <label class='container'>-- (C)   $resultSetPilihan[2]
                                        <input type='radio' name='radio$i' id='radioC$i' value='C' disabled='disabled'>
                                        <span class='checkmark'></span>
                                    </label><br><br><br>
                                    <label class='container'>-- (D)   $resultSetPilihan[3]
                                        <input type='radio' name='radio$i' id='radioD$i' value='D' disabled='disabled'>
                                        <span class='checkmark'></span>
                                    </label><br>
                                </div>
        
                                <br>
                            </div>
                            <p> correct </p>
                        </div>
                    ";


                } 
                else if ($jawapanMurid[$i-1] != $answer){
                    //display question and student answer in red   plus display correct answer below
                    echo "
                    <div class='wrong'>
                        <hr>
                        <br>

                        <legend> Soalan $i</legend>
                        <h3> $soalan </h3>

                        <br><br><br><br>

                        <div class='pilihanBox'>
                            <div>
                                <label class='container'>-- (A)   $resultSetPilihan[0]
                                    <input type='radio' name='radio$i' id='radioA$i' value='A' disabled='disabled'>
                                    <span class='checkmark'></span>
                                </label><br><br><br>
                                <label class='container'>-- (B)   $resultSetPilihan[1]
                                    <input type='radio' name='radio$i' id='radioB$i' value='B' disabled='disabled'>
                                    <span class='checkmark'></span>
                                </label><br><br><br>
                            </div>

                            <div>
                                <label class='container'>-- (C)   $resultSetPilihan[2]
                                    <input type='radio' name='radio$i' id='radioC$i' value='C' disabled='disabled'>
                                    <span class='checkmark'></span>
                                </label><br><br><br>
                                <label class='container'>-- (D)   $resultSetPilihan[3]
                                    <input type='radio' name='radio$i' id='radioD$i' value='D' disabled='disabled'>
                                    <span class='checkmark'></span>
                                </label><br>
                            </div>

                            <br>
                        </div>
                        <p> wrong </p>
                    </div>
                    ";


                }
            
            }

            echo "
                </div>
            </div>";
            
        }
            
    ?>
    
    
</body>
</html>