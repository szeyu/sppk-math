<html>
    <body>
        <?php
            require "connectPHP.php";
        
            
            if(isset($_POST['register-quiz-button'])){

                //echo "<p>".$_POST['soalan1']."</p>";     // this line can work
                
                for ($i=1; $i<=count($_POST); $i++) {

                    echo "<p>".$_POST["'soalan'+$i"]."</p>";
                    echo "<p>".$_POST['jawapan1']."</p>";
                    echo "<hr />";

                } 
                
                // echo ('<script> alert("Soalan berjaya dimuat naik!"); </script>');
                // header('Location: ./indexGuru.php');       // direct user to login page to login
            }
            
            mysqli_close($con);        //disconnect

            exit();

        ?>
    </body>
</html>