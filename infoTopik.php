<?php
    require "connectPHP.php";
    
    session_start();

    if ($_SESSION['NoIC'] == ""){
        header('Location: ./login.php');       // why you break inside
    } 
?>


<html>

<head>
    <title> Semak Jawapan </title>
    <link rel="stylesheet" href="mystyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
    

    <div class="banner" style="text-align:center;">
        <div style="background-color:  #dadede;">
            <p style="opacity: 0;">.</p>
            <h1 style="background-color:  #dadede;"> Ilmu Di Hujung Jari </h1>
            <h2 style="background-color:  #dadede;"> Matematik Tingkatan 4 (DLP) </h2>
            <!--log out button-->
            <div class="logOut">
                <a href="login.php" onclick="return confirm('Log Keluar?')"> Log Keluar </a>   
            </div> 
            <p style="opacity: 0;">.</p>
            <br>
        </div>
        <div class="infoTopikOK">
            <!-- can use check peranan before go to another so here can put onclick then js determine which way to go -->
            <a href='indexGuru.php?content=collectionGuru'> OK </a>   
        </div> 
        <br>
        <br>
        <br>
    </div>
</head>

<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
<script>
    function addDarkmodeWidget() {
        new Darkmode().showWidget();
    }
    window.addEventListener('load', addDarkmodeWidget);
</script>


