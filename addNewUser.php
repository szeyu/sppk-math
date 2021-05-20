<html>
    <body>
        <?php
            // connect to MySQL database
            require "connectPHP.php";

            // if the register button is clicked
            if(isset($_POST['register-button'])){
                
                $NoIC = $_POST['newNoIC'];               // get the value from what user type in NoIC
                $KataLaluan = $_POST['KataLaluan'];      // get the value from what user type in KataLalauan
                $nama = $_POST['nama'];                  // get the value from what user type in nama
                $NoTel = $_POST['NoTel'];                // get the value from what user type in NoTel
                $KataLaluanKesah = $_POST['KataLaluanKesah'];   // get the value from what user type in KataLaluanKesah

                
                // Jika salah kick back to login screen
                // check the format of NoIC
                if (preg_match("/^[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|3[0-1])[0-9]{2}[0-9]{4}$/" ,$NoIC)){  
                } else{
                    header('Location: ./register.php?error=NoIC dalam format yang salah');
                    exit();
                }
                
                // Check the format of malaysia NoTel
                if (preg_match("/^[0]{1}[1]{1}[0-9]{1}([0-9]{7}|[0-9]{8})$/",$NoTel)){
                }else {
                    header('Location: ./register.php?error=Nombor telefon dalam format yang salah');
                    exit();
                }

                // Check the confirmation password same with first password or not
                if ($KataLaluan != $KataLaluanKesah){
                    header('Location: ./register.php?error=Kedua-dua kata laluan tidak sama');
                    exit();

                }

                // select all with the NoIC and Password same with what user type in (to check whether alr exst or not)
                $checkExistanceSQL = "SELECT * FROM PENGGUNA WHERE NoIC = '".$NoIC."'OR KataLaluan = '".$KataLaluan."' OR NoTel = '".$NoTel."' LIMIT 1";

                $result = mysqli_query($con,$checkExistanceSQL);         // run the checkexist

                if(mysqli_num_rows($result) != 0){   //if got show result  (that mean alr exist this account)

                    //kick him back to sign up form
                    header('Location: ./register.php?error=Pengguna tersebut sudah dalam pangkalan data');
                    exit();
                }
                else {                                        //add user detail in database
                    $perananAuto = "murid";
                    $addDataToPengguna = "INSERT INTO PENGGUNA (NoIC, KataLaluan, peranan, NoTel, nama) VALUES ('".$NoIC."','".$KataLaluan."','".$perananAuto."','".$NoTel."', '".$nama."')";

                    mysqli_query($con, $addDataToPengguna);       //run addDataToPengguna
                        
                    header('Location: ./login.php');       // direct user to login page to login
                    exit();
                }
            }
        ?>
    </body>
</html>