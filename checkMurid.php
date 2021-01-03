
<!DOCTYPE html>
    
    <head>
        <title> Prestasi Sendiri </title>
        <link rel="stylesheet" href="mystyleMurid.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->

    </head>

    <!--Banner-->
    <div class="banner">
        <div style="background-color:  rgb(194, 247, 240);">
            <p style="color: rgb(194, 247, 240);">.</p>
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
                <!-- <h2> display graph </h2> -->
                <script>
                window.onload = function () {

                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    theme: "light2",
                    title:{
                        text: "Average Marks and Own Marks"
                    },
                    data: [{        
                        type: "line",
                        indexLabelFontSize: 16,
                        dataPoints: [
                            { y: 50 }
                            
                        ]
                    }]
                });
                chart.render();

                }
                </script>
                
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js">
                    document.cookie = "SameSite=None; Secure";
                    alert( document.cookie );
                </script>

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
                    <?php

                        require "connectPHP.php";

                        $selectDataFromRekod = "SELECT * FROM PEREKODAN ORDER BY LENGTH(IdRekod) DESC, IdRekod DESC";
                        $result = mysqli_query($con,$selectDataFromRekod);         // query
                    ?>
                    
                    <table id='topikTable'>
                        <tr class='tableHeader'>
                            <th style='width:8%;'>IdRekod</th>
                            <th style='width:8%;'>markah</th>
                            <th style='witdh:8%;'>tarikh</th>
                            <th style='witdh:8%;'>IdTopik</th>
                            <th style='witdh:8%;'>subTopik</th>
                            <th style='witdh:50%;'>tajuk</th>
                            <th style='witdh:10%;'>Tindakan</th>
                            
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
        </div>
        
    </body>

</html>