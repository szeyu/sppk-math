
<!DOCTYPE html>

    <?php 
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
                        echo "<table id='topikTable'>"; // start a table tag in the HTML
                            echo "<tr class='tableHeader'>";
                                echo "<th style='width:10%;'>IdTopik</th>";
                                echo "<th style='width:15%'>Sub topik</th>";
                                echo "<th style='witdh:55%'>Tajuk</th>";
                                echo "<th style='witdh:10%'>Padam</th>";
                                echo "<th style='witdh:10%'>Ubah</th>";
                            echo "</tr>";
                                
                            while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results

                                //$row['index'] the index here is a field name
                                echo "<tr>";
                                    echo "<td>" . $row['IdTopik'] . "</td>";  
                                    echo "<td>" . $row['subTopik'] . "</td>";
                                    echo "<td>" . $row['tajuk'] . "</td>";

                                    $D_position = "D".$row['IdTopik'];
                                    echo "<td><button type='submit' class='deleteButton' id='".$D_position."' onclick='delete('".$D_position."')'> Padamkan </button></td>";

                                    $U_position = "U".$row['IdTopik'];
                                    echo "<td><button type='submit' class='changeButton' id='".$U_position."' onclick='ubah('".$U_position."')'> Ubah Soalan </button></td>";
                                echo "</tr>";
                            }

                        echo "</table>"; //Close the table in HTML

                        mysqli_free_result($result);        //clear the memory
                    ?>
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

                    function delete(deletePositon){
                        
                    }

                    function ubah(ubahPosition){

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