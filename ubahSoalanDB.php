<html>
    <body>
        
        <?php
            require "connectPHP.php";

            //session_start();
            if(isset($_GET['IdTopik'])){
                $IdTopik = $_GET['IdTopik'];          // get the value from URL
                echo $IdTopik;
            }
            
            if(isset($_POST['update-quiz-button'])){
              
                $numberOfForm= (count($_POST));
                $subTopik = $_POST['subTopik'];
                $tajuk = $_POST['tajuk'];

                echo $numberOfForm;
                echo $subTopik;
                echo $tajuk;
                        
                    

                // echo '<script> alert("Soalan berjaya dimuat naik!"); </script>';
                // header('Location: ./indexGuru.php?content=createGuru');       // direct user to home page
                // exit();
            }
            
            
        ?>
    </body>
</html>