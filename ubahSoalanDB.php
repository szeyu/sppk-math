<html>
    <body>
        
        <?php
            require "connectPHP.php";

            //session_start();
        
            
            if(isset($_POST['update-quiz-button'])){


                echo '<script> alert("Soalan berjaya dimuat naik!"); </script>';
                header('Location: ./indexGuru.php?content=createGuru');       // direct user to home page
                exit();
            }
            
            
        ?>
    </body>
</html>