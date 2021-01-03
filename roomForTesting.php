<?php 


require "connectPHP.php";


// get all markah and its details for calculating purata in an ascending order
// need its IdRekod to calculate each IdRekod Purata
$selectMarkahFromRekodPurata = "SELECT * FROM PEREKODAN ORDER BY LENGTH(IdRekod), IdRekod ";
$resultMarkahPurata = mysqli_query($con,$selectMarkahFromRekodPurata);         // query




$purata;
$jumlah = 0;
$ct = 0;

$rowPurata = mysqli_fetch_array($resultMarkahPurata);
$temp = $rowPurata['IdTopik'];
$jumlah += $rowPurata['markah'];
$ct += 1;

while($rowPurata = mysqli_fetch_array($resultMarkahPurata)){
    if ($temp == $rowPurata['IdTopik']){
        $jumlah += $rowPurata['markah'];
        $ct += 1;
    }
    else{
        // add data to array and refresh
        $purata = $jumlah/$ct;
        // $everyRekodPurata[] = $purata;
        $jumlah = 0;
        $ct = 0;

        //output
        $purataOUT = $rowPurata['IdTopik'];
        echo "{ label: $purataOUT  , y: $purata},";

        $temp = $rowPurata['IdTopik'];
        $jumlah += $rowPurata['markah'];
        $ct += 1;

    }
}    

?>