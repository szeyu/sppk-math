
<?php
                        


    //find nama with NoTel(Kunci Primer)
    $findNamaSQL = "SELECT * FROM TELEFON WHERE NoTel = '".$row['NoTel']."'LIMIT 1";
    $resultInTelefon = mysqli_query($con,$findNamaSQL);    // query

    if(mysqli_num_rows($resultInTelefon) == 1){      //if only one result 
        if($rowInTelefon = mysqli_fetch_assoc($resultInTelefon)){
            $_SESSION['nama'] = $rowInTelefon['nama'];   //set global variable
        }
    }else{
        echo "Pls check your database, database not atomic";  //cannot no telefon in table if like that db crash
    }
    ?>





<?php

        // after click then direct to that page
        // from url
        if (isset($_GET['homeGuru'])){   ?>    

            <script> $("#contentGuru").load("homeGuru.php"); </script>
           
        <?php } ?>

        <?php

        // after clcik then direct to that page
        // from url
        if (isset($_GET['checkGuru'])){   ?>    

            <script> $("#contentGuru").load("checkGuru.php"); </script>
           
        <?php } ?>

        <?php

        // after register then direct to that page
        // from url
        if (isset($_GET['registeredKuiz'])){   ?>    

            <script>alert(<?php echo $_GET['registeredKuiz'];?>);</script>
            
            <script> $("#contentGuru").load("createGuru.php"); </script>
           
        <?php } ?>

        <?php
        // after  then direct to that page
        // from url
        if (isset($_GET['collection'])){   ?>    
            <script>alert(<?php echo $_GET['collection'];?>);</script>
            
            <script> $("#contentGuru").load("collectionGuru.php"); </script>
           
        <?php } ?>
        
        <?php
        // after delete then direct to that page
        // from url
        if (isset($_GET['delete'])){   ?>    
            <script>alert(<?php echo $_GET['delete'];?>);</script>
            
            <script> $("#contentGuru").load("collectionGuru.php"); </script>
           
        <?php } ?>

        <?php
        // after change then direct to that page
        // from url
        if (isset($_GET['change'])){   ?>    
            <script>alert(<?php echo $_GET['change'];?>);</script>
            
            <script> $("#contentGuru").load("collectionGuru.php"); </script>
           
        <?php } ?>




        <!-- here unset the session message -->
        <script>alert(<?php echo $_SESSION['registerQuizMessage'];?>);</script>
        <?php $_SESSION['registerQuizMessage'] = ""; ?>




        <div>
        <input type='radio' id='pilihanA$i' name='pilihanA$i' required value='A'>
        <label for='pilihanA' style='float: left;'> (A)   $resultSetPilihan[0]</label> <br><br><br>
        </div>
        <div>
        <input type='radio' id='pilihanB$i' name='pilihanB$i' required value='B'>
        <label for='pilihanB' style='float: left;'> (B)   $resultSetPilihan[1] </label> <br><br><br>
        </div>
        <div>
        <input type='radio' id='pilihanC$i' name='pilihanC$i' required value='C'>
        <label for='pilihanC' style='float: left;'> (C)   $resultSetPilihan[2] </label> <br><br><br>
        
        </div>
        <div>
        <input type='radio' id='pilihanD$i' name='pilihanD$i' required value='D'>
        <label for='pilihanD' style='float: left;'> (D)   $resultSetPilihan[3] </label> <br><br>
        
        </div>
            

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
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
                        <?php 
                        while($rowMarkah = mysqli_fetch_array($resultMarkah)){ 
                            $markahGraph = $rowMarkah['markah'];
                            echo "{ y: $markahGraph},";
                        }
                        ?>

                        // { y: 50 }
                        
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


/////////////////////////////////////////////////////////////////////////////////////////////

<script>
    window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        title:{
            text: "Average Marks and Own Marks"             
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
            type: "spline",  
            name: "Own Marks",        
            showInLegend: true,
            dataPoints: [
                { label: "Atlanta 1996" , y: 44 },     
                { label:"Sydney 2000", y: 37 },     
                { label: "Athens 2004", y: 36 },     
                { label: "Beijing 2008", y: 36 },     
                { label: "London 2012", y: 46 },
                { label: "Rio 2016", y: 46 }
            ]
        }, 
        
        {        
            type: "spline",  
            name: "Average Marks",        
            showInLegend: true,
            dataPoints: [
                { label: "Atlanta 1996" , y: 20 },     
                { label:"Sydney 2000", y: 13 },     
                { label: "Athens 2004", y: 13 },     
                { label: "Beijing 2008", y: 16 },     
                { label: "London 2012", y: 11 },
                { label: "Rio 2016", y: 17 }
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
    
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                
    



