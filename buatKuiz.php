<?php
    session_start();

    if ($_SESSION['NoIC'] == ""){
        header('Location: ./login.php');       // why you break inside
    } 
?>

<html>

<head>
    <title> Buat Kuiz </title>
    <link rel="stylesheet" href="mystyleMurid.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
    

    <div class="banner">
        <div style="background-color:  #dadede;">
            <p style="opacity:0;">.</p>
            <h1 style="background-color:  #dadede;"> Ilmu Di Hujung Jari </h1>
            <h2 style="background-color:  #dadede;"> Matematik Tingkatan 4 (DLP) </h2>
            <!--log out button-->
            <div class="logOut">
                <a href="login.php" onclick="return confirm('Log Keluar?')"> Log Keluar </a>   
            </div> 
            <p style="color: #dadede;">.</p>
            <br>
        </div>
        <div class="buatKuizBalik">
            <a href="indexMurid.php?content=collectionMurid" onclick="return confirm('Adakah anda pasti hendak balik? Soalan yang dijawab akan tidak dikira.')"> Balik </a>   
        </div> 
        <br>
        <br>
        <br>
        
    </div>
</head>
<div class="openCalculator">
    <a onclick="openSide()">&#9776; Calculator</a>
</div>

<!-- side function -->
<script>
    function openSide() {
        document.getElementById("side").style.width = "250px";
    }

    function closeSide() {
        document.getElementById("side").style.width = "0";
    }
</script>



<!-- calculator function -->
<script> 
    //function that display value 
    function dis(val) 
    { 
        document.getElementById("result").value+=val;
    } 

    //function that evaluates the digit and return result 
    function solve() 
    { 
        let x = document.getElementById("result").value; 
        let answer = eval(x); 
        document.getElementById("result").value = answer; 
    } 

    //function that clear the display 
    function clr() 
    { 
        document.getElementById("result").value = ""; 
    } #dadede
</script> 

<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
<script>
    function addDarkmodeWidget() {
        new Darkmode().showWidget();
    }
    window.addEventListener('load', addDarkmodeWidget);
</script>

<div id="side" class="side">
	<a href="javascript:void(0)" class="closebtn" onclick="closeSide()">&times;</a>
    <div class="calculator"> 
        <table> 
            <tr>
                <td colspan="4" style="text-align:center; font-size:35px; color:white;">Calculator</td>
            </tr>
            <tr> 
                <td colspan="3"><input type="text" id="result"/></td> 
                <!-- clr() function will call clr to clear all value -->
                <td><input type="button" value="c" onclick="clr()"/> </td> 
            </tr> 
            <tr> 
                <!-- create button and assign value to each button -->
                <!-- dis("1") will call function dis to display value -->
                <td><input type="button" value="1" onclick="dis('1')"/> </td> 
                <td><input type="button" value="2" onclick="dis('2')"/> </td> 
                <td><input type="button" value="3" onclick="dis('3')"/> </td> 
                <td><input type="button" value="/" onclick="dis('/')"/> </td> 
            </tr> 
            <tr> 
                <td><input type="button" value="4" onclick="dis('4')"/> </td> 
                <td><input type="button" value="5" onclick="dis('5')"/> </td> 
                <td><input type="button" value="6" onclick="dis('6')"/> </td> 
                <td><input type="button" value="-" onclick="dis('-')"/> </td> 
            </tr> 
            <tr> 
                <td><input type="button" value="7" onclick="dis('7')"/> </td> 
                <td><input type="button" value="8" onclick="dis('8')"/> </td> 
                <td><input type="button" value="9" onclick="dis('9')"/> </td> 
                <td><input type="button" value="+" onclick="dis('+')"/> </td> 
            </tr> 
            <tr> 
                <td><input type="button" value="." onclick="dis('.')"/> </td> 
                <td><input type="button" value="0" onclick="dis('0')"/> </td> 
                <!-- solve function call function solve to evaluate value -->
                <td><input type="button" value="=" onclick="solve()"/> </td> 
                <td><input type="button" value="x" onclick="dis('*')"/> </td> 
            </tr> 
        </table> 
    </div> 
</div>


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
                <h1 style=\"margin-left: 5.5%;\"> Buat Kuiz </h1>
                <div class=\"buatKuiz\">
                    <br>
                    <div class='buatKuizContainer'>
                        <form id=jawapanMurid' action='addPerekodan.php?IdTopik=$IdTopik' method ='POST' onsubmit='return confirm(\"Adakah anda pasti hendak hantar kuiz yang dibuat?\");'>
                            <br>
                            <div class='tajukBox'>
                                <label for='subTopik'> Sub Topik :  $subTopik</label>
                
                                <br><br><br>

                                <label for='tajuk'> Tajuk :  $tajuk</label><br>
                                
                            </div>
                            <br>
                            <br>
            ";
    ?>

            <?php
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
            ?>
               
                
                 <!-- Display data  -->

                
                <fieldset id = 'form<?php echo $i;?>'>
                    <hr>
                    <br>

                    <legend> Soalan <?php  echo $i; ?></legend>
                    <h3> <?php echo $soalan;?> </h3>

                    <br><br><br><br>

                    <div class='pilihanBox'>
                        <div>
                            <label class='container'>-- (A)   <?php echo $resultSetPilihan[0];?>
                                <input type='radio' name='radio<?php echo $i; ?>' required value='A'>
                                <span class='checkmark'></span>
                            </label><br><br><br>
                            <label class='container'>-- (B)   <?php echo $resultSetPilihan[1];?>
                                <input type='radio' name='radio<?php echo $i; ?>' required value='B'>
                                <span class='checkmark'></span>
                            </label><br><br><br>
                        </div>

                        <div>
                            <label class='container'>-- (C)   <?php echo $resultSetPilihan[2];?>
                                <input type='radio' name='radio<?php echo $i; ?>' required value='C'>
                                <span class='checkmark'></span>
                            </label><br><br><br>
                            <label class='container'>-- (D)   <?php echo $resultSetPilihan[3];?>
                                <input type='radio' name='radio<?php echo $i; ?>' required value='D'>
                                <span class='checkmark'></span>
                            </label><br>
                        </div>

                        <br>
                    </div>
                    <br>
                </fieldset>
                
            <?php            
            }
            ?>

            <?php
            echo "
                        <br>

                        <!-- when clicked then hantar quiz form -->
                        <br>
                        <button type='submit' name='hantar-kuiz-button' class='buatKuizContainer'> Hantar </button>
                        </form>
                        <br>
                        <br>
                        <p style=color: white;'>.</P>
                    <div>
                <div>";

        }
            
    ?>
    
    
</body>
</html>