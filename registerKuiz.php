<html>
    <body>
        
        <?php
            require "connectPHP.php";

            //session_start();
        
            
            if(isset($_POST['register-quiz-button'])){

                require "addDataToDB.php";
                
                // here add session message
                //$_SESSION['registerQuizMessage'] = "Soalan berjaya dimuat naik!";

                echo '<script> alert("Soalan berjaya dimuat naik!"); </script>';
                header('Location: ./indexGuru.php?content=createGuru');       // direct user to home page
                exit();
            }
            
            
        ?>
    </body>
</html>