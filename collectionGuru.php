<?php
    session_start();

    if ($_SESSION['NoIC'] == ""){
        header('Location: ./login.php');       // why you break inside
    } 
?>

<!DOCTYPE html>

    <?php 
        // require "process.php";
        require "connectPHP.php";

        $counter = "SELECT COUNT(IdTopik) FROM TOPIK";
        $result = mysqli_query($con, $counter);
        if($row = mysqli_fetch_assoc($result)){
            $totalTopik = $row['COUNT(IdTopik)'][0];
        }
        $totalTopik = (int)$totalTopik;

    ?>
    
    <head>
        <title> Koleksi Soalan </title>
        <link rel="stylesheet" href="mystyle.css">
        <link rel="icon" type="image/png" sizes="32x32" href="Image/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
        
    </head>

    <!--Banner-->
    <div class="banner">
        <div style="background-color:  #dadede;">
            <p style="color: #dadede;">.</p>
            <h1 style="background-color:  #dadede;"> Ilmu Di Hujung Jari </h1>
            <h2 style="background-color:  #dadede;"> Matematik Tingkatan 4 (DLP) </h2>
            
            <p style="color: #dadede;">.</p>
        </div>
        
    </div>

    <!--Top navigation bar-->
    <div id="topnav" class="topnav">
        <a class="active-button" onclick="homeGuru()">Laman Utama</a>
        <a class="active-button" onclick="createGuru()">Sedia Kuiz</a>     
        <a class="active" onclick="collectionGuru()">Koleksi Kuiz</a>
        <a class="active-button" onclick="checkGuru()">Pantau Prestasi Murid</a>
        <!--log out button-->
        <div class="logOut">
            <a href="login.php" onclick="return confirm('Log Keluar?')"> Log Keluar </a>   
        </div> 
    </div>

    <script>
        function homeGuru(){
            window.location = 'indexGuru.php?content=homeGuru';
        }

        function createGuru(){
            window.location = 'indexGuru.php?content=createGuru';
        }

        function checkGuru(){
            window.location = 'indexGuru.php?content=checkGuru';
        }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
    <script>
        function addDarkmodeWidget() {
            new Darkmode().showWidget();
        }
        window.addEventListener('load', addDarkmodeWidget);
    </script>


    <body>
        <h1 style="margin-left: 4.5%;"> Koleksi Soalan</h1>
        <br>
        <div class="collectionGuru">
            <br>
            <br>
            <div class = "collectionGuruContainer">

                <input type="text" name="search" id="searchTopik" onkeyup="filterTopik()" placeholder="Cari.." list="suggestion" spellcheck="false" autofocus>
                <datalist id="suggestion">
                    <option value="1.1"></option>
                    <option value="2.1"></option>
                    <option value="3.1"></option>
                    <option value="3.2"></option>
                    <option value="4.1"></option>
                    <option value="4.2"></option>
                    <option value="4.3"></option>
                    <option value="5.1"></option>
                    <option value="6.1"></option>
                    <option value="7.1"></option>
                    <option value="7.2"></option>
                    <option value="8.1"></option>
                    <option value="8.2"></option>
                    <option value="9.1"></option>
                    <option value="9.2"></option>
                    <option value="9.3"></option>
                    <option value="9.4"></option>
                    <option value="10.1"></option>
                    <option value="revision"></option>
                    <option value="Quadratic Function and Equations"></option>
                    <option value="Number Base"></option>
                    <option value="Statements"></option>
                    <option value="Arguments"></option>
                    <option value="Intersection of Sets"></option>
                    <option value="Union of Sets"></option>
                    <option value="Combined Operation on Sets"></option>
                    <option value="Network"></option>
                    <option value="Linear Inequalities in Two Variables"></option>
                    <option value="Systems of Linear Inequalities in Two Variables"></option>
                    <option value="Distance-Time Graphs"></option>
                    <option value="Dispersion"></option>
                    <option value="Measure of Dispersion"></option>
                    <option value="Combined Event"></option>
                    <option value="Dependent Events and Independent Events"></option>
                    <option value="Mutually Exclusive Events and Non-Mutually Exclusive Events"></option>
                    <option value="Application of Probability of Combined Events"></option>
                    <option value="Financial Planning of combined Events"></option>
                </datalist>
                
                <!-- <p style = "background-color: white;">.</p> -->

            
                <br>
                <br>
                <br>
                <br>
                <div>
                    <?php

                        require "connectPHP.php";

                        $selectDataFromTopik = "SELECT * FROM TOPIK ORDER BY LENGTH(IdTopik) DESC, IdTopik DESC";
                        $result = mysqli_query($con,$selectDataFromTopik);         // query
                    ?>
                    
                    <table id='topikTable'>
                        <tr class='tableHeader'>
                            <th>IdTopik</th>
                            <th>Sub topik</th>
                            <th>Tajuk</th>
                            <th>Tindakan</th>
                            
                        </tr>

                         
                    <?php 
                        while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results ?>
                            <tr>
                                <td><?php echo $row['IdTopik']; ?></td>
                                <td><?php echo $row['subTopik']; ?></td>
                                <td><?php echo $row['tajuk']; ?></td>
                                <td>
                                    <?php echo '<button type="button" class="changeButton" name="change-button" onclick="updateTopik(\'' . $row['IdTopik'] . '\')"> Ubah </button>';
                                    ?>
                                    
                                    <!-- <a href="indexGuru.php?change=<?php //echo $row['IdTopik']; ?>"
                                        class="changeButton"> Ubah </a> -->                        
                                    <?php echo '<button type="button" class="deleteButton" name="delete-button" onclick="deleteTopik(\'' . $row['IdTopik'] . '\')"> Padamkan </button>';
                                    ?>
                                    <!-- <a href="indexGuru.php?delete=<?php //echo $row['IdTopik']; ?>"
                                        class="deleteButton"> Padamkan </a> -->

                                    <?php
                                    $IdTopik=$row['IdTopik'];
                                    ?>

                                    <?php //echo '<button type="button" class="infoButton" name="info-button" onclick="infoTopik(\'' . $IdTopik . '\')"> Info </button>';
                                    ?>


                                    <?php 
                                        $countCompleted = "SELECT COUNT(IdRekod) FROM PEREKODAN WHERE IdTopik = '".$IdTopik."'";
                                        $resultNumComplete = mysqli_query($con,$countCompleted);         // query
                                        $rowNumComplete = mysqli_fetch_array($resultNumComplete);
                                        $numberOfCompleted = $rowNumComplete[0];


                                        $countNumberOfMurid = "SELECT COUNT(NoIC) FROM PENGGUNA WHERE peranan = 'murid'";
                                        $resultNumMurid = mysqli_query($con,$countNumberOfMurid);         // query
                                        $rowNumMurid = mysqli_fetch_array($resultNumMurid);
                                        $numberOfMurid = $rowNumMurid[0];

                                    ?>
                                    
                                    <?php if ($numberOfCompleted == $numberOfMurid){ ?>
                                        <button class="completedTask"> Semua Hantar ! </button> 
                                    <?php } else{ ?>
                                        <button class="completedTask"> Murid yang hantar : <?php echo "$numberOfCompleted / $numberOfMurid"; ?> </button>
                                    <?php } ?>
                                    
                                    <p style="opacity:0;">.</p>
                                    <div class="container">
                                    <p style="opacity:0;"> PP </p>
                                    <div class="overlay">
                                        <div class="text"><?php echo '<button type="button" class="infoButton" name="info-button" onclick="infoTopik(\'' . $IdTopik . '\')"> Info Lanjut</button>';?></div>
                                    </div>
                                    </div>

                                </td>
                                
                            </tr>
                    <?php } ?>

                    </table>

                        
                </div>
                    
                <script>
                    // filter function
                    function filterTopik() {
                        var input, filter, table, tr, td, cell, i, j;
                        input = document.getElementById("searchTopik");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("topikTable");
                        tr = table.getElementsByTagName("tr");
                        for (i = 1; i < tr.length; i++) {
                            // Hide the row initially.
                            tr[i].style.display = "none";
                        
                            td = tr[i].getElementsByTagName("td");
                            for (var j = 0; j < td.length; j++) {
                                cell = tr[i].getElementsByTagName("td")[j];
                                if (cell) {
                                    if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                        tr[i].style.display = "";
                                        break;
                                    }
                                }
                            }
                        }
                    }

                            
                </script>

                <script>
                    function deleteTopik(id) {
                        if(confirm("Adakah anda pasti hendak memadamkan rekod ini?")){
                            var password = prompt("Sila masukkan kata laluan untuk teruskan tindakan ini");
                            if(password == "haiya") {
                                window.location = 'deleteTopik.php?IdTopik=' + id;
                            } else {
                                alert("Kata laluan salah!");
                            }
                        }else {
                            //do nothing
                        }
                        
                    }

                    function updateTopik(id) {
                        window.location = 'updateTopik.php?IdTopik=' + id;
                    }

                    function infoTopik(id) {
                        window.location = 'infoTopik.php?IdTopik=' + id;
                    }
                    
                </script>

                <br>
                <br>
                <br>
                <br>
                <br>

            </div>
            <br>
        </div>
        
    </body>
    
</html>