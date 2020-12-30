<html>
    <body>
        
        <?php
            require "connectPHP.php";

            //session_start();
            if(isset($_GET['IdTopik'])){
                $IdTopik = $_GET['IdTopik'];          // get the value from URL
                // echo "IdTopik: $IdTopik"."<br>";
            }
            
            if(isset($_POST['update-quiz-button'])){
                
                // delete the old record
                require "deleteTopik.php";

                // create new record
                //require "addDataToDB.php"; 
                

                echo '<script> alert("Soalan berjaya diubah!"); </script>';
                header('Location: ./indexGuru.php?content=collectionGuru');       // direct user to home page
                exit();
            }
            
            
        ?>
    </body>
</html>