<body>
    <?php
        require "connectPHP.php";
       
        if(isset($_GET['IdTopik'])){
            $IdTopik = $_GET['IdTopik'];

            // get perekodan rekod in descending order because need latest on the top
            $selectDataFromRekod = "SELECT * FROM PEREKODAN WHERE IdTopik = '".$IdTopik."' ORDER BY LENGTH(IdRekod) DESC, IdRekod DESC";
            $result = mysqli_query($con,$selectDataFromRekod);         // query

            // get  IdTopik data
            $selectDataFromTopik = "SELECT * FROM TOPIK WHERE IdTopik = '".$IdTopik."'";
            $resultTopik = mysqli_query($con,$selectDataFromTopik);         // query
            $rowTopik = mysqli_fetch_array($resultTopik);
            $subTopik = $rowTopik['subTopik'];
            $tajuk = $rowTopik['tajuk'];
 
    ?>        

            <p style='opacity: 0';>.</p>
            <div class='infoTopik'>
                <p style='opacity: 0';>.</p>
                <h1 style='margin-left: 5%'> Info Topik  </h1>
                <div class='infoTopikContainer'>
                    <p style='opacity: 0';>.</p>
                    <h2 style='margin-left: 5%;'> IdTopik : <?php echo $IdTopik; ?> </h2>
                    <h2 style='margin-left: 5%;'> subTopik : <?php echo $subTopik; ?> </h2>
                    <h2 style='margin-left: 5%;'> tajuk : <?php echo $tajuk; ?> </h2>
                    <p style='opacity: 0;'>.</p>
                </div>
                <br>
                <br>
            </div>

            <div class="muridHantar">
                <div class = "muridHantarContainer">
                    <input type="text" name="search" id="searchMurid" onkeyup="filterMurid()" placeholder="Cari.." spellcheck="false">
                    <br>
                    <br>
                    <br>
                    <br>
                    <h1 style="margin-left: 4.5%;"> Murid yang hantar </h1>
                    <div style="overflow-x:auto;">
                        
                        
                        <table id='rekodTable1'>
                            <tr class='tableHeader'>
                                <th>IdRekod</th>
                                <th>markah</th>
                                <th>tarikh</th>
                                <th>NoIC</th>
                                <th>Nama</th>
                                <th>Tindakan</th>
                                
                            </tr>
            
                        <?php 
                            while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results ?>
                                <?php 
                                    // get all murid info
                                    $NoIC = $row['NoIC'];
                                    $selectMurid = "SELECT * FROM PENGGUNA WHERE NoIC = '".$NoIC."'";
                                    $resultMurid = mysqli_query($con,$selectMurid);         // query
                                    $rowMurid = mysqli_fetch_array($resultMurid);
                                ?>
                                <tr>
                                    <td><?php echo $row['IdRekod']; ?></td>
                                    <td><?php echo $row['markah']; ?></td>
                                    <td><?php echo $row['tarikh']; ?></td>
                                    <td><?php echo $row['NoIC']; ?></td>
                                    <td><?php echo $rowMurid['nama']; ?></td>
                                    <td>
                                        <?php echo '<button type="button" class="semakJawapan" name="semakJawapan" onclick="semakJawapan(\'' . $row['IdRekod'] . '\')"> Semak jawapan </button>';
                                        ?>
                                        
                                    </td>
                                    
                                </tr>
                        <?php } ?>
                        </table>
                            
                    </div>
                    

                    <?php 
                        // select murid that haven't hantar 
                        $selectMuridNotHantar = "SELECT * FROM PENGGUNA WHERE peranan = 'murid' AND NoIC not in (SELECT NoIC FROM PEREKODAN WHERE IdTopik = '".$IdTopik."')";
                        $resultMuridNotHantar = mysqli_query($con,$selectMuridNotHantar);         // query
                        // $rowMuridNotHantar = mysqli_fetch_array($resultMuridNotHantar);
                    
                    ?>

                    <br> <br>
                    <h1 style="margin-left: 4.5%;"> Murid yang belum hantar </h1>
                    <div style="overflow-x:auto;">
                        
                        
                        <table id='rekodTable2'>
                            <tr class='tableHeader'>
                                <th>NoIC</th>
                                <th>Nama</th>
                                <th>NoTel</th>
                                
                            </tr>
            
                        <?php 
                            while($rowMuridNotHantar = mysqli_fetch_array($resultMuridNotHantar)){   //Creates a loop to loop through results ?>
                                
                                <tr>
                                    <td><?php echo $rowMuridNotHantar['NoIC']; ?></td>
                                    <td><?php echo $rowMuridNotHantar['nama']; ?></td>
                                    <td><?php echo $rowMuridNotHantar['NoTel']; ?></td>
                                    
                                </tr>
                        <?php } ?>
                        </table>
                            
                    </div>
                    <p style="opacity:0;">.</p>
                </div>
                <p style="opacity:0;">.</p>
                <br>
            </div>

        <?php }?>
            
        <script>
            function semakJawapan(id) {
                window.location = 'semakJawapan.php?IdRekod=' + id;
            }
                
        </script>
    
        <script>
            // filter function  for perekodan
            function filterMurid() {
                var input, filter, table, tr1, td, cell, i, j;
                input = document.getElementById("searchMurid");
                filter = input.value.toUpperCase();
                table1 = document.getElementById("rekodTable1");
                tr1 = table1.getElementsByTagName("tr");
                for (i = 1; i < tr1.length; i++) {
                    // Hide the row initially.
                    tr1[i].style.display = "none";
                
                    td = tr1[i].getElementsByTagName("td");
                    for (var j = 0; j < td.length; j++) {
                        cell = tr1[i].getElementsByTagName("td")[j];
                        if (cell) {
                            if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr1[i].style.display = "";
                                break;
                            }
                        }
                    }
                }
                table2 = document.getElementById("rekodTable2");
                tr2 = table2.getElementsByTagName("tr");
                for (i = 1; i < tr2.length; i++) {
                    // Hide the row initially.
                    tr2[i].style.display = "none";
                
                    td = tr2[i].getElementsByTagName("td");
                    for (var j = 0; j < td.length; j++) {
                        cell = tr2[i].getElementsByTagName("td")[j];
                        if (cell) {
                            if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr2[i].style.display = "";
                                break;
                            }
                        }
                    }
                }
            }

                    
        </script>

    
</body>
</html>