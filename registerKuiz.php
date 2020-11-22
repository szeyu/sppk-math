<html>
    <body>
        <?php
            require "connectPHP.php";
        
            
            if(isset($_POST['register-quiz-button'])){

                //echo "<p>".$_POST['soalan1']."</p>";     // this line can work


                // run add the subTajuk and tajuk SQL code to get the IdTopik first 
                $subTopik = $_POST['subTopik'];
                $tajuk = $_POST['tajuk'];
                $IdTopik = "T";       // note that the T later will concatenate with last number + 1
                
                //to determine what is the last digit of latest IdTopik
                $getLastDataTopik = "SELECT IdTopik FROM TOPIK ORDER BY DESC LIMIT 1";
                $resultTopik = mysqli_query($con ,$getLastDataTopik);

                if(mysqli_num_rows($resultTopik) == 0){
                    $IdTopik = $IdTopik . "1";     // to make it become T1 which is our fisrt Id for Topik
                } else{
                    echo ($resultTopik);
                }

                //add data to TOPIK SQL
                $addDataToTopik = "INSERT INTO TOPIK (IdTopik, tajuk, subTopik) VALUES (NULL,'".$tajuk."','".$subTopik."')";

                
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


                    // add SQL here because this is loop
                    $addDataToSoalan = "INSERT INTO SOALAN (IdSoalan, NoSoalan, soalan, IdTopik) VALUES (NULL,'".$i."','".$soalan."','".$IdTopik."')";
                } 
                
                // echo ('<script> alert("Soalan berjaya dimuat naik!"); </script>');
                // header('Location: ./indexGuru.php');       // direct user to login page to login
            }
            
            mysqli_close($con);        //disconnect

            exit();

        ?>
    </body>
</html>