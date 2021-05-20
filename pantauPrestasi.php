<?php
    session_start();

    if ($_SESSION['NoIC'] == ""){
        header('Location: ./login.php');       // why you break inside
    } 
?>

<?php
    // get the student NoIC from URL
    $NoIC = $_GET['NoIC'];

    // connect to mySQl database
    require "connectPHP.php";

    // get perekodan rekod that is from the same user[IC] and in descending order because need latest on the top
    $selectDataFromRekod = "SELECT * FROM PEREKODAN WHERE NoIC = '".$NoIC."' ORDER BY LENGTH(IdRekod) DESC, IdRekod DESC";
    $result = mysqli_query($con,$selectDataFromRekod);         // query

    // get own markah  and its details and it is in ascending order
    $selectMarkahFromRekod = "SELECT * FROM PEREKODAN WHERE NoIC = '".$NoIC."' ORDER BY LENGTH(IdTopik), IdTopik ";
    $resultMarkah = mysqli_query($con,$selectMarkahFromRekod);         // query    

    $selectMuridInfo = "SELECT * FROM PENGGUNA WHERE NoIC = '".$NoIC."'";
    $resultMurid = mysqli_query($con,$selectMuridInfo);         // query    
    $rowMurid = mysqli_fetch_array($resultMurid);
    $nama = $rowMurid['nama'];
    $NoTel = $rowMurid['NoTel'];
?>

<!DOCTYPE html>
    <head>
        <title> Pantau Prestasi Murid </title>
        <link rel="stylesheet" href="mystyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
    </head>

    <!--Banner-->
    <div class="banner">
        <div style="background-color:  #dadede;">
            <p style="opacity:0;">.</p>
            <h1 style="background-color:  #dadede;"> Ilmu Di Hujung Jari </h1>
            <h2 style="background-color:  #dadede;"> Matematik Tingkatan 4 (DLP) </h2>
            <!--log out button-->
            <div class="logOut">
                <a href="login.php" onclick="return confirm('Log Keluar?')"> Log Keluar </a>   
            </div> <br><br><br>
            <div class="pantauPrestasiBalik">
                <a href="checkGuru.php"> Balik </a>   
            </div> 
            <br>
            <p style="opacity:0;">.</p>
        </div>
    </div>
    
    <div>
        <!-- font size button -->
        <button id="increase-btn" class="increase-btn" onclick="increaseFontSize();"> + </button>
        <button id="decrease-btn" class="decrease-btn" onclick="decreaseFontSize();"> - </button>
    </div>

    <p style="opacity:0;">.</p>
    <br>
    <script src="functionGuru.js"></script>

    <!-- dark mode js library -->
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
    <script>
        function addDarkmodeWidget() {
            new Darkmode().showWidget();
        }
        window.addEventListener('load', addDarkmodeWidget);
    </script>

    <body class="checkMurid" onload="reloadToCurrentZoom()">
        <div class="infoPantauMurid">
            <br>
            <h1 style="margin-left: 5%;"> Info Murid </h1>
            <div class="infoPantauMuridContainer">
                <br>
                <h2> NoIC : <?php echo $NoIC; ?></h2>
                <h2> Nama : <?php echo $nama; ?></h2>
                <h2> NoTel : <?php echo $NoTel; ?></h2>
                <br>
            </div>
            <br>
        </div>
        
        <!-- here display graph or statistic like standard deviation -->
        <div class = "graphMurid">
            <br>
            <h1 style="margin-left: 4.5%;"> Prestasi Murid </h1>
            <div class = "graphMuridContainer">
                <br><br>
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
                                $selectIdTopikFromRekodTemp = "SELECT IdTopik FROM PEREKODAN WHERE NoIC = '".$NoIC."' ORDER BY LENGTH(IdTopik), IdTopik ";
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

                <script>
                    setTimeout(function(){
                        window.onload = reloadToCurrentZoom();
                    }, 1600); // give the browser time to load this graph before change zoom
                </script>

                </head>
                <body>
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                
                <br><br>
                <h2 style="margin-left: 4.5%;"> Standard Deviation : <?php echo $standardDeviation; ?></h2>
                <br><br>
            </div>
            <br><br>
        </div>
    </body>
</html>