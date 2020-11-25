
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
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
    

        
    </head>

    
    <body>
        <h1 style="margin-left: 4.5%;"> Koleksi Soalan</h1>
        <br>
        <div class="collectionGuru">
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
            
            <!-- <p style = "background-color: white;">.</p> -->

            <div class = "collectionGuruContainer">
                <br>
                <br>
                <br>
                <br>
                <div>
                    <?php

                        require "connectPHP.php";

                        $selectDataFromTopik = "SELECT * FROM TOPIK ORDER BY LENGTH(IdTopik), IdTopik";
                        $result = mysqli_query($con,$selectDataFromTopik);         // query
                    ?>
                    
                    <table id='topikTable'>
                        <tr class='tableHeader'>
                            <th style='width:10%;'>IdTopik</th>
                            <th style='width:15%;'>Sub topik</th>
                            <th style='witdh:70%;'>Tajuk</th>
                            <th style='witdh:5%;'>Tindakan</th>
                            
                        </tr>
                                
                    <?php 
                        while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results ?>
                            <tr>
                                <td><?php echo $row['IdTopik']; ?></td>
                                <td><?php echo $row['subTopik']; ?></td>
                                <td><?php echo $row['tajuk']; ?></td>
                                <td>
                                    <?php echo "<button type='button' class='changeButton' name='change-button' id=".$row['IdTopik']."> Ubah </button>";
                                    ?>
                                    <!-- <a href="indexGuru.php?change=<?php //echo $row['IdTopik']; ?>"
                                        class="changeButton"> Ubah </a> -->
                            
                                    <?php echo "<button type='button' class='deleteButton' name='delete-button' id=".$row['IdTopik']."> Padamkan </button>";
                                    ?>
                                    <!-- <a href="indexGuru.php?delete=<?php //echo $row['IdTopik']; ?>"
                                        class="deleteButton"> Padamkan </a> -->
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
                    // add the console log remove here
                
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