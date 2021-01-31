
<?php
    session_start();

    if ($_SESSION['NoIC'] == ""){
        header('Location: ./login.php');       // why you break inside
    } 
?>

<?php

    require "connectPHP.php";
    // get perekodan rekod that is from the same user[IC] and in descending order because need latest on the top
    $selectDataFromRekod = "SELECT * FROM PEREKODAN WHERE NoIC = '".$_SESSION['NoIC']."' ORDER BY LENGTH(IdRekod) DESC, IdRekod DESC";
    $result = mysqli_query($con,$selectDataFromRekod);         // query

    // get own markah  and its details and it is in ascending order
    $selectMarkahFromRekod = "SELECT * FROM PEREKODAN WHERE NoIC = '".$_SESSION['NoIC']."' ORDER BY LENGTH(IdTopik), IdTopik ";
    $resultMarkah = mysqli_query($con,$selectMarkahFromRekod);         // query    

?>

<!DOCTYPE html>
    
    <head>
        <title> Prestasi Sendiri </title>
        <link rel="stylesheet" href="mystyleMurid.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->

    </head>

    <!--Banner-->
    <div class="banner">
        <div style="background-color:  rgb(194, 247, 240);">
            <p style="opacity:0;">.</p>
            <h1> Ilmu Di Hujung Jari </h1>
            <h2> Matematik Tingkatan 4 (DLP) </h2>
            <!--log out button-->
            <div class="logOut">
                <a href="login.php" onclick="return confirm('Log Keluar?')"> Log Keluar </a>   
            </div> 
            <p style="color: rgb(194, 247, 240);">.</p>
        </div>
    </div>
    
    

    <!--Top navigation bar with index murid active-->
    <div id="topnav" class="topnav">
        <a class="active-button" onclick="homeMurid()">Laman Utama</a>     
        <a class="active-button" onclick="collectionMurid()">Koleksi Kuiz</a>
        <a class="active">Prestasi Sendiri</a>
    </div>

    <script>
        function homeMurid(){
            window.location = 'indexMurid.php?content=homeMurid';
        }

        function collectionMurid(){
            window.location = 'indexMurid.php?content=collectionMurid';
        }
    </script>

    <body class="checkMurid">

        <!-- here display graph or statistic like standard deviation -->
        <div class = "graphMurid">
            <br><br>
            
            <div class = "graphMuridContainer">
                <h1 style="margin-left: 4.5%;"> Prestasi sendiri </h1>
                <hr>
                <!-- <h2> display graph </h2> -->

                <br>
                <br>
                <h2 style="margin-left: 4.5%;"> Graph </h2>
                
                <script>
                window.onload = function () {

                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    exportEnabled: true,
                    title:{
                        text: "Average Marks    and    Own Marks"             
                    }, 
                    axisY:{
                        title: "Marks"
                    },
                    toolTip: {
                        shared: true
                    },
                    legend:{
                        cursor:"pointer",
                        itemclick: toggleDataSeries
                    },
                    data: [{        
                        type: "line",  
                        name: "Own Marks",        
                        showInLegend: true,
                        dataPoints: [
                            <?php 
                            // can work
                            $number_of_topik = 0;
                            $sum_of_all_markah = 0;
                            $sum_of_all_markah_power2 = 0;
                            while($rowMarkah = mysqli_fetch_array($resultMarkah)){ 
                                $IdTopik = $rowMarkah['IdTopik'];
                                $markahGraph = $rowMarkah['markah'];

                                // getting info for stdv
                                $number_of_topik += 1;
                                $sum_of_all_markah += $markahGraph;
                                $sum_of_all_markah_power2 += $markahGraph*$markahGraph;

                                echo "{ label: '$IdTopik' , y: $markahGraph},";
                            }

                            // calculating stdv
                            $standardDeviation = sqrt(
                                ($sum_of_all_markah_power2/$number_of_topik) - (($sum_of_all_markah/$number_of_topik)*($sum_of_all_markah/$number_of_topik))
                            );

                            ?>

                            // { label: "R1" , y: 44 },     
                            // { label: "R2" , y: 37 },     
                            
                        ]
                    }, 
                    
                    {        
                        type: "line",  
                        name: "Average Marks",        
                        showInLegend: true,
                        dataPoints: [
                            <?php
                                /////////////////////////////////////
                                //         get every purata
                                /////////////////////////////////////
                                // get all IdTopik and its details for calculating purata in an ascending order
                                // need its IdRekod to calculate each IdRekod Purata
                                // return T3
                                //        T4
                                $selectIdTopikFromRekodTemp = "SELECT IdTopik FROM PEREKODAN WHERE NoIC = '".$_SESSION['NoIC']."' ORDER BY LENGTH(IdTopik), IdTopik ";
                                $resultIdTopikTemp = mysqli_query($con,$selectIdTopikFromRekodTemp);         // query

                                while($rowTemp = mysqli_fetch_array($resultIdTopikTemp)){
                                    $IdTopikTemp = $rowTemp['IdTopik'];
                                    $selectMarkahFromRekodPurata = "SELECT AVG(markah) FROM PEREKODAN WHERE IdTopik='".$IdTopikTemp."'";
                                    $averageValue = mysqli_query($con,$selectMarkahFromRekodPurata);         // query
                                    $purataRow = mysqli_fetch_array($averageValue);
                                    $purata = $purataRow[0];
                                    // echo $IdTopikTemp." ".$purata;
                                    echo "{ label: '$IdTopikTemp'  , y: $purata},";
                                }
                            ?>


                            // { label: "T1" , y: 20 }, 
                            // { label: "T2" , y: 20 },    
                            // { label: "T3" , y: 50 },     
                            // { label: "T4" , y: 50 }, 
                                
                            
                        ]
                    }]
                });

                chart.render();

                function toggleDataSeries(e) {
                    if(typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                    }
                    else {
                        e.dataSeries.visible = true;            
                    }
                    chart.render();
                }

                }
                </script>
                </head>
                <body>
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                
                
                <br>
                <br>
                <h2 style="margin-left: 4.5%;"> Standard Deviation : <?php echo $standardDeviation; ?></h2>
                <br>
                <br>
            </div>
        </div>



        <!-- here display the perekodan in the form of table -->
        <div class="perekodanMurid">
            <br>
            <br>
            
            
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
            
            <div class = "perekodanMuridContainer">
                <br>
                <br>
                <br>
                <br>
                <h1 style="margin-left: 4.5%;"> Perekodan </h1>
                <div>
                    
                    
                    <table id='topikTable'>
                        <tr class='tableHeader'>
                            <th>IdRekod</th>
                            <th>markah</th>
                            <th>tarikh</th>
                            <th>IdTopik</th>
                            <th>subTopik</th>
                            <th>tajuk</th>
                            <th>Tindakan</th>
                            
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
                                <td>
                                    <?php echo '<button type="button" class="semakJawapan" name="semakJawapan" onclick="semakJawapan(\'' . $row['IdRekod'] . '\')"> Semak jawapan </button>';
                                    ?>
                                    
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
                    function semakJawapan(id) {
                        window.location = 'semakJawapan.php?IdRekod=' + id;
                    }
                    
                </script>

                <br>
                <br>
                <br>
                <br>
                <br>

            </div>
            <br>
            <p style="opacity:0;">.</p>
        </div>
        
    </body>

</html>