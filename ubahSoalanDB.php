<html>
    <body>
        
        <?php
            require "connectPHP.php";

            //session_start();
            if(isset($_GET['IdTopik'])){
                $IdTopik = $_GET['IdTopik'];          // get the value from URL
                echo "IdTopik: $IdTopik"."<br>";
            }
            
            if(isset($_POST['update-quiz-button'])){
              
                $numberOfForm= (count($_POST) - 3)/6;
                $subTopik = $_POST['subTopik'];
                $tajuk = $_POST['tajuk'];

                echo "Number Of Form: $numberOfForm"."<br>"."<br>";
                echo "SubTopik: $subTopik"."<br>";
                echo "Tajuk: $tajuk"."<br>"."<br>";
                
                //////////////////////////////////////////////////
                ///         Check how many question deleted
                //////////////////////////////////////////////////



                /////////////////////////////////////////
                ///         Here add for loops
                /////////////////////////////////////////
                
                    

                // echo '<script> alert("Soalan berjaya dimuat naik!"); </script>';
                // header('Location: ./indexGuru.php?content=createGuru');       // direct user to home page
                // exit();
            }
            
            
        ?>
    </body>
</html>