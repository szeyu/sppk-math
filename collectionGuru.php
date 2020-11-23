
<!DOCTYPE html>
    
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
            
            <input type="text" name="search" id="searchTopik" onkeyup="filterTopik()" placeholder="Cari.." list="suggestion" spellcheck="false">
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
                <div class="gridContainerTable">
                    <div>
                        <?php

                            require "connectPHP.php";

                            $selectDataFromTopik = "SELECT * FROM TOPIK ORDER BY LENGTH(IdTopik), IdTopik";
                            $result = mysqli_query($con,$selectDataFromTopik);         // query
                            echo "<table id='topikTable'>"; // start a table tag in the HTML
                                echo "<tr class='tableHeader'>";
                                    echo "<th style='width:20%;'>IdTopik</th>";
                                    echo "<th style='width:25%'>Sub topik</th>";
                                    echo "<th style='witdh:55%'>Tajuk</th>";
                                echo "</tr>";
                                
                                while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
                                echo "<tr><td>" . $row['IdTopik'] . "</td><td>" . $row['subTopik'] . "</td><td>" . $row['tajuk'] . "</td></tr>";  //$row['index'] the index here is a field name
                                }

                            echo "</table>"; //Close the table in HTML

                            mysqli_free_result($result);        //clear the memory
                        ?>
                    </div>
                    <div>
                        <?php
                            require "connectPHP.php";

                            echo "<p> hello </p>"
                        ?>
                    </div>
                </div>
                
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