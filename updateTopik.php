<?php
    session_start();

    if ($_SESSION['NoIC'] == ""){
        header('Location: ./login.php');       // why you break inside
    } 
?>

<html>
    <head>
        <title> Update Topik </title>
        <link rel="stylesheet" href="mystyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->

        <div class="banner">
            <div style="background-color:  #dadede;">
                <p style="color: #dadede;">.</p>
                <h1 style="background-color:  #dadede;"> Ilmu Di Hujung Jari </h1>
                <h2 style="background-color:  #dadede;"> Matematik Tingkatan 4 (DLP) </h2>
                <!--log out button-->
                <div class="logOut">
                    <a href="login.php" onclick="return confirm('Log Keluar?')"> Log Keluar </a>   
                </div> 
                <p style="color: #dadede;">.</p>
                <br>
            </div>
            <div class="updateBalik">
                <a href="indexGuru.php?content=collectionGuru"> Balik </a>   
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

    <script src="functionGuru.js"></script>

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
                $checkIdSoalanSQL = "SELECT * FROM SOALAN WHERE IdTopik = '".$IdTopik."' ORDER BY LENGTH(IdSoalan) DESC, IdSoalan ASC";
                $resultSoalan = mysqli_query($con,$checkIdSoalanSQL);         // query
                $numberOfRow = mysqli_num_rows($resultSoalan);       
                $totalNumberOfSoalan = $numberOfRow / 4;        // need to divide by 4 to find the total number of soalan
                echo "
                <script>
                    var noSoalanCounter = $totalNumberOfSoalan;
                </script>
                ";
               
                echo "
                    <h1 style=\"margin-left: 5.5%;\"> Ubah Kuiz </h1>
                    <div class=\"createGuru\">
                    <br>
                    <div class='createGuruContainer'>
                        <form id=soalanForm' action='ubahSoalanDB.php?IdTopik=$IdTopik' method ='POST' onsubmit='return confirm(\"Ubah Soalan?\");'>
                            <br>
                            <div class='tajukBox'>
                                <label for='subTopik'> Sub Topik :</label>
                                <input type='text' placeholder='sub topik' name='subTopik' id='subTopik' list='subTopiks' spellcheck='false' required value='$subTopik'>
                                <datalist id='subTopiks'>
                                    <option value='1.1'></option>
                                    <option value='2.1'></option>
                                    <option value='3.1'></option>
                                    <option value='3.2'></option>
                                    <option value='4.1'></option>
                                    <option value='4.2'></option>
                                    <option value='4.3'></option>
                                    <option value='5.1'></option>
                                    <option value='6.1'></option>
                                    <option value='7.1'></option>
                                    <option value='7.2'></option>
                                    <option value='8.1'></option>
                                    <option value='8.2'></option>
                                    <option value='9.1'></option>
                                    <option value='9.2'></option>
                                    <option value='9.3'></option>
                                    <option value='9.4'></option>
                                    <option value='10.1'></option>
                                    <option value='revision'></option>
                                </datalist>
                                <br>
                                <label for='tajuk'> Tajuk :</label>
                                <input type='text' placeholder='Tajuk' name='tajuk' id='tajuk' list='tajuks' spellcheck='false' required value='$tajuk'>
                                <datalist id='tajuks'>
                                    <option value='Quadratic Function and Equations'></option>
                                    <option value='Number Base'></option>
                                    <option value='Statements'></option>
                                    <option value='Arguments'></option>
                                    <option value='Intersection of Sets'></option>
                                    <option value='Union of Sets'></option>
                                    <option value='Combined Operation on Sets'></option>
                                    <option value='Network'></option>
                                    <option value='Linear Inequalities in Two Variables'></option>
                                    <option value='Systems of Linear Inequalities in Two Variables'></option>
                                    <option value='Distance-Time Graphs'></option>
                                    <option value='Dispersion'></option>
                                    <option value='Measure of Dispersion'></option>
                                    <option value='Combined Event'></option>
                                    <option value='Dependent Events and Independent Events'></option>
                                    <option value='Mutually Exclusive Events and Non-Mutually Exclusive Events'></option>
                                    <option value='Application of Probability of Combined Events'></option>
                                    <option value='Financial Planning of combined Events'></option>
                                </datalist>
                            </div>
                            <br><br>
                ";

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
                    //echo $soalan;

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

                    //need to build option in array, so that can make the comparison
                    $options = [
                        'A'=> 'A',
                        'B'=> 'B',
                        'C'=> 'C',
                        'D'=> 'D'
                    ];
                    
                    //build option html
                    $html_options = '';
                    foreach($options as $value => $label){
                        $selected = ($value == $answer) ? 'selected' : '';
                        $html_options .= "<option value='$value' $selected>$label</option>";
                    }
                    
                    ////////// Display data ////////////////////

                    echo "
                        <div id = 'soalanForm$i'>
                            <hr>
                            <br>
                            <label for='soalan'> Soalan $i  :</label>
                            <input type='text' placeholder='Soalan $i' id='soalan$i' name='soalan$i' spellcheck='false' required value='$soalan' autocomplete='off'><br>
                            <br>
                            <div class='jawapanBox'>
                                <label for='jawapan'> Jawapan :</label>                            
                                <select name='jawapan$i' id='jawapan$i'>$html_options</select> 
                            
                            </div>
                            <br><br><br><br><br>
                            <div class='pilihanBox'>
                                <div>
                                <label for='pilihanA' style='float: left;'> pilihan A :</label>
                                </div>
                                <div>
                                <input type='text' placeholder='Pilihan A Soalan $i' id='pilihanA$i' name='pilihanA$i' spellcheck='false' required value='$resultSetPilihan[0]' autocomplete='off'>
                                </div>
                                <div>
                                <label for='pilihanB' style='float: left;'> pilihan B :</label>
                                </div>
                                <div>
                                <input type='text' placeholder='Pilihan B Soalan $i' id='pilihanB$i' name='pilihanB$i' spellcheck='false' required value='$resultSetPilihan[1]' autocomplete='off'>
                                </div>
                                <div>
                                <label for='pilihanC' style='float: left;'> pilihan C :</label>
                                </div>
                                <div>
                                <input type='text' placeholder='Pilihan C Soalan $i' id='pilihanC$i' name='pilihanC$i' spellcheck='false' required value='$resultSetPilihan[2]' autocomplete='off'>
                                </div>
                                <div>
                                <label for='pilihanD' style='float: left;'> pilihan D :</label>
                                </div>
                                <div>
                                <input type='text' placeholder='Pilihan D Soalan $i' id='pilihanD$i' name='pilihanD$i' spellcheck='false' required value='$resultSetPilihan[3]' autocomplete='off'>
                                </div>
                                <br>
                            </div>
                            <br>
                        </div>
                    "; 
                }

                echo "
                        <br><br>
                        <button type='submit' name='update-quiz-button' onclick='updateSoalan()'> Ubah </button>
                        </form>
                        <br><br>
                        <p style=color: white;'>.</P>
                    <div>
                    <div>";

            }
        ?>
    </body>
</html>