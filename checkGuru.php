<?php
    session_start();

    if ($_SESSION['NoIC'] == ""){
        header('Location: ./login.php');       // why you break inside
    } 
?>

<?php
    require "connectPHP.php";
    // get perekodan rekod in descending order because need latest on the top
    $selectDataFromRekod = "SELECT * FROM PEREKODAN ORDER BY LENGTH(IdRekod) DESC, IdRekod DESC";
    $result = mysqli_query($con,$selectDataFromRekod);         // query


    // get all murid info
    $selectMurid = "SELECT * FROM PENGGUNA WHERE peranan = 'murid'";
    $resultMurid = mysqli_query($con,$selectMurid);         // query
?>



<!DOCTYPE html>
    
    <head>
        <title> Pantau Prestasi Murid </title>
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
            <!--log out button-->
            <div class="logOut">
                <a href="login.php" onclick="return confirm('Log Keluar?')"> Log Keluar </a>   
            </div> 
            <p style="color: #dadede;">.</p>
        </div>
        
    </div>

    <!--Top navigation bar-->
    <div id="topnav" class="topnav">
        <a class="active-button" onclick="homeGuru()">Laman Utama</a>
        <a class="active-button" onclick="createGuru()">Sedia Kuiz</a>     
        <a class="active-button" onclick="collectionGuru()">Koleksi Kuiz</a>
        <a class="active" onclick="checkGuru()">Pantau Prestasi Murid</a>
    </div>

    <script>
        function homeGuru(){
            // $("#contentGuru").load("homeGuru.php");
            window.location = 'indexGuru.php?content=homeGuru';
        }

        function createGuru(){
            // $("#contentGuru").load("createGuru.php");
            window.location = 'indexGuru.php?content=createGuru';
        }

        function collectionGuru(){
            // $("#contentGuru").load("collectionGuru.php");
            window.location = 'indexGuru.php?content=collectionGuru';
        }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
    <script>
        function addDarkmodeWidget() {
            new Darkmode().showWidget();
        }
        window.addEventListener('load', addDarkmodeWidget);
    </script>


    <body class="checkGuru">
    
        <h1 style="margin-left: 4.5%;"> Pantau Prestasi Murid </h1>


        <!-- put search bar for perekodan -->
        <!-- so can put perekodan table here -->
        <div class="perekodanGuru">
            <br>
            <br>
            
            <!-- button to cetak laporan -->
            <span class="print"><button type="button" name="print" onclick="window.print();"> Cetak Laporan </button></span>

            <input type="text" name="search" id="searchRekod" onkeyup="filterTopik()" placeholder="Cari.." list="suggestion" spellcheck="false" autofocus>
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
            
            <div class = "perekodanGuruContainer">
                <br>
                <br>
                <br>
                <br>
                <h1 style="margin-left: 4.5%;"> Perekodan </h1>
                <div id="section-to-print" style="overflow-x:auto;">
                    
                    
                    <table id='rekodTable'>
                        <tr class='tableHeader'>
                            <th>IdRekod</th>
                            <th>markah</th>
                            <th>tarikh</th>
                            <th>IdTopik</th>
                            <th>subTopik</th>
                            <th>tajuk</th>
                            <th>NoIC</th>
                            <th id="NoPrint">Tindakan</th>
                            
                        </tr>

                         
                    <?php 
                        while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results ?>
                            <?php 
                                $selectDataFromTopik = "SELECT * FROM TOPIK WHERE IdTopik = '".$row['IdTopik']."'";
                                $resultTopik = mysqli_query($con,$selectDataFromTopik);         // query
                                $rowTopik = mysqli_fetch_array($resultTopik);
                            ?>
                            <tr>
                                <td><?php echo $row['IdRekod']; ?></td>
                                <td><?php echo $row['markah']; ?></td>
                                <td><?php echo $row['tarikh']; ?></td>
                                <td><?php echo $row['IdTopik']; ?></td>
                                <td><?php echo $rowTopik['subTopik']; ?></td>
                                <td><?php echo $rowTopik['tajuk']; ?></td>
                                <td><?php echo $row['NoIC']; ?></td>
                                <td id="NoPrint">
                                    <?php echo '<button type="button" class="semakJawapan" name="semakJawapan" onclick="semakJawapan(\'' . $row['IdRekod'] . '\')"> Semak jawapan </button>';
                                    ?>
                                    
                                </td>
                                
                            </tr>
                    <?php } ?>

                    </table>

                        
                </div>
                <p style="opacity:0;">.</p>
            </div>
                    
            <script>
                /////////////////////////////   PEREKODAN ////////////////////////////////////////////////
                // filter function  for perekodan
                function filterTopik() {
                    var input, filter, table, tr, td, cell, i, j;
                    input = document.getElementById("searchRekod");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("rekodTable");
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
                function semakJawapan(id) {
                    window.location = 'semakJawapan.php?IdRekod=' + id;
                }
                
            </script>
            
        </div>






                                    <!--   MURID   -->

        <!-- in search bar suggestion can put all student id that is registered inside [ Recomended ] -->
        <!-- can put table of murid -->
        <div class="pantauMurid">
            <br>
            <br>
            
            
            <input type="text" name="search" id="searchMurid" onkeyup="filterMurid()" placeholder="Cari.." spellcheck="false">
            
            <div class = "pantauMuridContainer">
                <br>
                <br>
                <br>
                <br>
                <h1 style="margin-left: 4.5%;"> Murid </h1>
                <div style="overflow-x:auto;">
                    
                    
                    <table id='muridTable'>
                        <tr class='tableHeader'>
                            <th>NoIC</th>
                            <th>nama</th>
                            <th>NoTel</th>
                            <th>Tindakan</th>
                            
                        </tr>

                         
                    <?php 
                        while($rowMurid = mysqli_fetch_array($resultMurid)){   //Creates a loop to loop through murid ?>
                            <tr>
                                <td><?php echo $rowMurid['NoIC']; ?></td>
                                <td><?php echo $rowMurid['nama']; ?></td>
                                <td><?php echo $rowMurid['NoTel']; ?></td>
                                
                                <td>
                                    <?php echo '<button type="button" class="pantauPrestasi" name="pantauPrestasi" onclick="pantauPrestasi(\'' . $rowMurid['NoIC'] . '\')"> Pantau Prestasi </button>';
                                    ?>
                                    
                                </td>
                                
                            </tr>
                    <?php } ?>

                    </table>

                        
                </div>
                <p style="opacity:0;">.</p>
            </div>
            <p style="opacity:0;">.</p>
                    
            <script>
                ///////////////////////////   MURID   /////////////////////////////////
                // filter function  for perekodan
                function filterMurid() {
                    var input, filter, table, tr, td, cell, i, j;
                    input = document.getElementById("searchMurid");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("muridTable");
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
                function pantauPrestasi(id) {
                    window.location = 'pantauPrestasi.php?NoIC=' + id;
                }
                
            </script>

        <div>
    </body>
    
</html>