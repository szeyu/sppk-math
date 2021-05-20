<?php
    session_start();
    $peranan = $_SESSION['peranan'];

    if ($_SESSION['NoIC'] == ""){
        header('Location: ./login.php');       // why you break inside
    } 
?>

<html>
    <head>
        <title> Semak Jawapan </title>
        <link rel="stylesheet" href="mystyleMurid.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->

        <div class="banner" style="text-align:center;">
            <div style="background-color:  #dadede;">
                <p style="opacity: 0;">.</p>
                <h1 style="background-color:  #dadede;"> Ilmu Di Hujung Jari </h1>
                <h2 style="background-color:  #dadede;"> Matematik Tingkatan 4 (DLP) </h2>
                <!--log out button-->
                <div class="logOut">
                    <a href="login.php" onclick="return confirm('Log Keluar?')"> Log Keluar </a>   
                </div> 
                <p style="opacity: 0;">.</p>
                <br>
            </div>
            <div class="semakJawapanOK">
                <!-- can use check peranan before go to another so here can put onclick then js determine which way to go -->
                <a onclick="backToOrigin()"> OK </a>   
            </div> 
            <br><br><br>
        </div>
    </head>

    <br>
    <div>
        <!-- font size button -->
        <button id="increase-btn" class="increase-btn" onclick="increaseFontSize();"> + </button>
        <button id="decrease-btn" class="decrease-btn" onclick="decreaseFontSize();"> - </button>
    </div>

    <script src="functionMurid.js"></script>

    <script> 
        function backToOrigin(){
            if ('<?php echo $peranan; ?>' == 'murid'){
                window.location = 'checkMurid.php';
            }else {
                window.location = 'checkGuru.php';
            }
        }
    </script>

    <!-- dark mode js library -->
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
    <script>
        function addDarkmodeWidget() {
            new Darkmode().showWidget();
        }
        window.addEventListener('load', addDarkmodeWidget);
    </script>

    <body onload="reloadToCurrentZoom()">
        <?php
            // connect to mySQL database
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


                ////////////////////////////////////////////////////////
                //                Nama   and   NoIC
                ////////////////////////////////////////////////////////
                $NoIC = $rowRekod['NoIC'];         // get from perekodan 
                $checkIdNamaSQL = "SELECT nama FROM PENGGUNA WHERE NoIC = '".$NoIC."'";
                $resultNama = mysqli_query($con,$checkIdNamaSQL);         // query
                $rowNama = mysqli_fetch_assoc($resultNama);

                $nama = $rowNama['nama'];


                echo"
                <p style='opacity: 0';>.</p>
                <div class='infoSemak'>
                    <p style='opacity: 0';>.</p>
                    <h1 style='margin-left: 5%'> Info:  </h1>
                    <div class='infoSemakContainer'>
                        <p style='opacity: 0';>.</p>
                        <h2 style='margin-left: 5%;'> IdRekod : $IdRekod </h2>
                        <h2 style='margin-left: 5%;'> IdTopik : $IdTopik </h2>
                        <h2 style='margin-left: 5%;'> subTopik : $subTopik </h2>
                        <h2 style='margin-left: 5%;'> tajuk : $tajuk </h2>
                        <h2 style='margin-left: 5%;'> markah : $markahDB %</h2>
                        <p style='opacity: 0;'>.</p>
                        <h2 style='margin-left: 5%;'> NoIC : $NoIC </h2>
                        <h2 style='margin-left: 5%;'> Nama : $nama </h2>
                        <p style='opacity: 0;'>.</p>
                    </div>
                    <br><br>
                </div>
                ";

                echo"
                <div class='semakJawapan'>
                <br>
                <h1 style='margin-left: 5%;'> Soalan:  </h1>
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

                    $ABCDJawapanMurid = $jawapanMurid[$i-1];
                    if ($ABCDJawapanMurid=='A'){
                        $tempJawapanMurid = 0;
                    }
                    else if ($ABCDJawapanMurid=='B'){
                        $tempJawapanMurid = 1;
                    }
                    else if ($ABCDJawapanMurid=='C'){
                        $tempJawapanMurid = 2;
                    }
                    else if ($ABCDJawapanMurid=='D'){
                        $tempJawapanMurid = 3;
                    }

                    $tempJawapanMurid;
                    // echo $tempJawapanMurid;
                    if ($ABCDJawapanMurid == $answer){
                        $correct += 1;

                        //display question and student answer in green
                        echo "
                            <div class='correct'>
                                <hr>
                                <br>
            
                                <h2 style='margin-left: 5%;'> Soalan $i</h2>
                                <h3 style='margin-left: 5%;'> $soalan </h3>
            
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
                                        if ($tempJawapanMurid==0){
                                            document.getElementById('radioA$i').checked = true;
                                        }
                                        else if ($tempJawapanMurid==1){
                                            document.getElementById('radioB$i').checked = true;
                                        }
                                        else if ($tempJawapanMurid==2){
                                            document.getElementById('radioC$i').checked = true;
                                        }
                                        else if ($tempJawapanMurid==3){
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
                            <h3 style='margin-left: 5%;'> Jawapan Anda : ($answer) $jawapanBetul <span style='isolation: isolate;'>&#9989;</span></h3>
                            <br>
                        ";
                    } 
                    else if ($ABCDJawapanMurid != $answer){
                        //display question and student answer in red   plus display correct answer below
                        echo "
                        <div class='wrong'>
                            <hr>
                            <br>

                            <h2 style='margin-left: 5%;'> Soalan $i</h2>
                            <h3 style='margin-left: 5%;'> $soalan </h3>

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
                                    if ($tempJawapanMurid==0){
                                        document.getElementById('radioA$i').checked = true;
                                    }
                                    else if ($tempJawapanMurid==1){
                                        document.getElementById('radioB$i').checked = true;
                                    }
                                    else if ($tempJawapanMurid==2){
                                        document.getElementById('radioC$i').checked = true;
                                    }
                                    else if ($tempJawapanMurid==3){
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
                        <h3 style='margin-left: 5%;'> Jawapan Anda: ($ABCDJawapanMurid) $resultSetPilihan[$tempJawapanMurid] <span style='isolation: isolate;'>&#10060;</span></h3>
                        <h3 style='margin-left: 5%;'> Jawapan Betul: ($answer) $jawapanBetul <span style='isolation: isolate;'>&#9989;</span></h3>
                        <br>
                        ";
                    }
                }

                echo "
                    </div>
                    <p style='opacity: 0';>.</p>
                    <br>
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