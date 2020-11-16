
<html>
    <body>
        <?php
       
            $host = "localhost";
            $user =  "root";
            $password = "";
            $db = "sppk math";

            $con = mysqli_connect($host,$user,$password,$db);   //connect to localhost server

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();    //show errror if unable to connect
                exit();
            }
            

            if(isset($_POST['login-button'])){
                
                $NoIC = $_POST['NoIC'];               // get the value from what user type in NoIC
                $KataLaluan = $_POST['KataLaluan'];    // get the value from what user type in KataLalauan
                
                if (empty ($NoIC)){
                    header('Location: ./login.php?error=NoIC dikehendaki');
                    exit();
                }elseif (empty ($KataLaluan)){
                    header('Location: ./login.php?error=KataLaluan dikehendaki');
                    exit();
                }else{
                    echo "Valid input";
                }

                if (preg_match("/^[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|3[0-1])[0-9]{2}[0-9]{4}$/" ,$NoIC)){  
                } else{
                    //$errors['NoIC'] =   "NoIC dalam format salah";
                    header('Location: ./login.php?error=NoIC dalam format yang salah');
                    exit();
                }
 
                // select all with the NoIC and Password same with what user type in
                $checkPassSQL = "SELECT * FROM PENGGUNA WHERE NoIC = '".$NoIC."'AND KataLaluan = '".$KataLaluan."'LIMIT 1";

                //select the peranan of the user ('guru' or 'murid')
                $checkPerananSQL = "SELECT peranan FROM pengguna WHERE NoIC = '".$NoIC."'AND KataLaluan = '".$KataLaluan."'LIMIT 1";

                $result = mysqli_query($con,$checkPassSQL);         // run the
                $peranan = mysqli_query($con,$checkPerananSQL);     // sql query

                if(mysqli_num_rows($result) == 1){   //if got show result and the only one

                    if($row = mysqli_fetch_row($peranan)){
                        //echo ("guru");
                        if($row[0] == 'murid'){        // if peranan is murid, it will login as murid
                            header('Location: ./indexMurid.php');
                        }
                        else if ($row[0] == 'guru'){            // if peranan is guru, it will login as guru
                            header('Location: ./indexGuru.php');
                        }
                    }
                    else{
                        echo("error: NULL value detected");     // the value inside SQL is NULL or not 'guru' or 'murid'
                    }
                    exit();
                }
                else{
                    //echo '<script> alert("Salah, sila masukkan NoIC dan kata laluan lagi.") </script>';
                    //$errors['salah'] = "NoIC atau Kata Laluan anda salah";
                    header('Location: ./login.php?error=NoIC atau KataLaluan salah');       // ask user to type again

                    exit();
                }
                mysqli_free_result($result);        //clear the memory
                mysqli_free_result($peranan);
            }
                
            //mysqli_close($con);        //disconnect
            

        ?>
    </body>
</html>