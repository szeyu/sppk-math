<html>
    <body>
        <?php
            require "connectPHP.php";
        
            
            if(isset($_POST['register-button'])){
                
                $NoIC = $_POST['newNoIC'];               // get the value from what user type in NoIC
                $KataLaluan = $_POST['KataLaluan'];      // get the value from what user type in KataLalauan
                $nama = $_POST['nama'];                  // get the value from what user type in nama
                $NoTel = $_POST['NoTel'];                // get the value from what user type in NoTel
                $KataLaluanKesah = $_POST['KataLaluanKesah'];   // get the value from what user type in KataLaluanKesah

                

                if (preg_match("/^[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|3[0-1])[0-9]{2}[0-9]{4}$/" ,$NoIC)){  
                } else{
                    //$errors['NoIC'] =   "NoIC dalam format salah";
                    header('Location: ./register.php?error=NoIC dalam format yang salah');
                    exit();
                }
                
                if (preg_match("/^[0]{1}[1]{1}[0-9]{1}([0-9]{7}|[0-9]{8})$/",$NoTel)){
                }else {
                    header('Location: ./register.php?error=Nombor telefon dalam format yang salah');
                    exit();
                }

                if ($KataLaluan != $KataLaluanKesah){
                    header('Location: ./register.php?error=Kedua-dua kata laluan tidak sama');
                    exit();

                }


                
                // select all with the NoIC and Password same with what user type in (to check whether alr exst or not)
                $checkExistanceSQL = "SELECT * FROM PENGGUNA WHERE NoIC = '".$NoIC."'OR KataLaluan = '".$KataLaluan."' OR NoTel = '".$NoTel."' LIMIT 1";


                $result = mysqli_query($con,$checkExistanceSQL);         // run the checkexist

                if(mysqli_num_rows($result) != 0){   //if got show result  (that mean alr exist this account)

                
                    //echo '<script> alert("Pengguna tersebut sudah dalam pangkalan data!") </script>';
                    //echo file_get_contents("register.php");    //kick him back to sign up form
                    header('Location: ./register.php?error=Pengguna tersebut sudah dalam pangkalan data');
                    exit();
                }
                else {                                        //add user detail in database
                    //echo("cannot work");

                    $perananAuto = "murid";
                    $addDataToPengguna = "INSERT INTO PENGGUNA (NoIC, KataLaluan, peranan, NoTel, nama) VALUES ('".$NoIC."','".$KataLaluan."','".$perananAuto."','".$NoTel."', '".$nama."')";
                    //$addDataToTelefon = "INSERT INTO TELEFON (NoTel, nama) VALUES ('".$NoTel."', '".$nama."')";

                    mysqli_query($con, $addDataToPengguna);       //run addDataToPengguna
                    //mysqli_query($con, $addDataToTelefon);       //run addDataToTelefon

                    /*
                    if(mysqli_query($con, $addDataToTelefon)){   
                        echo("succesfully added to telefon table");
                    }
                    */       
                        
                    echo '<script> alert("Berjaya didaftarkan!"); </script>';
                    header('Location: ./login.php');       // direct user to login page to login

                    exit();
                }
                


            }
            //mysqli_close($con);        //disconnect
            

        ?>
    </body>
</html>