<html>
    <body>
        <?php
            // connect to mySQL database
            require "connectPHP.php";

            if(isset($_POST['update-quiz-button'])){

                // this is IdTopik
                $IdTopik = $_GET['IdTopik'];               // get the value from URL
                $subTopik = $_POST['subTopik'];
                $tajuk = $_POST['tajuk'];


                ////////////////////////////
                //        Topik
                //////////////////////////
                //change data of TOPIK SQL
                $changeDataOfTopik = "UPDATE TOPIK SET tajuk='".$tajuk."', subTopik='".$subTopik."' WHERE IdTopik='".$IdTopik."'";
                mysqli_query($con, $changeDataOfTopik);     // querry




                // select all IdSoalan with that IdTopik
                $checkIdSoalanSQL = "SELECT IdSoalan FROM SOALAN WHERE IdTopik = '".$IdTopik."' ORDER BY LENGTH(IdSoalan) DESC, IdSoalan ASC";
                $resultSoalan = mysqli_query($con,$checkIdSoalanSQL);         // query

                $noSoalan = (count($_POST) - 3)/6;
                for ($i=1; $i<=$noSoalan; $i++) {

                    // declare the variable 
                    $soalan = $_POST["soalan$i"];
                    $jawapan = $_POST["jawapan$i"];
                    $pilihanA = $_POST["pilihanA$i"];
                    $pilihanB = $_POST["pilihanB$i"];
                    $pilihanC = $_POST["pilihanC$i"];
                    $pilihanD = $_POST["pilihanD$i"];

                    $jawapanA = 0;
                    $jawapanB = 0;
                    $jawapanC = 0;
                    $jawapanD = 0;


                    // determine which jawapan = 1
                    if ($jawapan == "A"){ 
                        $jawapanA = 1;

                    }else if ($jawapan == "B"){ 
                        $jawapanB = 1;

                    }else if ($jawapan == "C"){ 
                        $jawapanC = 1;

                    }else if ($jawapan == "D"){ 
                        $jawapanD = 1;
                    }


                    //////////////////////////////////////////////////////
                    //     at the same time, need change data of PILIHAN
                    //////////////////////////////////////////////////////

                    // add SQL here because this is loop     --- 4 times ---
                    

                    // get idSoalan
                    $rowSoalan = mysqli_fetch_assoc($resultSoalan);
                    $IdSoalan = $rowSoalan['IdSoalan'];
                   
                    // change data of SOALAN SQL
                    $changeDataOfSoalan = "UPDATE SOALAN SET soalan='".$soalan."' WHERE IdSoalan='".$IdSoalan."'";
                    mysqli_query($con, $changeDataOfSoalan);

                    // change data of PILIHAN SQL
                    //pilihan A
                    $changeDataOfPilihanA = "UPDATE PILIHAN SET jawapan='".$jawapanA."', pilihan='".$pilihanA."' WHERE IdSoalan='".$IdSoalan."'";
                    mysqli_query($con, $changeDataOfPilihanA); // query


                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                    // get idSoalan
                    $rowSoalan = mysqli_fetch_assoc($resultSoalan);
                    $IdSoalan = $rowSoalan['IdSoalan'];

                    $changeDataOfSoalan = "UPDATE SOALAN SET soalan='".$soalan."' WHERE IdSoalan='".$IdSoalan."'";
                    mysqli_query($con, $changeDataOfSoalan);

                    // change data of PILIHAN SQL
                    //pilihan B
                    $changeDataOfPilihanB = "UPDATE PILIHAN SET jawapan='".$jawapanB."', pilihan='".$pilihanB."' WHERE IdSoalan='".$IdSoalan."'";
                    mysqli_query($con, $changeDataOfPilihanB); // query

                    
                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                    // get idSoalan
                    $rowSoalan = mysqli_fetch_assoc($resultSoalan);
                    $IdSoalan = $rowSoalan['IdSoalan'];

                    // change data of SOALAN SQL
                    $changeDataOfSoalan = "UPDATE SOALAN SET soalan='".$soalan."' WHERE IdSoalan='".$IdSoalan."'";
                    mysqli_query($con, $changeDataOfSoalan);

                    // change data of PILIHAN SQL
                    //pilihan C
                    $changeDataOfPilihanC = "UPDATE PILIHAN SET jawapan='".$jawapanC."', pilihan='".$pilihanC."' WHERE IdSoalan='".$IdSoalan."'";
                    mysqli_query($con, $changeDataOfPilihanC); // query

                    
                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                    // get idSoalan
                    $rowSoalan = mysqli_fetch_assoc($resultSoalan);
                    $IdSoalan = $rowSoalan['IdSoalan'];

                    // change data of SOALAN SQL
                    $changeDataOfSoalan = "UPDATE SOALAN SET soalan='".$soalan."' WHERE IdSoalan='".$IdSoalan."'";
                    mysqli_query($con, $changeDataOfSoalan);

                    // change data of PILIHAN SQL
                    //pilihan D
                    $changeDataOfPilihanD = "UPDATE PILIHAN SET jawapan='".$jawapanD."', pilihan='".$pilihanD."' WHERE IdSoalan='".$IdSoalan."'";
                    mysqli_query($con, $changeDataOfPilihanD); // query

                }
                
                
                echo '<script> 
                alert("Soalan berjaya diubah!"); 
                window.location = "indexGuru.php?content=collectionGuru";
                </script>';
                //header('Location: ./indexGuru.php?content=collectionGuru');       // direct user to collectionGuru page
                exit();
            }
        ?>
    </body>
</html>